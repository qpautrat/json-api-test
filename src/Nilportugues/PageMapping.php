<?php

namespace Test\Nilportugues;

use NilPortugues\Api\Mappings\JsonApiMapping;
use Test\Evaneos\Page;

class PageMapping  implements JsonApiMapping
{
    /**
     * {@inhertidoc}
     */
    public function getClass()
    {
        return Page::class;
    }
    /**
     * {@inheritdoc}
     */
    public function getAlias()
    {
        return 'page';
    }
    /**
     * {@inheritdoc}
     */
    public function getAliasedProperties() {
        return [
            'number' => 'number',
            'content' => 'content'
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
            'number'
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function getUrls()
    {
        return [
            'self' => 'http://example.com/pages/{number}'
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