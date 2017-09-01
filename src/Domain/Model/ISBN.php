<?php

namespace HardenbergPHP\Domain\Model;

class ISBN
{
    /** @var string */
    private $number;

    /**
     * ISBN constructor.
     *
     * @param string $number
     */
    public function __construct(string $number)
    {
        $this->number = $number;
    }

    public function __toString()
    {
        return $this->number;
    }
}
