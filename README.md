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

![Bild der Konfiguration in ILIAS](https://github.com/museum4punkt0/VIMUKI_2.0/blob/main/MultiVC-Config.png)

#### Komponente 6: VIMUKI WebService Plugin ####
Bei dem Vimuki WebService Plugin handelt es sich um ein Soap Hook Plugin für ILIAS, dass die Standard Funktionen der ILIAS SOAP Schnittstelle um die Funktion eventVIMUKIObject erweitert. Bei Angabe der ref_id’s des MultiVC Objekts und der Sitzung wird die Startzeit der Sitzung zurückgegeben. Diese Startzeit wird in der PHP-Site benötigt, um zu bestimmen, ob noch genug Zeit für das Einstiegsspiel oder die Avatar-Auswahl ist.

Eine detailierte Installationsanleitung findet sich im Branch VIMUKIWebService 

#### Komponente 7: Vimuki PHP Site ####
Für das Vimuki Projekt wurde eine spezielle PHP-basierte Website (MVC System) entwickelt, um das Eingangsspiel einzubinden und Zugang zu den BBB Räumen über die BBB API zu regulieren. Die PHP-Site funktioniert nur in Kombination mit der BBB API und dem Vimuki WebService Plugin.

Eine detailierte Installationsanleitung findet sich im Branch Vimuki_PHPSite. 

### Benutzung ###

#### Verwendung der PHP-Site (MVC System) mit dem Vimuki WebService ####

Der Aufruf der Seite erfolgt über die folgende URL: <code>domainname.de/room?meetingId=MEETINGID&eventId=EVENTID&page=PAGE</code)

MEETINGID: ist die ref_id des MultiVC Objekts in ILIAS
EVENTID: ist die ref_id der Sitzung in ILIAS 
Page: ist die Seitenzahl der PHP-Site, Standard ist 1 

Die PHP-Site übernimmt die Startzeit der Sitzung durch das Vimuki WebService Plugin. Dieses Plugin erhält durch einen SOAP-Aufruf die ref_id‘s des MultiVC Objekt und der Sitzung und gibt die Startzeit der Sitzung zurück. 

Handelt es sich bei dem Objekt zur gegeben MEETINGID nicht um ein MultiVC Objekt oder handelt es bei dem Objekt der gegebene EVENTID nicht um eine Sitzung, so wird folgender Fehler angezeigt: „Zur Zeit gibt es keine Führung“. 

Die PHP-Site prüft durch die BBB API, ob der BBB Raum läuft. Sollte der BBB Raum bisher nicht gestartet sein, wird folgender Fehler angezeigt: „Die Führung hat noch nicht begonnen“. 


##### Seite 1: sichtbar für Benutzer #####
Auf der ersten Seite kann der Start Button gedrückt werden.

![Seite 1](https://github.com/museum4punkt0/VIMUKI_2.0/blob/main/webservice-seite-1.png)

##### Seite 2: sichtbar für Benutzer #####
Der gezeigte Inhalt von Seite 2 ist abhängig von der Zeit bis zur Durchführung der Führung (Startzeit):

i)	Beträgt die Dauer bis zur Startzeit mehr als 6 Minuten 30 Sekunden, kann das Spiel* gestartet werden und man wählt einen Avatar aus.
ii)	Liegt die Dauer bis zur Startzeit zwischen 1 Minuten 30 Sekunden und 6 Minuten 30 Sekunden und mehr als ist, dann kann man das Avatar auswählen, ohne das Spiel zu spielen.
iii)	Beträgt die Dauer bis zur Startzeit weniger als 1 Minuten 30 Sekunden ist, gibt es eine Weiterleitung zu Seite 3 mit einem zufälligen Avatar Auswahl.

Hier kann das Spiel gestartet werden. 

![Seite 2a](https://github.com/museum4punkt0/VIMUKI_2.0/blob/main/webservice-seite-2a.png)

Das Spiel wird in einer ModalBox auf der zweiten Seite gespielt. Diese ModalBox schließt durch JS, wenn das Spiel abgeschlossen wird. Im JS gibt es eine Methode game(), die den Countdown der übergegebenen Sekunden bis 0 runterzählt. Wenn diese Funktion aufgerufen wird, muss die Dauer des Spiels in Sekunden angegeben werden. 


Danach kann ein Avatar ausgewählt werden. 

![Seite 2b](https://github.com/museum4punkt0/VIMUKI_2.0/blob/main/webservice-seite-2b.png)

![Seite 2c](https://github.com/museum4punkt0/VIMUKI_2.0/blob/main/webservice-seite-2c.png)

##### Seite 3: sichtbar für Benutzer #####
Auf der dritten Seite können Benutzer einen Namen eingeben und den Start Button drücken.

![Seite 3](https://github.com/museum4punkt0/VIMUKI_2.0/blob/main/webservice-seite-3.png)

##### Seite 4: nur im Hintergrund, nicht sichtbar für Benutzer #####
Auf der vierten Seite findet eine Weiterleitung mit den entsprechenden Daten (Name, Avatar, Custom CSS) zum BBB Raum statt. Es gibt keine Benutzeroberfläche für diese Seite, sondern nur einen Backend Teil.

##### Seite 5: #####
Das erste Spiel ist erreichbar über folgenden Link: domainname.com/game?id=1. Diesen Link werden die Tutoren in der BigBlueButton Sitzung mitteilen

##### Seite 6: #####
Das zweite Spiel ist erreichbar über folgenden Link: domainname.com/game?id=2. Diesen Link werden die Tutoren in der BigBlueButton Sitzung mitteilen.


### Credits ###
Auftraggeber/Rechteinhaber: Historisches Museum Saar https://www.historisches-museum.org

Urheber: Kröpelin Projekt GmbH https://www.kroepelin-projekte.de

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
