<?php

namespace vimuki\Views\Game;

use vimuki\Footer\FooterIndex;

/**
 * Class ViewIndex
 * @package vimuki\Views\Home
 */
class ViewIndex
{
    public static function getContent(int $idGame)
    {
        if($idGame === 1) {
            require_once __DIR__ . "/index-game-1.php";
        }else if($idGame === 2){
            require_once __DIR__ . "/index-game-2.php";
        }
        FooterIndex::getIndexGame();
    }
}