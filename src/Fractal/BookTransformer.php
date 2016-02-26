<?php

namespace Test\Fractal;

use League\Fractal\TransformerAbstract;
use Test\Evaneos\Book;
use League\Fractal\Resource\Collection;

class BookTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['pages'];

    public function transform(Book $book)
    {
        return [
            'id'      => $book->id,
            'title'   => $book->title,
            'slug'   => $book->slug
        ];
    }

    public function includePages(Book $book, $params)
    {
        return new Collection($book->pages, new PageTransformer(), 'pages');
    }
}