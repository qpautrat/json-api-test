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
use Test\Neomerx\CurrentRequest;
use Test\Neomerx\PageSchema;
use Neomerx\JsonApi\Factories\Factory;
use Symfony\Component\HttpFoundation\Request;
use Test\Neomerx\ExceptionThrower;

$encoder = Encoder::instance([
    Author::class => AuthorSchema::class,
    Book::class => BookSchema::class,
    Page::class => PageSchema::class,
], new EncoderOptions(JSON_PRETTY_PRINT, 'http://example.com/api/v1'));

$factory = new Factory();
$parser = $factory->createParametersParser();
$options = $parser->parse(new CurrentRequest(Request::createFromGlobals()), new ExceptionThrower());

header('Content-type: application/json');
echo $encoder->encodeData($authors, $options);