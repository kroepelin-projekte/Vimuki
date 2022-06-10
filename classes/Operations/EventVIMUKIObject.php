<?php

/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

namespace ILIAS\Plugin\VIMUKIWebService\Operations;

use ilSessionAppointment;


require_once('VIMUKIBase.php');

/**
 * Class EventVIMUKIObject
 * @package ILIAS\Plugin\VIMUKIWebService\Operations
 */
class EventVIMUKIObject extends VIMUKIBase
{

    /**
     * @return string
     */
    public function getName() {
        return 'eventVIMUKIObject';
    }

    /**
     * @return array
     */
    public function getInputParams() {
        return [
            'sid' => 'xsd:string',
            'multivc_ref_id' => 'xsd:int',
            'session_ref_id' => 'xsd:int',
        ];
    }


    /**
     * @return array
     */
    public function getOutputParams() {
        return [
            'result' => 'xsd:string',
        ];
    }


    /**
     * @return string
     */
    public function getServiceNamespace() {
        return 'urn:ilUserAdministration';
    }


    /**
     * @return string
     */
    public function getServiceStyle() {
        return 'rpc';
    }


    /**
     * @return string
     */
    public function getServiceUse() {
        return 'encoded';
    }


    /**
     * @inheritdoc
     */
    public function getDocumentation() {
        return implode('<br />', [
            'Beside the authentication token (sid) this service accepts: ',
            'param: multivc_ref_id, session_ref_id',
        ]);
    }

    /**
     * @param string $sid
     * @param int $multivcRefId
     * @param int $sessionRefId
     * @return int|mixed
     * @throws \ilDatabaseException
     * @throws \ilObjectNotFoundException
     */
    protected function executeEventVIMUKIObjectOperation(string $sid, int $multivcRefId, int $sessionRefId)
    {
        return $this->getEventCrs($sid, $multivcRefId, $sessionRefId);
    }

    /**
     * @param string $sid
     * @param int $multivcRefId
     * @param int $sessionRefId
     * @return bool|false|string
     * @throws \ilDatabaseException
     * @throws \ilObjectNotFoundException
     */
    private function getEventCrs(string $sid, int $multivcRefId, int $sessionRefId)
    {
        $multiVc = \ilObjectFactory::getInstanceByRefId($multivcRefId);
        $session = \ilObjectFactory::getInstanceByRefId($sessionRefId);

        // If object not session or multivc object, then return false
        if($this->getObjTyped($session) != 'sess' || $this->getObjTyped($multiVc) != 'xmvc'){
            return false;
        }

        $ilObjectSession = new \ilObjSession($sessionRefId);
        $objIdSession = $session->getId();
        $eventId = $ilObjectSession->getEventId();
        $ilSessionAppointment = new ilSessionAppointment($eventId);
        $appointment = $ilSessionAppointment::_lookupAppointment($objIdSession);
        return date('H:i:s d.m.Y', $appointment['start']);

    }

    /**
     * @param $obj
     * @return mixed
     */
    private function getObjTyped($obj)
    {
        return $obj->getType();
    }
}
