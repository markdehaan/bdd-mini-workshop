<?php

namespace HardenbergPHP\Domain\Model;

class Book
{
    /** @var ISBN */
    private $isbn;

    public static function register(ISBN $isbn)
    {
        $book = new self($isbn);

        return $book;
    }

    public function isbn(): ISBN
    {
        return $this->isbn;
    }

    private function __construct(ISBN $isbn)
    {
        $this->isbn = $isbn;
    }
}
