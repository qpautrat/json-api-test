<?php

namespace Test\Yin;

use WoohooLabs\Yin\JsonApi\Transformer\AbstractResourceTransformer;

class BookResourceTransformer extends AbstractResourceTransformer
{
    /**
     * Provides information about the "type" section of the current resource.
     *
     * The method returns the type of the current resource.
     *
     * @param array $book
     * @return string
     */
    public function getType($book)
    {
        return "book";
    }

    /**
     * Provides information about the "id" section of the current resource.
     *
     * The method returns the ID of the current resource which should be a UUID.
     *
     * @param array $book
     * @return string
     */
    public function getId($book)
    {
        return $book->id;
    }

    /**
     * Provides information about the "meta" section of the current resource.
     *
     * The method returns an array of non-standard meta information about the resource. If
     * this array is empty, the section won't appear in the response.
     *
     * @param array $book
     * @return array
     */
    public function getMeta($book)
    {
        return [];
    }

    /**
     * Provides information about the "links" section of the current resource.
     *
     * The method returns a new Links schema object if you want to provide linkage
     * data about the resource or null if it should be omitted from the response.
     *
     * @param array $book
     * @return \WoohooLabs\Yin\JsonApi\Schema\Links|null
     */
    public function getLinks($book)
    {
        return null;
    }

    /**
     * @param array $book
     * @return string
     */
    public function getSelfLinkHref(array $book)
    {
        return "/books/" . $this->getId($book);
    }

    /**
     * Provides information about the "attributes" section of the current resource.
     *
     * The method returns an array of attributes if you want the section to
     * appear in the response or null if it should be omitted. In the returned array,
     * the keys signify the attribute names, while the values are closures receiving the
     * domain object as an argument, and they should return the value of the corresponding
     * attribute.
     *
     * @param array $book
     * @return array
     */
    public function getAttributes($book)
    {
        return [
            "title" => function($book) { return $book->title; },
            "slug" => function($book) { return $book->slug; }
        ];
    }

    /**
     * Returns an array of relationship names which are included in the response by default.
     *
     * @param array $book
     * @return array
     */
    public function getDefaultIncludedRelationships($book)
    {
        return [];
    }

    /**
     * Provides information about the "relationships" section of the current resource.
     *
     * The method returns an array where the keys signify the relationship names,
     * while the values are closures receiving the domain object as an argument,
     * and they should return a new relationship instance (to-one or to-many).
     *
     * @param array $book
     * @return array
     */
    public function getRelationships($book)
    {
        return [];
    }
}