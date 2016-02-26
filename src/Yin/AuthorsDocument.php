<?php

namespace Test\Yin;

use WoohooLabs\Yin\JsonApi\Document\AbstractCollectionDocument;
use WoohooLabs\Yin\JsonApi\Schema\JsonApi;

class AuthorsDocument extends AbstractCollectionDocument
{
    /**
     * Provides information about the "jsonApi" section of the current document.
     *
     * The method returns a new JsonApi schema object if this section should be present or null
     * if it should be omitted from the response.
     *
     * @return \WoohooLabs\Yin\JsonApi\Schema\JsonApi|null
     */
    public function getJsonApi()
    {
        return new JsonApi("1.0");
    }

    /**
     * Provides information about the "meta" section of the current document.
     *
     * The method returns an array of non-standard meta information about the document. If
     * this array is empty, the section won't appear in the response.
     *
     * @return array
     */
    public function getMeta()
    {
        return [];
    }

    /**
     * Provides information about the "links" section of the current document.
     *
     * The method returns a new Links schema object if you want to provide linkage data
     * for the document or null if the section should be omitted from the response.
     *
     * @return \WoohooLabs\Yin\JsonApi\Schema\Links|null
     */
    public function getLinks()
    {
        return null;
    }
}