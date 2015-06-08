var numnote = 1;

//http://openclassrooms.com/courses/simplifiez-vos-developpements-javascript-avec-jquery/plus-loin-dans-la-selection-d-elements
var suppNote = function(notes) {

    var $noteActuelle = $('#note'+numnote);
    var dataActuelle = $noteActuelle.attr('data-note');

    if(notes == dataActuelle) {

        console.log("c'est la bonne note!");

        $noteActuelle.removeClass('next');
        $noteActuelle.addClass('fini');

        numnote ++;

        var $noteSuivante = $('#note'+numnote);
        $noteSuivante.addClass('next');
    }
    else {
        alert("C'est pas la bonne note!");
        console.log("Pas la bonne note : "+notes+" != "+dataActuelle);
    }

};

var generateExercicePiano = function (level) {

    /*
     POUR CHARGER D'UN FICHIER
     var id = "Do1";
     //var index = jsonTableauNoteBlanche.index[id];
     //var obj = jsonTableauNoteBlanche.data[index];
     */

    if(level == 1) {
        var $faireApparaitre = $('[level="1"]');

        /* Pour les test */
        $faireApparaitre.show( 50 );

        /*
        $faireApparaitre.first().show( 4000, function showNext() {
            if($( this).next( "li" ).attr('level') == "1")
                $( this ).next( "li" ).show( 50, showNext );
            else
                return false;
        });*/
    }
    else if(level == 2) {
        var $faireApparaitre = $('[level="1"]');

        /* Pour les test */
        $faireApparaitre.show( 50 );

        /*$faireApparaitre.first().show( 4000, function showNext() {
            if($( this).next( "li" ).attr('level') == "1")
                $( this ).next( "li" ).show( 50, showNext );
            else
                return false;
        });*/
        $faireApparaitre = $('[level="2"]');
        $faireApparaitre.show( 50 );
        /*$faireApparaitre.first().show( 4000, function showNext() {
            if($( this).next( "li" ).attr('level') == "2")
                $( this ).next( "li" ).show( 50, showNext );
            else
                return false;
        });*/
    }

    var lengthWhite = Object.keys(jsonTableauNoteBlanche.data).length;
    //var lengthBlack = Object.keys(jsonTableauNoteNoire.data).length;

    var nbrNotes = 12;

    var $container = $('#sujetExercice');
    //Vide la balise
    $container.empty();

    var baliseExercice = "<div class=\"row\">"+
                        "<div class=\"col-md-6\">"+
                        "<div class=\"row\">"+
                        "<div class=\"col-sm-6\">"+
                        "<div class=\"row\">";

    for(var i = 0 ; i < nbrNotes ; i++) {

        var j = i + 1;
        var alea = aleatoire(0,lengthWhite);

        var idTouch = jsonTableauNoteBlanche.data[alea].tId;
        var nomTouch = jsonTableauNoteBlanche.data[alea].nom;

        if(i == 0) {
            baliseExercice +=  "<div id=\"note"+j+"\" class=\"col-xs-4 next\" data-note=\""+idTouch+"\">"+nomTouch+"<\/div>";
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
            baliseExercice += "<div id=\"note"+j+"\" class=\"col-xs-4\" data-note=\""+idTouch+"\">"+nomTouch+"<\/div>";
        }
        else if(i%3 == 0) {
            baliseExercice += "<\/div>"+
                                "<\/div>"+
                                "<div class=\"col-sm-6\">"+
                                "<div class=\"row\">";
            baliseExercice += "<div id=\"note"+j+"\" class=\"col-xs-4\" data-note=\""+idTouch+"\">"+nomTouch+"<\/div>";

        }
        else {
            baliseExercice += "<div id=\"note"+j+"\" class=\"col-xs-4\" data-note=\""+idTouch+"\">"+nomTouch+"<\/div>";
        }

    }

    baliseExercice += "<\/div>"+
                        "<\/div>"+
                        "<\/div>"+
                        "<\/div>"+
                        "<\/div>";

    $container.append(baliseExercice);
};

function aleatoire(min, max) {
    return (Math.floor((max-min)*Math.random())+min);
};