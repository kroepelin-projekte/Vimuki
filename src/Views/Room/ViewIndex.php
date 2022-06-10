<?php

namespace vimuki\Views\Room;

use vimuki\Footer\FooterIndex;
use vimuki\Header\HeaderIndex;

/**
 * Class ViewIndex
 * @package vimuki\Views\Room
 */
class ViewIndex
{
    /**
     * @param $page
     * @param array $variables
     */
    public static function getContent($page, $variables = [])
    {
        extract($variables);

        if($page === 1) {
            HeaderIndex::getIndex();
            require_once __DIR__ . "/index.php";
            FooterIndex::getIndex();
        }elseif($page === 2) {
            HeaderIndex::getIndex();
            require_once __DIR__ . "/index-avatars.php";
            FooterIndex::getIndex();
        }elseif($page === 3) {
            HeaderIndex::getIndex();
            require_once __DIR__ . "/index-input-name.php";
            FooterIndex::getIndex();
        }
    }
}