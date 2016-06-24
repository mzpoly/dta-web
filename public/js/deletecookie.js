var name='myClock';
var value = "; " + document.cookie;
var parts = value.split("; " + name + "=");
if (parts.length == 2)
    begin=parts.pop().split(";").shift();
if(document.cookie && document.cookie.match('myClock')){
    document.cookie = 'myClock=' + begin + '; path=/;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}