<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="pragma" content="no-cache"/>
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name ="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta charset="utf-8"/>
    <title>Vimuki Tour</title>
    <link rel="shortcut icon" type="image/png" href="/images/favicon.png"/>
    <link rel="apple-touch-icon" href="/images/favicon.png" />
    <link href='/bootstrap/css/bootstrap.min.css' type='text/css' rel='stylesheet'>
    <link href='/assets/css/app.css' type='text/css' rel='stylesheet'>
    <?php
        //<!-- Run the game code -->
        if(strpos($_SERVER['REQUEST_URI'], 'page=2') > -1){ // Page with avatars
            echo '<script type="text/javascript" src="games/vimuki_unterstuetzer/Prequel-Unterstuetzer.js?JKMAC=1548144567"></script>';
        }elseif(strpos($_SERVER['REQUEST_URI'], 'game') > -1){ // Page with game
            $tmp = explode('?', $_SERVER['REQUEST_URI']);
            $idGameArray = explode('=', $tmp[1]);
            if($idGameArray[1] === '1') { // Page Game 1
                echo '<script type="text/javascript" src="games/vimuki_unterstuetzer/Prequel-Unterstuetzer.js?JKMAC=1548144567"></script>';
            }elseif($idGameArray[1] === '2') { // Page Game 2
                echo '<script type="text/javascript" src="games/vimuki_koffer/Prequel-Kofferpacken.js?GCCZB=977148281"></script>';
            }
        }
    ?>
<body>
<noscript>
    This website needs JavaScript enabled to work correctly.
</noscript>