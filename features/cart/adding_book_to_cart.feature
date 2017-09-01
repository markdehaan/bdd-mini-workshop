@cart
Feature: Adding a book to the cart
    In order to select books for lend
    As a library member
    I want to be able to add books to my cart

    Scenario: Adding a available book to the cart
        Given the library has a book with ISBN "123456"
        When I add this book to the cart
        Then there should be "1" item in my cart
        And this item should have ISBN "123456"

    Scenario: Adding a unavailable book to the cart
        Given the library has a book with ISBN "123457"
        And the book is not available
        When I add this book to the cart
        Then I should be notified that the book is not available
        And my cart should be empty

