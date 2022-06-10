<?php

namespace vimuki\Controllers\Room;

include BASIC_PATH . "/vendor/autoload.php";

use BigBlueButton\BigBlueButton;
use BigBlueButton\Parameters\GetMeetingInfoParameters;
use BigBlueButton\Parameters\IsMeetingRunningParameters;
use BigBlueButton\Parameters\JoinMeetingParameters;
use vimuki\AbstractClasses\AbstractController;
use vimuki\Views\Room\ViewIndex;

/**
 * Class Controller
 * @package vimuki\Controllers\Room
 */
class Controller extends AbstractController
{
    /**
     * PageId = 1 --> Start page
     * PageId = 2 --> Page select avatar and first game plays
     * PageId = 3 --> Page fill name
     * PageId = 4 --> Redirection to BBB Room
     */
    const PAGE_IDS = [1, 2, 3, 4];
    /**
     * @return bool
     */
    public function indexAction()
    {
        set_time_limit(0); // To avoid curl error

        $error = '';
        $selectedAvatar = '';
        $meetingRefId = $this->getMeetingRefId();
        $eventRefId = $this->getEventRefId();
        $pageId = $this->getPageId();

        // Redirect to not found page if parameter meetingId, eventId or pageId not given in url or if pageId is not 1,2,3 or 4
        if(!$eventRefId || !$meetingRefId || !$pageId || !in_array($pageId, self::PAGE_IDS)){
            header('Location: /notfound');
        }

        if($pageId === '5' || $pageId === '6'){
            $meeting = [];
            $this->getView($pageId, compact('meeting'));
            return false;
        }

        $this->soapConnection();
        $avatars = json_decode(file_get_contents('./assets/avatars.json'), true);
        $randomAvatar = $this->getRandomAvatar($avatars);

        $meetingId = $this->getObjectId($meetingRefId);
        $eventTime = $this->event($meetingRefId, $eventRefId);

        // It is like that domainname.de;il_client;obj_id
        $idMultiVCObject = ILIAS_DOMAIN_NAME. ';' .ILIAS_CLIENT . ';' . $meetingId;

        $meetingIsRunning = $this->multiVcIsRunning($idMultiVCObject);

        if(!$eventTime)  {
            $error = 'Zur Zeit gibt es keine Führung';
        }else{
            if(!$meetingIsRunning)  {
                $error = 'Die Führung hat noch nicht begonnen';
            }
        }

        $dateTime = explode(' ', $eventTime);
        $time = $dateTime[0];
        $date = $dateTime[1];

        if($pageId === '2'){

            if(!$meetingIsRunning || !$eventTime)  {
                $this->redirectIfEventDontExistOrIsNotRunning($meetingRefId, $eventRefId);
            }

            $order = [];
            for($i = 0; $i < 33; $i++){
                $order[] = $i;
            }

            shuffle($order);

           $shuffleAvatars = [];
           foreach($order as $key => $value){

               foreach ($avatars as $avatarKey => $val) {

                   if($order[$key] === (int) $avatarKey) {
                       $shuffleAvatars[$key] = [
                           'key' => $avatarKey,
                           'name' => $val['name'],
                           'url' => $val['url'],
                           'fullscreen-url' => $val['fullscreen-url'],
                           'url-bbb-server' => $val['url-bbb-server'],
                           'alt' => $val['alt'],
                           'description' => $val['description']
                       ];
                   }
               }
           }

           $avatars = $shuffleAvatars;
           $randomAvatar = $shuffleAvatars[rand(0, 32)]['url-bbb-server'];

        }elseif($pageId === '3') {

            if(!$meetingIsRunning || !$eventTime)  {
                $this->redirectIfEventDontExistOrIsNotRunning($meetingRefId, $eventRefId);
            }

            $selectedAvatar = '';
            if (isset($_POST['select-avatar'])) {
                $selectedAvatar = $_POST['selected-avatar'];
            }

        }elseif($pageId === '4'){

            if(!$meetingIsRunning || !$eventTime)  {
                $this->redirectIfEventDontExistOrIsNotRunning($meetingRefId, $eventRefId);
            }
            $avatar = $_POST['hidden-selected-avatar'];
            $name = $_POST['name'];

            if($avatar === ''){
                $avatar = $randomAvatar;
            }

            if($avatar === null || $name === null || $avatar === '' || $name === ''){
               $this->redirectIfEventDontExistOrIsNotRunning($meetingRefId, $eventRefId);
            }else {

                if ($meetingIsRunning === true) {
                    $this->joinAction($idMultiVCObject, $name, $avatar);
                }
            }

        }

        $meeting = [
            'meeting_ref_id' => $meetingRefId,
            'event_ref_id' => $eventRefId,
            'error' => $error,
            'date' => $date,
            'time' => $time,
            'avatars' => $avatars,
            'random_avatar' => $randomAvatar,
            'selected-avatar' => $selectedAvatar
        ];

        $this->getView($pageId, compact('meeting'));
    }

    /**
     * @param int $meetingRefId
     * @param int $eventRefId
     */
    private function redirectIfEventDontExistOrIsNotRunning(int $meetingRefId, int $eventRefId)
    {
        header('Location: /room?meetingId='.$meetingRefId.'&eventId='.$eventRefId.'&page=1');
    }

    /**
     * @param array $avatars
     * @return string
     */
    private function getRandomAvatar(array $avatars): string
    {
        $randomIndex = rand(0, 32);
        return $avatars[$randomIndex]['url-bbb-server'];
    }

    /**
     * @return array
     */
    private function explodeUrl(): array
    {
        $url = $_SERVER['REQUEST_URI'];
        $tmpUrl = explode('?', $url);
        $urlArray = explode('/', $tmpUrl[1]);
        return explode('&', $urlArray[0]);
    }

