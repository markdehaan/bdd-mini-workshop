<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class CartContext implements Context
{
    private $currentISBN;

    private $bookRepository;

    private $cart;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->bookRepository = new \HardenbergPHP\Infrastructure\Persistence\Repository\InMemoryBookRepository();
        $this->cart = new \HardenbergPHP\Domain\Model\Cart();
    }

    /**
     * @Given the library has a book with ISBN :number
     */
    public function theLibraryHasABookWithIsbn($number)
    {
        $this->cart->clear();
        $this->currentISBN = new \HardenbergPHP\Domain\Model\ISBN($number);
        $this->bookRepository->add(\HardenbergPHP\Domain\Model\Book::register($this->currentISBN));
    }

    /**
     * @When I add this book to the cart
     */
    public function iAddThisBookToTheCart()
    {
        $book = $this->bookRepository->get($this->currentISBN);
        $this->cart->add($book);
    }

    /**
     * @Then there should be :arg1 item in my cart
     */
    public function thereShouldBeItemInMyCart($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then this item should have ISBN :arg1
     */
    public function thisItemShouldHaveIsbn($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given the book is not available
     */
    public function theBookIsNotAvailable()
    {
        throw new PendingException();
    }

    /**
     * @Then I should be notified that the book is not available
     */
    public function iShouldBeNotifiedThatTheBookIsNotAvailable()
    {
        throw new PendingException();
    }

    /**
     * @Then my cart should be empty
     */
    public function myCartShouldBeEmpty()
    {
        throw new PendingException();
    }
}
