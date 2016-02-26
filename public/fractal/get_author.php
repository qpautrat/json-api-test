<?php

use League\Fractal\Serializer\JsonApiSerializer;
use Test\Fractal\AuthorTransformer;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

$manager = new Manager();
$manager->parseIncludes(['book', 'book.pages']);
$manager->setSerializer(new JsonApiSerializer());

// Important, notice the Resource Key in the third parameter:
$resource = new Collection($authors, new AuthorTransformer(), 'people');

header('Content-type: application/json');
echo $manager->createData($resource)->toJson();