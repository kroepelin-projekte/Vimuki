<?php

namespace vimuki;

use vimuki\Library\RequestHandler;
use vimuki\Library\ControllerFactory;

/**
 * Class Init
 * @package vimuki
 */
class Init
{
    private $requestHandler;
    private $controllerFactory;
    private $controller;

    /**
     * Init constructor.
     */
    public function __construct()
    {
        $this->requestHandler = new RequestHandler($_SERVER);
        $this->controllerFactory = new ControllerFactory(__NAMESPACE__,$this->requestHandler);
        $this->controller = $this->controllerFactory->getController();
        $action = $this->requestHandler->getActionName()."Action";
        $this->controller->$action();
    }
}