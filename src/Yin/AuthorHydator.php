<?php

namespace Test\Yin;

use WoohooLabs\Yin\JsonApi\Exception\ExceptionFactoryInterface;
use WoohooLabs\Yin\JsonApi\Hydrator\AbstractHydrator;
use WoohooLabs\Yin\JsonApi\Request\RequestInterface;

class AuthorHydator extends AbstractHydrator
{
    /**
     * Validates a client-generated ID.
     *
     * If the $clientGeneratedId is not a valid ID for the domain object, then
     * the appropriate exception should be thrown: if it is not well-formed then
     * a ClientGeneratedIdNotSupported exception can be raised, if the ID already
     * exists then a ClientGeneratedIdAlreadyExists exception can be thrown.
     *
     * @param string $clientGeneratedId
     * @param \WoohooLabs\Yin\JsonApi\Request\RequestInterface $request
     * @param \WoohooLabs\Yin\JsonApi\Exception\ExceptionFactoryInterface $exceptionFactory
     * @throws \WoohooLabs\Yin\JsonApi\Exception\ClientGeneratedIdNotSupported
     * @throws \WoohooLabs\Yin\JsonApi\Exception\ClientGeneratedIdAlreadyExists
     * @throws \Exception
     */
    protected function validateClientGeneratedId(
        $clientGeneratedId,
        RequestInterface $request,
        ExceptionFactoryInterface $exceptionFactory
    ){
        return true;
    }

    /**
     * Produces a new ID for the domain objects.
     *
     * UUID-s are preferred according to the JSON API specification.
     *
     * @return string
     */
    protected function generateId()
    {
        return 31;
    }

    /**
     * Determines which resource type or types can be accepted by the hydrator.
     *
     * If the hydrator can only accept one type of resources, the method should
     * return a string. If it accepts more types, then it should return an array
     * of strings. When such a resource is received for hydration which can't be
     * accepted (its type doesn't match the acceptable type or types of the hydrator),
     * a ResourceTypeUnacceptable exception will be raised.
     *
     * @return string|array
     */
    protected function getAcceptedType()
    {
        return "people";
    }

    /**
     * Sets the given ID for the domain object.
     *
     * The method mutates the domain object and sets the given ID for it.
     * If it is an immutable object or an array the whole, updated domain
     * object can be returned.
     *
     * @param array $book
     * @param string $id
     * @return mixed|null
     */
    protected function setId($author, $id)
    {
        $author->id = $id;

        return $author;
    }

    /**
     * Provides the attribute hydrators.
     *
     * The method returns an array of attribute hydrators, where a hydrator is a key-value pair:
     * the key is the specific attribute name which comes from the request and the value is an
     * anonymous function which hydrate the given attribute.
     * These closures receive the domain object (which will be hydrated),
     * the value of the currently processed attribute and the "data" part of the request as their
     * arguments, and they should mutate the state of the domain object.
     * If it is an immutable object or an array (and passing by reference isn't used),
     * the closures should return the domain object.
     *
     * @param array $book
     * @return array
     */
    protected function getAttributeHydrator($book)
    {
        return [
            'name' => function($author, $attribute, $data) { var_dump($author, $attribute, $data); }
        ];
    }
    /**
     * Provides the relationship hydrators.
     *
     * The method returns an array of relationship hydrators, where a hydrator is a key-value pair:
     * the key is the specific relationship name which comes from the request and the value is an
     * anonymous function which hydrate the previous relationship.
     * These closures receive the domain object (which will be hydrated),
     * an object representing the currently processed relationship (it can be a ToOneRelationship or
     * a ToManyRelationship object) and the "data" part of the request as their arguments, and they
     * should mutate the state of the domain object.
     * If it is an immutable object or an array (and passing by reference isn't used),
     * the closures should return the domain object.
     *
     * @param array $book
     * @return array
     */
    protected function getRelationshipHydrator($book)
    {
        return [];
    }
}