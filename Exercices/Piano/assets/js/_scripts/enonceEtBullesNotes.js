/**
 * Created by luk on 06/06/15.
 */

function modifierEnonce(string) {
    /* Enonce */
    var $containEnonce = $('#enonce');
    //Vide la balise
    $containEnonce.empty();
    var baliseEnonce = string;
    $containEnonce.append(baliseEnonce);
};

function creerBaliseExercices(notes,numExercice) {

    var $container = $('#sujetExercice');
    //Vide la balise
    $container.empty();
    var baliseExercice = "";

    if(notes.length <= 8) {


        baliseExercice =    "<div class=\"row\">"+
            "<div class=\"col-md-6\">"+
            "<div class=\"row\">";

        for(var i = 0 ; i < notes.length ; i ++) {

            if(i == 4) {
                baliseExercice +=   "<\/div>"+
                    "<\/div>"+
                    "<div class=\"col-md-6\">"+
                    "<div class=\"row\">";
            }

            var idTouch = notes[i].id;
            var nomTouch = notes[i].name;

            baliseExercice +=  "<div class=\"col-xs-3 note\" id=\""+idTouch+"\">"+nomTouch+"<\/div>";
        }

        baliseExercice +=   "<\/div>"+
            "<\/div>"+
            "<\/div>"+
            "<\/div>"+
            "<\/div>";

    }
    else {

        baliseExercice =    "<div class=\"row\">"+
            "<div class=\"col-md-6\">"+
            "<div class=\"row\">"+
            "<div class=\"col-sm-6\">"+
            "<div class=\"row\">";

        for(var i = 0 ; i < notes.length ; i++) {

            var j = i + 1;

            var idTouch = notes[i].id;
            var nomTouch = notes[i].name;

            if(i == 0 && numExercice == 1) {
                baliseExercice +=  "<div ordre=\"note"+j+"\" class=\"col-xs-4 next note\" id=\""+idTouch+"\">"+nomTouch+"<\/div>";
            }
            else if(i == 0) {
                baliseExercice +=  "<div ordre=\"note"+j+"\" class=\"col-xs-4 note\" id=\""+idTouch+"\">"+nomTouch+"<\/div>";
            }
            else if(i%6 == 0) {
                baliseExercice +=  "<\/div>"+
                    "<\/div>"+
                    "<\/div>"+
                    "<\/div>"+
                    "<div class=\"col-md-6\">"+
                    "<div class=\"row\">"+
                    "<div class=\"col-sm-6\">"+
                    "<div class=\"row\">";
                baliseExercice += "<div ordre=\"note"+j+"\" class=\"col-xs-4 note\" id=\""+idTouch+"\">"+nomTouch+"<\/div>";
            }
            else if(i%3 == 0) {
                baliseExercice += "<\/div>"+
                    "<\/div>"+
                    "<div class=\"col-sm-6\">"+
                    "<div class=\"row\">";
                baliseExercice += "<div ordre=\"note"+j+"\" class=\"col-xs-4 note\" id=\""+idTouch+"\">"+nomTouch+"<\/div>";

            }
            else {
                baliseExercice += "<div ordre=\"note"+j+"\" class=\"col-xs-4 note\" id=\""+idTouch+"\">"+nomTouch+"<\/div>";
            }

        }

        baliseExercice += "<\/div>"+
            "<\/div>"+
            "<\/div>"+
            "<\/div>"+
            "<\/div>";
    }

    $container.append(baliseExercice);
}
