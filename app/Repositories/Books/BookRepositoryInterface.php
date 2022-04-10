<?php

namespace App\Repositories\Books;

interface BookRepositoryInterface
{
    public function findAll(array $queryParams);
    public function findById($id);
    public function create($title, $cover, $genre, $description, $salePrice);
    public function delete($id);
    public function update($id, $title, $cover, $genre, $description, $salePrice);
}
