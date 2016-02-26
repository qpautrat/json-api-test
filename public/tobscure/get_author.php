<?php

use Tobscure\JsonApi\Document;
use Tobscure\JsonApi\Collection;

use Test\Tobscure\AuthorSerializer;

// Create a new collection of posts, and specify relationships to be included.
$collection = (new Collection($authors, new AuthorSerializer));
$collection->with(['book']);

// Create a new JSON-API document with that collection as the data.
$document = new Document($collection);

// Output the document as JSON.
header('Content-type: application/json');
echo json_encode($document);