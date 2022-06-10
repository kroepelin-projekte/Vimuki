<?php

namespace vimuki\AbstractClasses;

use vimuki\Library\RequestHandler;

/**
 * Class AbstractController
 * @package vimuki\AbstractClasses
 */
abstract class AbstractController
{
    protected $request;

    /**
     * AbstractController constructor.
     * @param RequestHandler $request
     */
    public function __construct(RequestHandler $request)
    {
        $this->request = $request;
    }

    /**
     * @return mixed
     */
    public abstract function indexAction();
}