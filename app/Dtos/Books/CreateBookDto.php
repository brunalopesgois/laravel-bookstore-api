<?php

namespace App\Dtos\Books;

class CreateBookDto
{
    public string $isbn;

    public string $title;

    public string $description;

    public string $genre;

    public float $salePrice;

    public int $authorId;

    public int $publisherId;

    public ?string $coverUrl;

    public function __construct(
        string $isbn,
        string $title,
        string $description,
        string $genre,
        float $salePrice,
        int $authorId,
        int $publisherId,
        ?string $coverUrl
    ) {
        $this->isbn = $isbn;
        $this->title = $title;
        $this->description = $description;
        $this->genre = $genre;
        $this->salePrice = $salePrice;
        $this->authorId = $authorId;
        $this->publisherId = $publisherId;
        $this->coverUrl = $coverUrl;
    }
}
