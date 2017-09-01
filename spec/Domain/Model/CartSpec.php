<?php

namespace spec\HardenbergPHP\Domain\Model;

use HardenbergPHP\Domain\Model\Book;
use HardenbergPHP\Domain\Model\Cart;
use HardenbergPHP\Domain\Model\ISBN;
use PhpSpec\ObjectBehavior;

class CartSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Cart::class);
    }

    public function it_should_have_no_books_by_default()
    {
        $this->items()->shouldHaveCount(0);
    }

    public function it_can_store_a_book()
    {
        $this->add(Book::register(new ISBN('123')));
        $this->items()->shouldHaveCount(1);

        $book = $this->items()['123'];
        $book->isbn()->__toString()->shouldReturn('123');
    }

    public function it_should_be_empty_when_cleared()
    {
        $this->add(Book::register(new ISBN('123')));
        $this->clear();
        $this->items()->shouldHaveCount(0);
    }
}
