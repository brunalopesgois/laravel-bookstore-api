<?php

namespace App\Repositories\Books;

use App\Dtos\Books\CreateBookDto;
use App\Exceptions\NotFoundException;
use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use DomainException;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class BookRepositoryEloquent implements BookRepositoryInterface
{
    private Book $bookModel;

    private Author $authorModel;

    private Publisher $publisherModel;

    public function __construct()
    {
        $this->bookModel = new Book();
        $this->authorModel = new Author();
        $this->publisherModel = new Publisher();
    }

    public function findAll(array $queryParams)
    {
        $sort = $queryParams['sort'] ?? 'title';
        $order = $queryParams['order'] ?? 'asc';
        $limit = $queryParams['limit'] ?? 12;

        if (isset($queryParams['search'])) {
            return $this->bookModel
                ->query()
                ->where('title', 'LIKE', "%{$queryParams['search']}%")
                ->with(['author', 'publisher'])
                ->paginate($limit);
        }

        if ($order == 'desc') {
            return $this->bookModel
                ->query()
                ->orderByDesc($sort)
                ->with(['author', 'publisher'])
                ->paginate($limit);
        }

        return $this->bookModel
            ->query()
            ->orderBy($sort)
            ->with(['author', 'publisher'])
            ->paginate($limit);
    }

    public function findById(string $id): ?Book
    {
        return $this->bookModel->find($id);
    }

    public function create(CreateBookDto $createBookDto): void
    {
        $this->canCreateBook($createBookDto);

        DB::beginTransaction();
        try {
            $this->bookModel->create([
                'isbn' => $createBookDto->isbn,
                'title' => $createBookDto->title,
                'description' => $createBookDto->description,
                'genre' => $createBookDto->genre,
                'sale_price' => $createBookDto->salePrice,
                'author_id' => $createBookDto->authorId,
                'publisher_id' => $createBookDto->publisherId,
                'cover_url' => $createBookDto->coverUrl
            ]);
            DB::commit();
        } catch (QueryException $e) {
            DB::rollBack();
            throw new Exception($e);
        }
    }

    public function delete($id)
    {
        $booksRemoved = Book::destroy($id);

        if ($booksRemoved === 0) {
            return [
                'message' => 'Not Found',
                'statusCode' => 404
            ];
        }

        return [
            'message' => '',
            'statusCode' => 204
        ];
    }

    public function update($id, $title, $cover, $genre, $description, $salePrice)
    {
        $book = Book::find($id);

        if (is_null($book)) {
            return null;
        }

        if ($cover) {
            $book->cover = $cover;
        }

        $book->title = $title;
        $book->genre = $genre;
        $book->description = $description;
        $book->sale_price = $salePrice;
        $book->save();

        return $book;
    }

    private function canCreateBook(CreateBookDto $createBookDto): void
    {
        $bookExists = $this->bookModel->where('isbn', $createBookDto->isbn)->first();

        if ($bookExists) {
            throw new DomainException("Book with isbn {$createBookDto->isbn} already exists");
        }

        $author = $this->authorModel->find($createBookDto->authorId);
        if (!$author) {
            throw new NotFoundException('Author', $createBookDto->authorId);
        }

        $publisher = $this->publisherModel->find($createBookDto->publisherId);
        if (!$publisher) {
            throw new NotFoundException('Publisher', $createBookDto->publisherId);
        }
    }
}
