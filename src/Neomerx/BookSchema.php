<?php

namespace Test\Neomerx;

use Neomerx\JsonApi\Schema\SchemaProvider;

class BookSchema extends SchemaProvider
{
    protected $resourceType = 'book';

    public function getId($book)
    {
        return $book->id;
    }

    public function getAttributes($book)
    {
        return [
            'title' => $book->title,
            'slug' => $book->slug
        ];
    }

    public function getRelationships($book, array $includeRelationships = [])
    {
        return [
            'pages' => [self::DATA => $book->pages]
        ];
    }
}