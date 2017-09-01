<?php

namespace HardenbergPHP\Domain\Model;

interface BookRepository
{
    public function add(Book $book);

    public function get(ISBN $isbn): Book;

    public function getAll(): array;
}
