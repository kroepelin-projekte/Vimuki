<?php

namespace vimuki\Library;

/**
 * Class ControllerFactory
 * @package vimuki\Library
 */
class ControllerFactory
{
    private $namespace;
    private $request;
    private $controllerName;
    private $controller;
    private $urlArray;
    private $pathControllerInServer;

    /**
     * ControllerFactory constructor.
     * @param string $namespace
     * @param RequestHandler $request
     */
    public function __construct(string $namespace, RequestHandler $request)
    {
        $this->namespace = $namespace;
        $this->request = $request;
        $this->buildControllerNameWithNamespace();
        $this->checkIfControllerExists();
        $this->loadController();
    }

    /**
     * Build controller name with namespace zB. vimuki\Controllers\Home\Controller
     */
    private function buildControllerNameWithNamespace()
    {
        $this->controllerName = "\\".$this->namespace."\\Controllers\\".ucfirst($this->request->getControllerName())."\\Controller";
    }

    /**
     * @return int
     */
    private function getLengthOfUrl(): int
    {
        $this->urlArray = explode("/", $_SERVER["REQUEST_URI"]);

        return count($this->urlArray);
    }

    /**
     * Check if controller exists in server
     */
    private function checkIfControllerExists()
    {
        $this->lengthUrl = $this->getLengthOfUrl();
        $this->pathControllerInServer = dirname(__DIR__)."/Controllers/".ucfirst($this->request->getControllerName())."/Controller.php";
        $this->urlArray = explode("/", $_SERVER["REQUEST_URI"]);

        // If controller not existed, redirect to root
        if(!file_exists($this->pathControllerInServer)){
            header('Location: /notfound');
        }
    }

    /**
     * Load controller
     */
    private function loadController()
    {
        $this->controller = new $this->controllerName($this->request);
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }
}