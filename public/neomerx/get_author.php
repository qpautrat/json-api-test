<?php

use Neomerx\JsonApi\Encoder\Encoder;
use Neomerx\JsonApi\Encoder\EncoderOptions;
use Neomerx\JsonApi\Schema\Link;
use Neomerx\JsonApi\Parameters\EncodingParameters;
use Test\Evaneos\Author;
use Test\Neomerx\AuthorSchema;
use Test\Evaneos\Book;
use Test\Neomerx\BookSchema;
use Test\Evaneos\Page;
use Test\Neomerx\PageSchema;

$encoder = Encoder::instance([
    Author::class => AuthorSchema::class,
    Book::class => BookSchema::class,
    Page::class => PageSchema::class,
], new EncoderOptions(JSON_PRETTY_PRINT, 'http://example.com/api/v1'));

// Imagine it comes from Query parameters
$options  = new EncodingParameters(
    [
        'book',
        'book.pages'
    ], // included
    [
        'book' => [
            'slug',
            'title',
            'pages'
        ]
    ]  // fields
);

header('Content-type: application/json');
echo $encoder->encodeData($authors, $options);