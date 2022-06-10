function hoverGoButton(action)  {

    let srcImg = '/images/graphics/btn-go-blue.png';
    if(action === 'unhover'){
        srcImg = '/images/graphics/btn-go-pink.png';
    }
    document.getElementById('start-button-img').setAttribute('src', srcImg)
}

function hoverStartButton(action)  {

    let srcImg = '../images/graphics/start-button-hover.png';
    if(action === 'unhover'){
        srcImg = '../images/graphics/start-button.png';
    }
    document.getElementById('join-button-img').style.backgroundImage = "url(" + srcImg + ")";
}

function hoverButtonAvatars(button, event)  {

    let img = event.target.getElementsByClassName('btn-img').item(0);

    let newSrc = '';
    if(button === 'preview'){
        newSrc = '/images/graphics/zurueck-button-avatars-hover.png';
    }else if(button === 'next'){
        newSrc = '/images/graphics/weiter-button-avatars-hover.png';
    }
    img.setAttribute('src', newSrc);
}

function unhoverButtonAvatars(button, event)  {

    let img = event.target.getElementsByClassName('btn-img').item(0);

    let newSrc = '';
    if(button === 'preview'){
        newSrc = '/images/graphics/zurueck-button-avatars.png';
    }else if(button === 'next'){
        newSrc = '/images/graphics/weiter-button-avatars.png';
    }
    img.setAttribute('src', newSrc);
}
/**
 * Validation name and avatar in join form
 */
function validation() {

    if(document.getElementById('username').value === ''){

        document.getElementById('validation-error').textContent = 'Bitte geben Sie Ihre Name ein';
        document.getElementById('validation-error').style.display = 'block';
        event.preventDefault();
    }
}

function checkIfTimeIsEnough(sec)  {

    let monthsFormat = {
            '01' : 'Jan',
            '02' : 'Feb',
            '03' : 'Mar',
            '04' : 'Apr',
            '05' : 'May',
            '06' : 'Jun',
            '07' : 'Jul',
            '08' : 'Aug',
            '09' : 'Sep',
            '10' : 'Oct',
            '11' : 'Nov',
            '12' : 'Dec'
        };

    let time = document.getElementById('hidden-event-time').value;
    let date = document.getElementById('hidden-event-date').value;

    let tmpTime = time.split(':');
    let tmpDate = date.split('.');

    let hour = tmpTime[0];
    let minute = tmpTime[1];
    let second = tmpTime[2];

    let day = tmpDate[0];
    let month = tmpDate[1];
    let year = tmpDate[2];

    let countDownDate = new Date(monthsFormat[month] + ' ' + day + ', ' + year + ' ' + hour + ':' + minute + ':' + second).getTime();

    let now = new Date().getTime();

    // Distance between now and the count down date
    let distance = countDownDate - now;

    let days = Math.floor(distance / (1000 * 60 * 60 * 24));
    let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((distance % (1000 * 60)) / 1000);

    if(days === 0 && hours === 0) {

        if(minutes < 1 || (minutes === 1 && seconds < 30)){

            window.location.href = window.location.href.replace('page=2', 'page=3');

        }else if(minutes < 6 || (minutes === 6 && seconds < 30)){

            document.getElementById('modal-game').style.display = 'none';

        }else{
            game(sec);
        }
        
    }else{
        game(sec);
    }

}

/**
 * Countdown
 */
function countdown()  {

    let monthsFormat = {
            '01' : 'Jan',
            '02' : 'Feb',
            '03' : 'Mar',
            '04' : 'Apr',
            '05' : 'May',
            '06' : 'Jun',
            '07' : 'Jul',
            '08' : 'Aug',
            '09' : 'Sep',
            '10' : 'Oct',
            '11' : 'Nov',
            '12' : 'Dec'
    };

    let time = document.getElementById('hidden-event-time').value;
    let date = document.getElementById('hidden-event-date').value;

    let tmpTime = time.split(':');
    let tmpDate = date.split('.');

    let hour = tmpTime[0];
    let minute = tmpTime[1];
    let second = tmpTime[2];

    let day = tmpDate[0];
    let month = tmpDate[1];
    let year = tmpDate[2];

    let countDownDate = new Date(monthsFormat[month] + ' ' + day + ', ' + year + ' ' + hour + ':' + minute + ':' + second).getTime();

    // Update the count down every 1 second
    let timer = setInterval(function() {

        // Get today's date and time
        let now = new Date().getTime();

        // Distance between now and the count down date
        let distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        let days = Math.floor(distance / (1000 * 60 * 60 * 24));
        let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((distance % (1000 * 60)) / 1000);

        let displayCountDown = '';

        if(days > 0){
            hours += days * 24;
        }

        if(hours < 10){
            hours = '0' + hours;
        }

        if(hours >= 0){
            displayCountDown += hours +':';
        }

        if(minutes < 10){
            minutes = '0' + minutes;
        }

        if(minutes >= 0){
            displayCountDown += minutes + ':';
        }

        if(seconds < 10){
            seconds = '0' + seconds;
        }

        if(seconds >= 0){
            displayCountDown += seconds;
        }

        document.getElementById("countdown").innerHTML = displayCountDown;

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(timer);
            document.getElementById("countdown").innerHTML = '00:00:00';
        }
    }, 1000);
}

