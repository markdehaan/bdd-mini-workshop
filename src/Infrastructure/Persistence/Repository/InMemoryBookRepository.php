<?php

namespace HardenbergPHP\Infrastructure\Persistence\Repository;

use HardenbergPHP\Domain\Model\Book;
use HardenbergPHP\Domain\Model\BookRepository;
use HardenbergPHP\Domain\Model\ISBN;

class InMemoryBookRepository implements BookRepository
{
    private $books = [];

    public function add(Book $book)
    {
        $this->books[(string) $book->isbn()] = $book;
    }

    public function get(ISBN $isbn): Book
    {
        return $this->books[(string) $isbn];
    }

    public function getAll(): array
    {
        return $this->books;
    }
}
