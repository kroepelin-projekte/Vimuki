<?php

/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

namespace ILIAS\Plugin\VIMUKIWebService\Operations;

use ilSoapPluginException;

/**
 * Class VIMUKIBase
 * @package ILIAS\Plugin\VIMUKIWebService\Operations
 */
abstract class VIMUKIBase extends \ilAbstractSoapMethod
{
    /**
     * VIMUKIBase constructor.
     */
    public function __construct()
    {
        parent::__construct(true);
    }

    /**
     * @inheritdoc
     * @throws ilSoapPluginException
     */
    public function execute(array $params)
    {
        $sessionId = $this->checkSessionInitIlias($params);

        if( (bool)strlen($sessionId)) {
            $objParam = $this->prepareEventVIMUKIObject($params);
            return $this->executeEventVIMUKIObjectOperation($sessionId, $objParam['meetingRefId'], $objParam['sessionRefId']);
        }
    }

    /**
     * @param array $params
     * @return string
     * @throws ilSoapPluginException
     */
    private function checkSessionInitIlias(array $params): string
    {
        // check input params
        $this->checkParameters($params);

        // get sessId and init ILIAS
        $sessionId = (isset($params[0])) ? $params[0] : '';
        $this->initIliasAndCheckSession($sessionId);

        return $sessionId;
    }

    /**
     * @param array $params
     * @return array
     * @throws ilSoapPluginException
     */
    private function prepareEventVIMUKIObject(array $params): array
    {
        $rArr = [];

        if (!isset($params[1]) || !is_numeric(filter_var($params[1], FILTER_SANITIZE_NUMBER_INT)) ) {
            $this->__raiseError('The passed argument "multivc_ref_id" is not valid', 0);
        } else {
            //$rArr['refId'] = $params[1];
            $rArr['meetingRefId'] = $params[1];
        }

        if (!isset($params[2]) || !is_numeric(filter_var($params[2], FILTER_SANITIZE_NUMBER_INT)) ) {
            $this->__raiseError('The passed argument "session_ref_id" is not valid', 0);
        } else {
            //$rArr['refId'] = $params[1];
            $rArr['sessionRefId'] = $params[2];
        }
        return $rArr;
    }

    /**
     * @param string $sid
     * @param int $multivcRefId
     * @param int $sessionRefId
     * @return mixed
     */
    abstract protected function executeEventVIMUKIObjectOperation(string $sid, int $multivcRefId, int $sessionRefId);
}
