<?php

namespace vimuki\Head;

class HeadIndex
{
    public static function getIndex()
    {
        require_once __DIR__."/head.tpl.php";
    }
}