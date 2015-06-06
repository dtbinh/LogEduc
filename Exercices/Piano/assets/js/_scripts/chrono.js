/**
 * Created by luk on 31/05/15.
 * Inspired by http://www.proglogic.com/code/javascript/time/chronometer.php
 */
var startTime = 0;
var start = 0;
var end = 0;
var diff = 0;
var timerID = 0;

var deadLine = 0;
var tmpRestant = 0;

var score = 0;

function chrono() {

    end = new Date();
    diff = end - start;
    diff = new Date(diff);

    tmpRestant = deadLine - diff;
    tmpRestant = new Date(tmpRestant);

    var msec = tmpRestant.getMilliseconds();
    var sec = tmpRestant.getSeconds();
    var min = tmpRestant.getMinutes();
    var hr = tmpRestant.getHours() - 1;

    if (min < 10){
        min = "0" + min;
    }
    if (sec < 10){
        sec = "0" + sec;
    }
    if(msec < 10){
        msec = "00" +msec;
    }
    else if(msec < 100){
        msec = "0" +msec;
    }

    var $leChrono = $('#temps');
    $leChrono.replaceWith("<div id=\"temps\">"+hr + ":" + min + ":" + sec + ":" + msec+"<\/div>");

    if(tmpRestant < 0) {
        chronoStop();
    }
    else{
        if(tmpRestant.getSeconds() < 5) {
            $('#temps').css('color','red').css('font-size','large');
        }
        timerID = setTimeout("chrono()", 10);
    }
}
function chronoStart() {
    start = new Date();
    deadLine = new Date(0);
    deadLine.setSeconds(3);
    chrono();
}

function chronoContinue() {
    start = new Date()-diff;
    start = new Date(start);
    chrono();
}

function chronoReset() {
    start = new Date();
}

function chronoStop() {
    modifierEnonce("Pas mal! Vous avez trouvez "+score+" réponses! <br\/><div id=\"chrono\">Temps restant : <div id=\"temps\">0:00:00:000<\/div><\/div>");
    $('#temps').fadeOut(300).fadeIn(300).fadeOut(300).fadeIn(300).fadeOut(300).fadeIn(300);
    clearTimeout(timerID);
}