<?php

namespace Test\Evaneos;

class Page
{
    public $number;
    public $content;

    public function __construct($number, $content = '')
    {
        $this->number = $number;
        $this->content = $content;
    }
}