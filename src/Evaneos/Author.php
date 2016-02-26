<?php

namespace Test\Evaneos;

class Author
{
    public $id;
    public $name;
    public $book;

    public function __construct($id, $name, Book $book = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->book = $book;
    }
}