/**
 *
 */
function previewPanelAvatars() {

    let firstPanelAvatars = document.getElementById('container-first-panel-avatars'),
        secondPanelAvatars = document.getElementById('container-second-panel-avatars'),
        thirdPanelAvatars = document.getElementById('container-third-panel-avatars'),
        fourthPanelAvatars = document.getElementById('container-fourth-panel-avatars');

    // TODO to check compatibility with browsers
    let styleSecondPanel = window.getComputedStyle(secondPanelAvatars);
    let styleThirdPanel = window.getComputedStyle(thirdPanelAvatars);
    let styleFourthPanel = window.getComputedStyle(fourthPanelAvatars);

    setStatusBtnDisability(document.getElementById('btn-next-panel-avatars'), false);

    if(styleFourthPanel.getPropertyValue('display') === 'block'){

        fourthPanelAvatars.style.display = 'none';
        thirdPanelAvatars.style.display = 'block';

    }else if(styleThirdPanel.getPropertyValue('display') === 'block'){

        thirdPanelAvatars.style.display = 'none';
        secondPanelAvatars.style.display = 'block';

    }else if(styleSecondPanel.getPropertyValue('display') === 'block'){

        secondPanelAvatars.style.display = 'none';
        firstPanelAvatars.style.display = 'block';
        setStatusBtnDisability(document.getElementById('btn-preview-panel-avatars'), true);
    }
}

function nextPanelAvatars() {

    let firstPanelAvatars = document.getElementById('container-first-panel-avatars'),
        secondPanelAvatars = document.getElementById('container-second-panel-avatars'),
        thirdPanelAvatars = document.getElementById('container-third-panel-avatars'),
        fourthPanelAvatars = document.getElementById('container-fourth-panel-avatars');

    let styleFirstPanel = window.getComputedStyle(firstPanelAvatars);
    let styleSecondPanel = window.getComputedStyle(secondPanelAvatars);
    let styleThirdPanel = window.getComputedStyle(thirdPanelAvatars);
    let styleFourthPanel = window.getComputedStyle(fourthPanelAvatars);

    setStatusBtnDisability(document.getElementById('btn-preview-panel-avatars'), false);

    if(styleFirstPanel.getPropertyValue('display') === 'block'){

        firstPanelAvatars.style.display = 'none';
        secondPanelAvatars.style.display = 'block';

    }else if(styleSecondPanel.getPropertyValue('display') === 'block'){

        secondPanelAvatars.style.display = 'none';
        thirdPanelAvatars.style.display = 'block';

    }else if(styleThirdPanel.getPropertyValue('display') === 'block'){

        thirdPanelAvatars.style.display = 'none';
        fourthPanelAvatars.style.display = 'block';
        setStatusBtnDisability(document.getElementById('btn-next-panel-avatars'), true);
    }
}

/**
 * Set status disability of button preview and next in Avatar Gallerie
 * @param btn
 * @param status
 */
function setStatusBtnDisability(btn, status) {

    btn.disabled = status;
}

/**
 * Open modal box with avatars with clicking on image avatar
 */
function openModalBoxAvatars()  {

    let clickedEl = getClickedElement();

    let arrayKey = clickedEl.id.split('-');
    let key = arrayKey[1];

    // Set description and src for image in modalbox
    document.getElementById('img-fullscreen-modal').setAttribute('src', document.getElementById('hidden-url-fullscreen-img-' + key).value);
    document.getElementById('selected-avatar').value = document.getElementById('hidden-url-bbb-server-img-' + key).value;
    document.getElementById('description-avatar').innerHTML = document.getElementById('hidden-description-' + key).value;
    document.getElementById('description-avatar-mobile-tablet').innerHTML = document.getElementById('hidden-description-' + key).value;
    document.getElementById('modal-avatars').style.display = 'block';
}

/**
 * Get clicked Element
 *
 * @returns {EventTarget}
 */
function getClickedElement()  {
    let evt = window.event || evt; //window.event for IE
    if (!evt.target) {
        evt.target = evt.srcElement; //extend target property for IE
    }
    return evt.target;
}

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
            document.getElementById('modal-game').style.display = 'none';
        }
        timeleft -= 1;
    }, 1000);
}

countdown();

if(window.location.href.indexOf('page=2') > -1) {
    checkIfTimeIsEnough(240);
    setStatusBtnDisability(document.getElementById('btn-preview-panel-avatars'), true);
}
