<?php

use WoohooLabs\Yin\JsonApi\Request\Request;
use WoohooLabs\Yin\JsonApi\Exception\ExceptionFactory;
use WoohooLabs\Yin\JsonApi\JsonApi;
use Zend\Diactoros\ServerRequestFactory;
use Zend\Diactoros\Response;
use Test\Yin\AuthorDocument;
use Test\Yin\AuthorResourceTransformer;
use Test\Yin\AuthorHydator;
use Test\Yin\BookResourceTransformer;
use Test\Evaneos\Author;

$request = new Request(ServerRequestFactory::fromGlobals());
$jsonApi = new JsonApi($request, new Response(), new ExceptionFactory());

$author = $jsonApi->hydrate(new AuthorHydator(), new Author(null, null));

$document = new AuthorDocument(
    new AuthorResourceTransformer(
        new BookResourceTransformer()
    )
);

$response = $jsonApi->respond()->created($document, $author);

// Emitting the response
$emitter = new \Zend\Diactoros\Response\SapiEmitter();
$emitter->emit($response);