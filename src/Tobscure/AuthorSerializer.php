<?php

namespace Test\Tobscure;

use Tobscure\JsonApi\AbstractSerializer;
use Tobscure\JsonApi\Relationship;
use Tobscure\JsonApi\Resource;

class AuthorSerializer extends AbstractSerializer
{
    protected $type = 'people';

    public function getAttributes($author, array $fields = null)
    {
        return [
            'name' => $author->name
        ];
    }

    public function book($author)
    {
        $resource = new Resource($author->book, new BookSerializer);
        $resource->with(['pages']);
        return new Relationship($resource);
    }
}