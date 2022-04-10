<?php

namespace App\Repositories\Books;

use App\Models\Book;
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

    public function findById(string $id): Book
    {
        return $this->model->find($id);
    }

    public function create($title, $cover, $genre, $description, $salePrice)
    {
        DB::beginTransaction();
        $book = Book::create([
            'title' => $title,
            'cover' => $cover,
            'genre' => $genre,
            'description' => $description,
            'sale_price' => $salePrice
        ]);
        DB::commit();

        return $book;
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
