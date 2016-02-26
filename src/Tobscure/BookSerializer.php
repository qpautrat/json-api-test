<?php

namespace Test\Tobscure;

use Tobscure\JsonApi\AbstractSerializer;
use Tobscure\JsonApi\Relationship;
use Tobscure\JsonApi\Collection;

class BookSerializer extends AbstractSerializer
{
    protected $type = 'book';

    public function getAttributes($book, array $fields = null)
    {
        return [
            'title' => $book->title,
            'slug' => $book->slug,
        ];
    }

    public function pages($book)
    {
        return new Relationship(new Collection($book->pages, new PageSerializer));
    }
}