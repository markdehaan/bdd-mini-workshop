<?php

namespace HardenbergPHP\Domain\Model;

class Cart
{
    private $items = [];

    public function items()
    {
        return $this->items;
    }

    public function add(Book $book)
    {
        $this->items[(string) $book->isbn()] = $book;
    }

    public function clear()
    {
        $this->items = [];
    }
}
