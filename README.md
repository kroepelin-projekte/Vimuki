# VIMUKI PHP Site (MVC System).


## Requirements:

* PHP Version >= 5.4
* Curl Library
* Mbstring Library
* Xml Library


## Installation MVC System

1. <code>git clone https://github.com/kroepelin-projekte/Vimuki_PHPSite.git phpsite</code>
2. <code>cd phpsite</code>
3. <code>git checkout Vimuki_PHPSite</code>
4. <code>composer install</code>
5. Passe die Datei <code>public/config.php</code> mit den Daten des BBB Servers und den Daten der ILIAS installation an.


## Installation BBB API  

In root of MVC System:

<code>composer require bigbluebutton/bigbluebutton-api-php:~2.0.0</code>

Link zum Repo des Packages bigbluebutton-api-php: <code></code>https://github.com/bigbluebutton/bigbluebutton-api-php

Anpassungen und Konfigurationen um die PHP-Site korrekt einzubinden: 
In der PHP-Site gibt es eine Datei <code>public/assets/avatars.json</code>, in der die Daten der Avatare (name, url, fullscreen-url, url-bbb-server, alt, description) der PHP-Site gespeichert sind. Die Avatar-Bilder der PHP-Site sind gespeichert unter public/images/avatars. Die Avatar-Bilder im BBB Server sind gespeichert unter /var/www/bigbluebutton-default/images/custom/avatars.

### Config ###

Im Öffentlichen Ordner der PHP-Site (z.B. <code>/var/www/html/phpsite/public</code>) muss folgende config.php Datei hinterlegt werden:

<code>ini_set('display_errors', 0);
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
</code>

Damit die Änderungen der CSS Datei für alle Benutzer sichtbar sind, definieren wir die customSystemUrl in der Methode addUserData() in ./src/Controllers/Room/Controller.php im MVC System. 

<code>$joinMeetingParams->addUserData('customStyleUrl', BBB_SERVER.'/css/custom.css');</code>

Damit das Custom CSS auch aktiv für Moderatoren ist, die durch ILIAS an BBB teilnehmen, muss der Pfad der Custom CSS Datei in der Konfiguration des MultiVC Plugins hinterlegt sein.
