<?php
/* Copyright (c) 1998-2018 ILIAS open source, Extended GPL, see docs/LICENSE */


function getAllFiles($dir)
{
    $files = [];
    foreach( scandir($dir) as $filename ) {
        $filename = trim($filename);
        if ( $filename === '.' || $filename === '..' ) {
            continue;
        }
        $filePath = $dir . '/' . $filename;
        if ( is_dir($filePath) ) {
            foreach ( getAllFiles($filePath) as $childFilename ) {
                $files[] = $filename . '/' . $childFilename;
            }
        } else {
            $files[] = $filename;
        }
    }
    return $files;
}

$dir = dirname(__FILE__) . '/classes';
foreach ( getAllFiles( $dir ) as $file ) {
    if( substr($file, -4) === '.php' ) {
        require_once( $dir . '/' . $file );
    }
}