/**
 * Hide game modal box when it's completed
 *
 * @param sec
 */
function game(sec)  {

    let timeleft = sec;
    let downloadTimer = setInterval(function(){
        if(timeleft <= 0){
            clearInterval(downloadTimer);
            alert("Bitte den Tab über das Kreuzchen schließen, um wieder in den BBB-Raum zurückzukehren.");
        }
        timeleft -= 1;
    }, 1000);
}

if(window.location.href.indexOf('game?id=1') > -1) {
    game(240);
}else if(window.location.href.indexOf('game?id=2') > -1) {
    game(210);
}
