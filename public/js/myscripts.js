/**
 * Created by Matthieu on 16/06/2016.
 */

//countdown script (10 minutes), initialized in a div with id clockdiv
/** <div id="clockdiv">
 Days: <span class="days"></span><br>
 Hours: <span class="hours"></span><br>
 Minutes: <span class="minutes"></span><br>
 Seconds: <span class="seconds"></span>
 </div> **/
// if there's a cookie with the name myClock, use that value as the deadline
if(document.cookie && document.cookie.match('myClock')){
    // get deadline value from cookie
    var deadline = getCookie('myClock');
}

// otherwise, set a deadline 10 minutes from now and
// save it in a cookie with that name
else{
    // create deadline 10 minutes from now
    var timeInMinutes = 1/20;
    var currentTime = Date.parse(new Date());
    var deadline = new Date(currentTime + timeInMinutes*60*1000);

    // store deadline in cookie for future reference
    document.cookie = 'myClock=' + deadline + '; path=/; domain=localhost';
}
function getTimeRemaining(endtime){
    var t = Date.parse(endtime) - Date.parse(new Date());
    var seconds = Math.floor( (t/1000) % 60 );
    var minutes = Math.floor( (t/1000/60) % 60 );
    var hours = Math.floor( (t/(1000*60*60)) % 24 );
    var days = Math.floor( t/(1000*60*60*24) );
    return {
        'total': t,
        'days': days,
        'hours': hours,
        'minutes': minutes,
        'seconds': seconds
    };
}
var timeStop;
function getTimeStopped(){
    return timeStop;
}

function initializeClock(id, endtime){
    var clock = document.getElementById(id);
    var daysSpan = clock.querySelector('.days');
    var hoursSpan = clock.querySelector('.hours');
    var minutesSpan = clock.querySelector('.minutes');
    var secondsSpan = clock.querySelector('.seconds');
    function updateClock(){
        if(document.cookie && document.cookie.match('myClock')){
            var t = getTimeRemaining(endtime);
        }
        else{
            var t =getTimeStopped();
        }
        daysSpan.innerHTML = t.days;
        hoursSpan.innerHTML = t.hours;
        minutesSpan.innerHTML = t.minutes;
        secondsSpan.innerHTML = t.seconds;
        clock.innerHTML = 'days: ' + t.days + '<br>' +
            'hours: '+ t.hours + '<br>' +
            'minutes: ' + t.minutes + '<br>' +
            'seconds: ' + t.seconds;
        if(t.total<=0){
            clearInterval(timeinterval);
            document.getElementById(id).innerHTML = 'Décompte fini'; //what to do when countdown ends
        }

    }


    updateClock(); // run function once at first to avoid delay
    var timeinterval = setInterval(updateClock,1000);
}
initializeClock('clockdiv', deadline);

function deleteClock(id) {
    if(document.cookie && document.cookie.match('myClock')){
        document.cookie = 'myClock=' + deadline + '; path=/;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    }
    timeStop=Date.parse(endtime) - Date.parse(new Date());
}

function getCookie(name) {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length == 2) return parts.pop().split(";").shift();
}
