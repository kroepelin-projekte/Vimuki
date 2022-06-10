<?php

namespace vimuki\Views\Home;

use vimuki\Header\HeaderIndex;

/**
 * Class ViewIndex
 * @package vimuki\Views\Home
 */
class ViewIndex
{
    /**
     * Get content of home page
     */
    public static function getContent()
    {
        HeaderIndex::getIndex();
        require_once __DIR__ . "/index.php";
    }
}