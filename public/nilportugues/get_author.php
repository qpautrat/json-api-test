<?php

use NilPortugues\Api\JsonApi\JsonApiSerializer;
use NilPortugues\Api\JsonApi\JsonApiTransformer;
use NilPortugues\Api\JsonApi\Http\Message\Response;
use NilPortugues\Api\Mapping\Mapper;
use Test\Nilportugues\AuthorMapping;
use Test\Nilportugues\BookMapping;
use Test\Nilportugues\PageMapping;
use Zend\Diactoros\ServerRequestFactory;
use NilPortugues\Api\JsonApi\Http\Request\Request;

$request = new Request(ServerRequestFactory::fromGlobals());

$mappings = [
    AuthorMapping::class,
    BookMapping::class,
    PageMapping::class,
];

$mapper = new Mapper($mappings);

$transformer = new JsonApiTransformer($mapper);
$serializer = new JsonApiSerializer($transformer);

header('Content-type: application/json');
echo $serializer->serialize($authors, $request->getFields(), $request->getIncludedRelationships());