<?php

namespace Test\Neomerx;

use Neomerx\JsonApi\Contracts\Integration\ExceptionThrowerInterface;
use \Symfony\Component\HttpKernel\Exception\ConflictHttpException;
use \Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use \Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;
use \Symfony\Component\HttpKernel\Exception\UnsupportedMediaTypeHttpException;

class ExceptionThrower implements ExceptionThrowerInterface
{
    /**
     * @inheritdoc
     */
    public function throwBadRequest()
    {
        throw new BadRequestHttpException();
    }
    /**
     * @inheritdoc
     */
    public function throwForbidden()
    {
        throw new AccessDeniedHttpException();
    }
    /**
     * @inheritdoc
     */
    public function throwNotAcceptable()
    {
        throw new NotAcceptableHttpException();
    }
    /**
     * @inheritdoc
     */
    public function throwConflict()
    {
        throw new ConflictHttpException();
    }
    /**
     * @inheritdoc
     */
    public function throwUnsupportedMediaType()
    {
        throw new UnsupportedMediaTypeHttpException();
    }
}