<?php

namespace vimuki\Footer;

class FooterIndex
{
    public static function getIndex()
    {
        require_once __DIR__ . '/footer.php';
    }

    public static function getIndexGame()
    {
        require_once __DIR__ . '/footer-game.php';
    }
}