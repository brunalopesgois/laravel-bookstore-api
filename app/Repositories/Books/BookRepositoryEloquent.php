<?php

namespace App\Repositories\Books;

use App\Dtos\Books\CreateBookDto;
use App\Models\Book;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class BookRepositoryEloquent implements BookRepositoryInterface
{
    private $model;

    public function __construct()
    {
        $this->model = new Book();
    }

    public function findAll(array $queryParams)
    {
        $sort = $queryParams['sort'] ?? 'title';
        $order = $queryParams['order'] ?? 'asc';
        $limit = $queryParams['limit'] ?? 12;

        if (isset($queryParams['search'])) {
            return $this->model
                ->query()
                ->where('title', 'LIKE', "%{$queryParams['search']}%")
                ->with(['author', 'publisher'])
                ->paginate($limit);
        }

        if ($order == 'desc') {
            return $this->model
                ->query()
                ->orderByDesc($sort)
                ->with(['author', 'publisher'])
                ->paginate($limit);
        }

        return $this->model
            ->query()
            ->orderBy($sort)
            ->with(['author', 'publisher'])
            ->paginate($limit);
    }

    public function findById(string $id): ?Book
    {
        return $this->model->find($id);
    }

    public function create(CreateBookDto $createBookDto): void
    {
        DB::beginTransaction();
        try {
            $this->model->create([
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
}
