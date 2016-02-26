<?php

use NilPortugues\Api\JsonApi\Server\Actions\CreateResource;
use NilPortugues\Api\JsonApi\JsonApiSerializer;
use NilPortugues\Api\JsonApi\JsonApiTransformer;
use NilPortugues\Api\Mapping\Mapper;
use Test\Nilportugues\AuthorMapping;
use Test\Nilportugues\BookMapping;
use Test\Nilportugues\PageMapping;
use Test\Evaneos\Author;
use Zend\Diactoros\ServerRequestFactory;
use NilPortugues\Api\JsonApi\Http\Request\Request;

$request = ServerRequestFactory::fromGlobals();

$mappings = [
    AuthorMapping::class,
    BookMapping::class,
    PageMapping::class,
];

$mapper = new Mapper($mappings);

var_dump($mapper); die;

$transformer = new JsonApiTransformer($mapper);
$serializer = new JsonApiSerializer($transformer);

$resource = new CreateResource($serializer);

$content = [
    'id' => 30,
    'type' => 'people',
    'attributes' => [
        'name' => 'yolo'
    ]
];
$response = $resource->get($content, Author::class, function($data) {

});

$response->send();