# Customizing BigBlueButton

## Activation BBB API

In BBB Server:

<code>nano /usr/share/bbb-web/WEB-INF/classes/bigbluebutton.properties</code>

serviceEnabled  = true

## BBB Notes

In BBB Server:

<code>nano /usr/share/meteor/bundle/programs/server/assets/app/config/settings.yml</code>

<code>note:

  enabled: false</code>


## BBB Logo

We store the Logo under <code>/var/www/bigbluebutton-default/images/</code> in BBB Server and we define the Path of Logo in the configuration of MultiVC Plugins.


## BBB Custom Startpresentation

We store the file of the startpresentation under <code>/var/www/bigbluebutton-default/startpresentation</code> in BBB Server and define the path in the configuration of MultiVC Plugin.


## BBB Custom CSS File

In BBB Server:

<code>nano /var/www/bigbluebutton-default/css/custom.css</code>

This file is connected in MultiVC Konfiguration Plugin in ILIAS.

## Custom Logout URL in MultiVC Plugin

We define the custom Logout Link in class file <code>./classes/class.ilApiBBB.php</code>. We change the variable $joinBtnUrl in method setCreateMeetingParam() to: 

<code>$joinBtnUrl= 'https://vimuki.org';</code>
