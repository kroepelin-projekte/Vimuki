# Anpassungen von BigBlueButton

## Aktivierung der BBB API

Auf dem BBB Server:

<code>nano /usr/share/bbb-web/WEB-INF/classes/bigbluebutton.properties</code>

=> <code>serviceEnabled  = true</code>

## Deaktivierung BBB Notizen

Auf dem BBB Server:

<code>nano /usr/share/meteor/bundle/programs/server/assets/app/config/settings.yml</code>

<code>note:

  enabled: false</code>


## BBB Logo

Das Logo wird unter <code>/var/www/bigbluebutton-default/images/</code> gespeichert und der Pfad des Logo wird in der Konfiguration des MultiVC Plugins hinterlegt.


## BBB Custom Startpräsentation

Wir speichern die Datei der Startpräsentation unter <code>/var/www/bigbluebutton-default/startpresentation</code> und hinterlegen den Pfad in der Konfiguration des MultiVC Plugins.


## BBB Custom CSS File

Auf dem BBB Server:

<code>nano /var/www/bigbluebutton-default/css/custom.css</code>

This file is connected in MultiVC Konfiguration Plugin in ILIAS.
