<?php

use WoohooLabs\Yin\JsonApi\Request\Request;
use WoohooLabs\Yin\JsonApi\Exception\ExceptionFactory;
use WoohooLabs\Yin\JsonApi\JsonApi;
use Zend\Diactoros\ServerRequestFactory;
use Zend\Diactoros\Response;
use Test\Evaneos\Author;
use Test\Evaneos\Book;
use Test\Evaneos\Page;
use Test\Yin\AuthorsDocument;
use Test\Yin\AuthorResourceTransformer;
use Test\Yin\BookResourceTransformer;
use Test\Yin\PageResourceTransformer;

$request = new Request(ServerRequestFactory::fromGlobals());
$jsonApi = new JsonApi($request, new Response(), new ExceptionFactory());

$document = new AuthorsDocument(
    new AuthorResourceTransformer(
        new BookResourceTransformer()
        // new PageResourceTransformer()
    )
);

$response = $jsonApi->respond()->ok($document, $authors);

// Emitting the response
$emitter = new \Zend\Diactoros\Response\SapiEmitter();
$emitter->emit($response);