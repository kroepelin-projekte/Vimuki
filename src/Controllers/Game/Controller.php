<?php

namespace vimuki\Controllers\Game;

include BASIC_PATH . "/vendor/autoload.php";

use vimuki\AbstractClasses\AbstractController;
use vimuki\Views\Game\ViewIndex;

/**
 * Class Controller
 * @package vimuki\Controllers\Home
 */
class Controller extends AbstractController
{
    public function indexAction()
    {
        $explodedUrl = explode('=', $_SERVER['REQUEST_URI']);
        $idGame = $explodedUrl[1];
        $this->getView($idGame);
    }

    /**
     * Get content of view
     */
    private function getView(int $idGame)
    {
        ViewIndex::getContent($idGame);
    }
}
