<?php

namespace Test\Nilportugues;

use NilPortugues\Api\Mappings\JsonApiMapping;
use Test\Evaneos\Author;

class AuthorMapping  implements JsonApiMapping
{
    /**
     * {@inhertidoc}
     */
    public function getClass()
    {
        return Author::class;
    }
    /**
     * {@inheritdoc}
     */
    public function getAlias()
    {
        return 'people';
    }
    /**
     * {@inheritdoc}
     */
    public function getAliasedProperties() {
        return [
            'name' => 'name'
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
            'self' => 'http://example.com/people/{id}'
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