<?php

namespace Test\Fractal;

use League\Fractal\TransformerAbstract;
use Test\Evaneos\Author;
use League\Fractal\Resource\Item;

class AuthorTransformer extends TransformerAbstract
{
    // protected $defaultIncludes = ['book'];

    protected $availableIncludes = ['book'];

    public function transform(Author $author)
    {
        return [
            'id'      => (int) $author->id,
            'name'   => $author->name
        ];
    }

    public function includeBook(Author $author, $params)
    {
        return new Item($author->book, new BookTransformer(), 'book');
    }
}