    /**
     * Get event refId from url
     *
     * @return mixed
     */
    private function getEventRefId()
    {
        $urlExploded = $this->explodeUrl();
        $eventIdArray = explode('=', $urlExploded[1]);

        if($eventIdArray === '' || !is_numeric($eventIdArray[1])){
            return false;
        }
        return $eventIdArray[1];
    }

    /**
     * Get meeting refId from url
     *
     * @return bool|mixed
     */
    private function getMeetingRefId()
    {
        $urlExploded = $this->explodeUrl();
        $meetingIdArray = explode('=', $urlExploded[0]);

        if($meetingIdArray === '' || !is_numeric($meetingIdArray[1])){
            return false;
        }
        return $meetingIdArray[1];
    }

    /**
     * Get pageId from url
     *
     * @return bool|mixed
     */
    private function getPageId()
    {
        $urlExploded = $this->explodeUrl();
        $pageIdArray = explode('=', $urlExploded[2]);

        if($pageIdArray === '' || !is_numeric($pageIdArray[1])){
            return false;
        }
        return $pageIdArray[1];
    }

    /**
     * Get objectId with soap
     *
     * @param $refId
     * @return int
     */
    private function getObjectId($refId)
    {
        $this->soapLogin();
        $result = $GLOBALS["client"]->call("getObjIdsByRefIds", array($GLOBALS["session_id"], [$refId]));
        return $result[0];
    }

    /**
     * @param $refId
     * @return bool
     */
    private function multiVcIsRunning($meetingId): bool
    {
        $bbb = new BigBlueButton(BBB_SERVER_BASE_URL, BBB_SECRET);
        $isMeetingRunningParams = new IsMeetingRunningParameters($meetingId);

        try {

            $response = $bbb->isMeetingRunning($isMeetingRunningParams);
            return $response->isRunning();

        } catch (\RuntimeException $e) {

            echo $e->getMessage();
        }
    }

    /**
     * @param $multiVcID
     * @return string
     */
    private function getModeratorPassword($multiVcID):string
    {
        $bbb = new BigBlueButton(BBB_SERVER_BASE_URL, BBB_SECRET);
        $getMeetingInfoParams = new GetMeetingInfoParameters($multiVcID, '');
        $meetingInfo = (array) $bbb->getMeetingInfo($getMeetingInfoParams);

        $moderatorPW = '';
        foreach($meetingInfo as $key => $value){

            $valueTmp = (array) $value ;
            foreach($valueTmp as $k => $val){

                if($k === 'moderatorPW'){
                    $moderatorPW = $val;
                    break;
                }
            }
        }
        return $moderatorPW;
    }

    /**
     * @param $multiVcID
     * @return string
     */
    private function getAttendeePassword($multiVcID):string
    {
        $bbb = new BigBlueButton(BBB_SERVER_BASE_URL, BBB_SECRET);
        $getMeetingInfoParams = new GetMeetingInfoParameters($multiVcID, '');
        $meetingInfo = (array) $bbb->getMeetingInfo($getMeetingInfoParams);

        $attendeePW = '';
        foreach($meetingInfo as $key => $value){

            $valueTmp = (array) $value ;
            foreach($valueTmp as $k => $val){

                if($k === 'attendeePW'){
                    $attendeePW = $val;
                    break;
                }
            }
        }
        return $attendeePW;
    }

    /**
     * @param $multiVcID
     * @param $name
     * @param $avatar
     */
    private function joinAction($multiVcID, $name, $avatar)
    {
        $bbb = new BigBlueButton(BBB_SERVER_BASE_URL, BBB_SECRET);
        $joinMeetingParams = new JoinMeetingParameters($multiVcID, $name, $this->getAttendeePassword($multiVcID));
        $joinMeetingParams->setRedirect(true);
        $joinMeetingParams->setAvatarURL($avatar);
        $joinMeetingParams->addUserData('customStyleUrl', BBB_SERVER.'/css/custom.css');
        $url = $bbb->getJoinMeetingURL($joinMeetingParams);
        header('Location: ' . $url);
    }

    /**
     * @param int $page
     * @param array $variables
     */
    private function getView(int $page, $variables = [])
    {
        ViewIndex::getContent($page, $variables);
    }

    /**
     * Create soap connection to ILIAS
     */
    private function soapConnection()
    {
        $GLOBALS["ilias_installation_path"] = NIC_ID; // --> NIC ID
        $GLOBALS["client"] = new \nusoap_client(ILIAS_BASE_URL . "/webservice/soap/server.php?wsdl&client_id=".ILIAS_CLIENT, true);
        $GLOBALS["client"]->soap_defencoding = 'UTF-8';
        $GLOBALS["error"] = null;
    }

    /**
     * Login in ILIAS with Soap
     */
    private function soapLogin()
    {
        $par = array( "client" => ILIAS_CLIENT, "username" => ILIAS_SOAP_USERNAME, "password" => ILIAS_SOAP_PASSWORD);
        $GLOBALS["session_id"] = $GLOBALS["client"]->call("login", $par); // If login success, it returns a string. If login failed, it returns an empty array

    }

    /**
     * @param int $meetingRefId
     * @param int $eventRefId
     * @return bool
     */
    private function event(int $meetingRefId, int $eventRefId)
    {
        $this->soapLogin();

        $err = $GLOBALS["client"]->getError();
        if ($err) {
            // TODO
        }
        return $GLOBALS["client"]->call("eventVIMUKIObject", array($GLOBALS["session_id"], $meetingRefId, $eventRefId));
    }
}