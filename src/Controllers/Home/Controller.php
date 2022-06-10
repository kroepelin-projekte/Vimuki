<?php

namespace vimuki\Controllers\Home;

include BASIC_PATH . "/vendor/autoload.php";

use vimuki\AbstractClasses\AbstractController;
use vimuki\Views\Home\ViewIndex;

/**
 * Class Controller
 * @package vimuki\Controllers\Home
 */
class Controller extends AbstractController
{
    /**
     * @return mixed|void
     */
    public function indexAction()
    {
        $this->getView();
    }

    /**
     * Get content of view
     */
    private function getView()
    {
        ViewIndex::getContent();
    }
}