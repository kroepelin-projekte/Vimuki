<?php
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

use ILIAS\Plugin\VIMUKIWebService\Operations;

/**
 * Class ilVIMUKIServicePlugin
 */
class ilVIMUKIWebServicePlugin extends \ilSoapHookPlugin
{
    /**
     * @var string
     */
    const CTYPE = 'Services';

    /**
     * @var string
     */
    const CNAME = 'WebServices';

    /**
     * @var string
     */
    const SLOT_ID = 'soaphk';

    /**
     * @var string
     */
    const PNAME = 'VIMUKIWebService';

    /**
     * @var self
     */
    protected static $instance = null;

    /**
     * @var bool
     */
    protected static $initialized = false;

    /**
     * @return self
     */
    public static function getInstance()
    {
        if (self::$instance instanceof self) {
            return self::$instance;
        }

        if (!class_exists('ilPluginAdmin')) {
            require_once 'Services/Component/classes/class.ilPluginAdmin.php';
        }

        self::$instance = \ilPluginAdmin::getPluginObject(
            self::CTYPE,
            self::CNAME,
            self::SLOT_ID,
            self::PNAME
        );

        return self::$instance;
    }

    /**
     * Registers the plugin autoloader
     */
    private function registerAutoloader()
    {
        require_once dirname(__FILE__) . '/../autoload.php';
    }

    /**
     * @inheritdoc
     */
    protected function init()
    {
        parent::init();
        $this->registerAutoloader();

        if (!self::$initialized) {
            self::$initialized = true;
        }
    }

    /**
     * @inheritdoc
     */
    public function getPluginName()
    {
        return self::PNAME;
    }

    /**
     * @inheritdoc
     */
    public function getSoapMethods()
    {
        return [
            new Operations\EventVIMUKIObject()
        ];
    }

    /**
     * @inheritdoc
     */
    public function getWsdlTypes()
    {
        return [];
    }
}
