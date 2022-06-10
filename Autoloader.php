<?php

/**
 * Class Autoloader
 */
class Autoloader
{
    private $namespace;

    /**
     * Autoloader constructor.
     * @param null $namespace
     */
    public function __construct($namespace = null)
    {
        $this->namespace = $namespace;
    }

    /**
     * Autoload register
     */
    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'));
    }

    /**
     * @param $className
     */
    public function loadClass($className)
    {
        if ($this->namespace !== null) {

            $className = str_replace($this->namespace . '\\', '', $className);
        }

        $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);

        $dirs = array('src/', 'layout/');
        foreach ($dirs as $dir) {
            if (file_exists(ROOT_PATH . $dir . $className . '.php')) {
                require_once ROOT_PATH . $dir . $className . '.php';
                return;
            }
        }
    }
}

$autoloader = new Autoloader('vimuki');
$autoloader->register();
