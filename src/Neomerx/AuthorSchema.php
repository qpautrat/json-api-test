<?php

namespace Test\Neomerx;

use Neomerx\JsonApi\Schema\SchemaProvider;

class AuthorSchema extends SchemaProvider
{
    protected $resourceType = 'people';

    public function getId($author)
    {
        return $author->id;
    }

    public function getAttributes($author)
    {
        return [
            'name' => $author->name
        ];
    }

    public function getRelationships($author, array $includeRelationships = [])
    {
        return [
            'book' => [
                self::DATA => $author->book,
                self::SHOW_RELATED => true
            ]
        ];
    }

    public function getIncludePaths()
    {
        return [
            'book',
            'book.pages'
        ];
    }
}