<?php

namespace Test\Nilportugues;

use NilPortugues\Api\Mappings\JsonApiMapping;
use Test\Evaneos\Book;

class BookMapping  implements JsonApiMapping
{
    /**
     * {@inhertidoc}
     */
    public function getClass()
    {
        return Book::class;
    }
    /**
     * {@inheritdoc}
     */
    public function getAlias()
    {
        return 'book';
    }
    /**
     * {@inheritdoc}
     */
    public function getAliasedProperties() {
        return [
            'title' => 'title',
            'slug' => 'slug'
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function getHideProperties(){
        return [];
    }
    /**
     * {@inheritdoc}
     */
    public function getIdProperties()
    {
        return [
            'id'
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function getUrls()
    {
        return [
            'self' => 'http://example.com/books/{id}',
            'pages' => 'http://example.com/books/{id}/pages'
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function getRelationships()
    {
        return [];
    }
}