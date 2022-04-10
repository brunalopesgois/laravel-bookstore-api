<?php

namespace App\Repositories\Books;

use App\Dtos\Books\CreateBookDto;
use App\Models\Book;

interface BookRepositoryInterface
{
    public function findAll(array $queryParams);
    public function findById(string $id): ?Book;
    public function create(CreateBookDto $createBookDto): void;
    public function delete($id);
    public function update($id, $title, $cover, $genre, $description, $salePrice);
}
