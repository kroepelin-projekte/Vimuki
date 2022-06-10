<?php

namespace vimuki\Controllers\Notfound;

include BASIC_PATH . "/vendor/autoload.php";

use vimuki\AbstractClasses\AbstractController;
use vimuki\Views\Notfound\ViewIndex;

/**
 * Class Controller
 * @package vimuki\Controllers\Notfound
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