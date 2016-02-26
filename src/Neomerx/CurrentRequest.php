<?php

namespace Test\Neomerx;

use Symfony\Component\HttpFoundation\Request;
use Neomerx\JsonApi\Contracts\Integration\CurrentRequestInterface;

class CurrentRequest implements CurrentRequestInterface
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Get content.
     *
     * @return string|null
     */
    public function getContent()
    {
        return $this->request->getContent();
    }

    /**
     * Get inputs.
     *
     * @return array
     */
    public function getQueryParameters()
    {
        return $this->request->query->all();
    }

    /**
     * Get header value.
     *
     * @param string $name
     *
     * @return string
     */
    public function getHeader($name)
    {
        return $this->request->headers->get($name);
    }
}