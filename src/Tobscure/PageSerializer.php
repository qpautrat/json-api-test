<?php

namespace Test\Tobscure;

use Tobscure\JsonApi\AbstractSerializer;
use Tobscure\JsonApi\Relationship;

class PageSerializer extends AbstractSerializer
{
    protected $type = 'page';

    public function getAttributes($page, array $fields = null)
    {
        return [
            'number' => $page->number,
            'content' => $page->content,
        ];
    }

    public function getId($page)
    {
        return $page->number;
    }
}