<?php

namespace vimuki\Library;

/**
 * Class RequestHandler
 * @package vimuki\Library
 */
class RequestHandler
{
    private $requestUri;
    private $defaultController = "Home";
    private $defaultAction = "index";
    private $controllerName;
    private $actionName;

    /**
     * RequestHandler constructor.
     * @param array $serverVars
     */
    public function __construct(array $serverVars)
    {
        $this->requestUri = $serverVars["REQUEST_URI"];
        $path_split = $this->cutUriParts();
        $this->checkIfUriPartsExists($path_split);
    }

    /**
     * @return array
     */
    private function cutUriParts(): array
    {
        return explode("/", $this->requestUri);
    }

    /**
     * @param array $matches
     */
    private function checkIfUriPartsExists(array $matches)
    {

        // if count($matches) = 1 --> Home Page
        if(count($matches) === 1){
            $this->controllerName = $matches[1];
            $this->actionName = $this->defaultAction;
        }elseif(count($matches) === 2){

            if($matches[1] === ''){
                $this->controllerName = 'home';
            }else{

                $tmp = explode('?', $matches[1]);
                if($tmp[0] === 'room'){
                    $this->controllerName = 'room';
                    $this->actionName = $this->defaultAction;

                }else if($tmp[0] === 'game'){
                    $this->controllerName = 'game';
                    $this->actionName = $this->defaultAction;

                }else{
                    $this->controllerName = 'notfound';
                }
            }
            $this->actionName = $this->defaultAction;

        }elseif(count($matches) > 2){

            $this->controllerName = 'notfound';
            $this->actionName = $this->defaultAction;
        }
    }

    /**
     * @return string
     */
    public function getControllerName(): string
    {
        return $this->controllerName;
    }

    /**
     * @return mixed
     */
    public function getActionName()
    {
        return $this->actionName;
    }
}