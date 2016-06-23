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
    var begin = getCookie('myClock');
    

}
// otherwise, set a deadline 10 minutes from now and
// save it in a cookie with that name
else{
    // create deadline 10 minutes from now

    var begin = new Date();

    // store deadline in cookie for future reference
    document.cookie = 'myClock=' + begin.toUTCString() + '; path=/; domain=localhost';
}
function getTime(starttime){
    var t = Date.parse(new Date()) -Date.parse(starttime);
    var seconds = Math.floor( (t/1000) % 60 );
    var minutes = Math.floor( (t/1000/60) % 60 );
    var hours = Math.floor( (t/(1000*60*60)) );
    return {
        'total': t,
        'hours': hours,
        'minutes': minutes,
        'seconds': seconds
    };
}
var timeStop;
function getTimeStopped(){
    return timeStop;
}

function initializeClock(id, starttime){
    var clock = document.getElementById(id);
    var hoursSpan = clock.querySelector('.hours');
    var minutesSpan = clock.querySelector('.minutes');
    var secondsSpan = clock.querySelector('.seconds');
    function updateClock(){
        if(document.cookie && document.cookie.match('myClock')){
            var t = getTime(starttime);
        }
        else{
            var t =getTimeStopped();
        }
        hoursSpan.innerHTML = (' ' + t.minutes).slice(-2);
        minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
        secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);
        clock.innerHTML = 'Time '+ t.hours +
            ' : ' + ('0' + t.minutes).slice(-2) +
            ' : ' + ('0' + t.seconds).slice(-2);

    }


    updateClock(); // run function once at first to avoid delay
    setInterval(updateClock,1000);
}

initializeClock('clockdiv', begin);

function deleteClock() {
    if(document.cookie && document.cookie.match('myClock')){
        document.cookie = 'myClock=' + begin + '; path=/;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    }
    timeStop=Date.parse(endtime) - Date.parse(new Date());
}


function getCookie(name) {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length == 2) return parts.pop().split(";").shift();
}
