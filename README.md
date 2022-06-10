# Vimuki - Virtuelles Museum für Kinder und Jugendliche


## Inhaltsverzeichnis
* [Kurzbeschreibung](#Kurzbeschreibung) 
* [Förderhinweis](#Förderhinweis)
* [Installation](#Installation)
* [Benutzung](#Benutzung)
* [Credits](#Credits)
* [Lizenz](#Lizenz)


### Kurzbeschreibung ###
Wie lässt sich das Virtuelle Museum für Kinder und Jugendliche (VIMUKI) mit den Inhalten anderer Museen und Kultureinrichtungen ausbauen? Wie entsteht ein virtueller Raum, der durch die Anzahl und Diversität des digitalen Angebots zentrale Anlaufstelle für Schüler*innen, Lehrer*innen und Kulturbegeisterte ist? (aus der Beschreibung des Teilprojekts auf www.museum4punkt0.de)

Vimuki 2.0 ist eine Kombination aus verschiedenen Webanwendungen. Ein Lernportal wurde an eine bereits bestehende Landingpage angedockt. Über die ILIAS-Lernplattform können Online-Livetouren durch Museen in Form von Videokonferenzen gebucht und durchgeführt werden. Am integrierten Videokonferenztools BigBlueButton wurden Anpassungen vorgenommen und eine php-Landingpage vorgeschaltet. Der Einstieg in die virtuelle Führung kann über ein von der KONSONAUTIC Solutions GmbH und entertainment UG entwickeltes und auf die php-Landingpage integriertes Spiel erfolgen.


### Förderhinweis ###

Diese Webanwendung ist entstanden im Verbundprojekt museum4punkt0 – Digitale Strategien für das Museum der Zukunft, Teilprojekt [Teilprojektname einfügen gemäß Verbund-Website, Kurzform möglich]. Das Projekt museum4punkt0 wird gefördert durch die Beauftragte der Bundesregierung für Kultur und Medien aufgrund eines Beschlusses des Deutschen Bundestages. 

Weitere Informationen: www.museum4punkt0.de

![Logo: BKM](https://github.com/museum4punkt0/media_storage/blob/2c46af6cb625a2560f39b01ecb8c4c360733811c/BKM_Fz_2017_Web_de.gif)

![NeustartKultur](https://github.com/museum4punkt0/Object-by-Object/blob/22f4e86d4d213c87afdba45454bf62f4253cada1/04%20Logos/BKM_Neustart_Kultur_Wortmarke_pos_RGB_RZ_web.jpg)

### Installation ###

#### Komponente 1: Lernplattform ILIAS ####
Die Lernplattform ILIAS wurde im Standard in Version 6.12 installiert.

Offizielles Repository der Lernplattform ILIAS https://github.com/ILIAS-eLearning/ILIAS. 
Hinweise zur Installation von ILIAS finden Sie unter: https://docu.ilias.de/ilias.php?ref_id=367&obj_id=122176&cmd=layout&cmdClass=illmpresentationgui&cmdNode=eh&baseClass=ilLMPresentationGUI

#### Komponente 2: Skin für ILIAS ####
Anpassung der Lernplattform im Stil von Vimuki.

Eine detailierte Installationsanleitung findet sich im Branch Vimuki_Skin.

#### Komponente 3: PersDashboard Plugin für ILIAS ####
Das PersDashboard Plugin in Version 1.0 muss in ILIAS installiert werden, um auf dem Dashboard in ILIAS zusätzliche Informationen für alle Nutzer zu platzieren.

Eine detailierte Installationsanleitung findet sich im folgenden Repository: https://github.com/kroepelin-projekte/PersDashboard.git

Version 1.0

##### Konfiguration #####

Die Konfiguration des Plugins ist zu finden unter Administration  => ILIAS erweitern => Plugins. Neben dem Plugin Aktionen und Konfigurieren auswählen.

Inhalt

<p class="pers-dash-first-p">Lust auf weitere Livetouren?</p>
<p><a href="https://vimuki.org" class="pers-dash-link-to-vimuki-site" target="_blank">Hier</a> finden Sie alle unsere Angebote.</p>

Style

.pers-dash-first-p  {
    font-weight: bold;
}
.pers-dash-link-to-vimuki-site:link  {
    color: blue;
    text-decoration: underline;
}
.pers-dash-link-to-vimuki-site:visited  {
    color: blue;
    text-decoration: underline;
}


#### Komponente 4: BigBlueButton #### 
Als Videokonferenztool zur Durchführung der Online-Livetouren wird BigBlueButton in Version 2.4 verwendet.

BigBlueButton muss auf einem eigenen Server installiert werden und kann auf Grund der Systemvoraussetzungen nicht auf dem gleichen Server wie ILIAS installiert werden. Die Hinweise für die Installation befinden sich hier: https://docs.bigbluebutton.org/2.4/install.html

Die detailierten Anpassungen und die CSS Datei für BigBlueButton befindet sich im Branch CustomizingBBB 

#### Komponente 5: MultiVC ILIAS Plugin ####
Das MultiVC Plugin muss in ILIAS installiert werden, um eine Integration von BigBlueButton in ILIAS zu ermöglichen.

Hier finden Sie das Repository und Hinweise für die Installation: https://github.com/internetlehrer/MultiVc

Die installierte Version des  MultiVC Plugins ist 5.2.

##### Customizing #####

Es ist eine Anpassung des Logout Links im MultVC Plugin notwendig. Änderung in der Datei ./classes/class.ilApiBBB.php in der Methode setCreateMeetingParam():

$joinBtnUrl= 'https://vimuki.org';
Nach jedem Update im MultiVC Plugin muss die Variable $joinBtnUrl erneut festgelegt werden.

Die Konfiguration des Plugins ist zu finden unter Administration  => ILIAS erweitern => Plugins. Neben dem Plugin Aktionen und Konfigurieren auswählen. Einen Screenshot der notwendigen Konfiguration finden Sie auf der nächsten Seite.

TODO: BILD DER KONFIG

#### Komponente 6: VIMUKI WebService Plugin ####
Bei dem Vimuki WebService Plugin handelt es sich um ein Soap Hook Plugin für ILIAS, dass die Standard Funktionen der ILIAS SOAP Schnittstelle um die Funktion eventVIMUKIObject erweitert. Bei Angabe der ref_id’s des MultiVC Objekts und der Sitzung wird die Startzeit der Sitzung zurückgegeben. Diese Startzeit wird in der PHP-Site benötigt, um zu bestimmen, ob noch genug Zeit für das Einstiegsspiel oder die Avatar-Auswahl ist.

Eine detailierte Installationsanleitung findet sich im Branch VIMUKIWebService 

#### Komponente 7: Vimuki PHP Site ####
Für das Vimuki Projekt wurde eine spezielle PHP-basierte Website (MVC System) entwickelt, um das Eingangsspiel einzubinden und Zugang zu den BBB Räumen über die BBB API zu regulieren. Die PHP-Site funktioniert nur in Kombination mit der BBB API und dem Vimuki WebService Plugin.

Eine detailierte Installationsanleitung findet sich im Branch PHPSite. 

Link zum Repo des Packages bigbluebutton-api-php: https://github.com/bigbluebutton/bigbluebutton-api-php

Anpassungen und Konfigurationen um die PHP-Site korrekt einzubinden: 
In der PHP-Site gibt es eine Datei public/assets/avatars.json, in der die Daten der Avatare (name, url, fullscreen-url, url-bbb-server, alt, description) der PHP-Site gespeichert sind. Die Avatar-Bilder der PHP-Site sind gespeichert unter public/images/avatars. Die Avatar-Bilder im BBB Server sind gespeichert unter /var/www/bigbluebutton-default/images/custom/avatars.

Config.php

Im Öffentlichen Ordner der PHP-Site (z.B. /var/www/html/phpsite/public) muss folgende config.php Datei hinterlegt werden:

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
ini_set("session.cache_limiter", "must-revalidate"); // Prevent „Document not found“ when click on back button in browser
ini_set("soap.wsdl_cache_enabled", 0); // Prevent WSDL cache

date_default_timezone_set('Europe/Berlin');
session_start();
define( 'ROOT_PATH', dirname( __DIR__ ) . '/' );
define( 'BASIC_PATH', dirname( __DIR__ ) );

// BBB SERVER
const BBB_SECRET = '';
const BBB_SERVER = 'https://tours.vimuki.org';
const BBB_SERVER_BASE_URL = 'https://tours.vimuki.org'/bigbluebutton/';


// ILIAS INSTALLATION
const ILIAS_BASE_URL = 'https://tutor.vimuki.org';
const ILIAS_CLIENT = 'vimuki';
const ILIAS_DOMAIN_NAME = 'tutor.vimuki.org';
const NIC_ID = "";
const ILIAS_SOAP_USERNAME = ""; // the name of the soap user you created in the ILIAS administration
const ILIAS_SOAP_PASSWORD = ""; // password of the soap user

require_once("../src/Soap/nusoap.php"); // path der nusoap.php

require_once ROOT_PATH. 'Autoloader.php';

Damit die Änderungen der CSS Datei für alle Benutzer sichtbar sind, definieren wir die customSystemUrl in der Methode addUserData() in ./src/Controllers/Room/Controller.php im MVC System. 

$joinMeetingParams->addUserData('customStyleUrl', BBB_SERVER.'/css/custom.css');

Damit das Custom CSS auch aktiv für Moderatoren ist, die durch ILIAS an BBB teilnehmen, muss der Pfad der Custom CSS Datei in der Konfiguration des MultiVC Plugins hinterlegt sein.


### Benutzung ###

#### Vimuki WebService ####

Der Aufruf der Seite erfolgt über die folgende URL: domainname.de/room?meetingId=MEETINGID&eventId=EVENTID&page=PAGE

MEETINGID: ist die ref_id des MultiVC Objekts in ILIAS
EVENTID: ist die ref_id der Sitzung in ILIAS 
Page: ist die Seitenzahl der PHP-Site, Standard ist 1 

### Credits ###
Auftraggeber/Rechteinhaber: Historisches Museum Saar https://www.historisches-museum.org

Urheber: Kröpelin Projekt GmbH www.kroepelin-projekte.de

Unterstützende Software: 
[MultiVC Plugin der Internet Lehrer GmbH](https://github.com/internetlehrer/MultiVc), 
[BigBlueButton](https://docs.bigbluebutton.org/)

### Lizenz ###
Copyright © 2021, Historisches Museum Saar 

[GPL](https://github.com/museum4punkt0/VIMUKI_2.0/blob/main/LICENSE)
- betrifft alle ILIAS und alle genutzten oder für dieses Projekt erstellten Erweiterungen
- [MultiVC Plugin](https://github.com/internetlehrer/MultiVc/blob/master/LICENSE)

[LGPL](https://github.com/bigbluebutton/bigbluebutton/blob/develop/LICENSE)
betrifft alle Programmierungen in BigBlueButton






