<?php

namespace spec\HardenbergPHP\Infrastructure\Persistence\Repository;

use HardenbergPHP\Domain\Model\Book;
use HardenbergPHP\Domain\Model\BookRepository;
use HardenbergPHP\Domain\Model\ISBN;
use HardenbergPHP\Infrastructure\Persistence\Repository\InMemoryBookRepository;
use PhpSpec\ObjectBehavior;

class InMemoryBookRepositorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(InMemoryBookRepository::class);
    }

    public function it_implements_book_repository()
    {
        $this->shouldImplement(BookRepository::class);
    }

    public function it_should_have_no_books_by_default()
    {
        $this->getAll()->shouldHaveCount(0);
    }

    public function it_can_store_a_book()
    {
        $this->add(Book::register(new ISBN('12345')));
        $this->getAll()->shouldHaveCount(1);
    }

    public function it_should_return_a_stored_book_by_its_isbn()
    {
        $isbn = new ISBN('12345');
        $book = Book::register($isbn);

        $this->add($book);
        $this->get($isbn)->shouldReturn($book);
    }
}
