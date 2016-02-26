<?php

namespace Test\Fractal;

use League\Fractal\TransformerAbstract;
use Test\Evaneos\Page;

class PageTransformer extends TransformerAbstract
{
    public function transform(Page $page)
    {
        return [
            'id'      => $page->number,
            'content'   => $page->content
        ];
    }
}