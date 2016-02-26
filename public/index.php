<?php

include '../vendor/autoload.php';

use Test\Evaneos\Author;
use Test\Evaneos\Book;
use Test\Evaneos\Page;

$author = new Author(1, 'ipman', new Book(1, 'Youahhh hiii shwinngggg tsonzg dong !!!', [new Page(1, 'Sommaire'), new Page(2, 'Preface')]));
$author2 = new Author(2, 'stallone', new Book(2, 'BAHHHHHHRGG', [new Page(3, 'FIN')]));

$authors = [$author, $author2];

include $_GET['lib'] . '/' . $_GET['action'] . '.php';

