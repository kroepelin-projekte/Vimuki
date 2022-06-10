<?php

namespace vimuki\Views\Notfound;

use vimuki\Header\HeaderIndex;

/**
 * Class ViewIndex
 * @package vimuki\Views\Notfound
 */
class ViewIndex
{
    /**
     * Get content of not found page
     */
    public static function getContent()
    {
        HeaderIndex::getIndex();
        require_once __DIR__ . "/index.php";
    }
}