<?php

namespace spec\HardenbergPHP\Domain\Model;

use HardenbergPHP\Domain\Model\Book;
use HardenbergPHP\Domain\Model\ISBN;
use PhpSpec\ObjectBehavior;

class BookSpec extends ObjectBehavior
{
    const ISBN = '12345';

    public function let(ISBN $isbn)
    {
        $isbn->__toString()->willReturn(self::ISBN);

        $this->beConstructedThrough('register', [$isbn]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Book::class);
    }

    public function it_should_return_correct_isbn()
    {
        $this->isbn()->shouldBeAnInstanceOf(ISBN::class);
        $this->isbn()->__toString()->shouldReturn(self::ISBN);
    }
}
