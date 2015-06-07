var numnote = 1;
var nbErreur = 0;

//http://openclassrooms.com/courses/simplifiez-vos-developpements-javascript-avec-jquery/plus-loin-dans-la-selection-d-elements
var suppNote = function(note,level) {

    //var $noteActuelle = $('#note'+numnote);$('div[ordre=note'+numnote+']')
    var $noteActuelle = $('div[ordre=note'+numnote+']');
    var dataActuelle = $noteActuelle.attr('id');

    if(note == dataActuelle) {

        var baliseEnonce = "C'est la bonne note!<br\/>";
        baliseEnonce += enonceEx1(level);
        modifierEnonce(baliseEnonce);

        $noteActuelle.removeClass('next');
        $noteActuelle.addClass('fini');

        numnote ++;

        //var $noteSuivante = $('#note'+numnote);
        var $noteSuivante = $('div[ordre=note'+numnote+']');
        if($noteSuivante.length == 0) {
            modifierEnonce("fin! nb erreur = "+nbErreur);
        }
        else {
            $noteSuivante.addClass('next');
        }
    }
    else {
        console.log("Pas la bonne note : "+note+" != "+dataActuelle);

        if(level <= 2) {
            var touches = jsonAideReponseNoteSimple;
        }
        else {
            var touches = jsonAideReponseNoteLong;
        }

        var $noteAppuye = $('span[data-note='+note+']');
        var idDateAppuye = $noteAppuye.attr('id-database');

        var indice = touches.index[idDateAppuye];
        var noteFausse = touches.data[indice].nom;

        var baliseEnonce = "Ce n'est pas la bonne note! Vous avez joué un "+ noteFausse + "<br\/>";
        baliseEnonce += enonceEx1(level);
        modifierEnonce(baliseEnonce);
        nbErreur ++;
    }

};

var generateExercicePiano = function (level) {
    /*
     POUR CHARGER D'UN FICHIER
     var id = "Do1";
     //var index = jsonTableauNoteBlanche.index[id];
     //var obj = jsonTableauNoteBlanche.data[index];
     */

    apparaitrePiano(level);

    if(level <= 2) {
        var toucheBlanche = jsonTableauNoteBlanche1;
        var toucheNoire = jsonTableauNoteNoire1;
    }
    else {
        var toucheBlanche = jsonTableauNoteBlanche2;
        var toucheNoire = jsonTableauNoteNoire2;
    }

    var lengthWhite = Object.keys(toucheBlanche.data).length;
    var lengthBlack = Object.keys(toucheNoire.data).length;

    var nbrNotes = 12;

    var notes = [];

    for(var i = 0 ; i < nbrNotes ; i++) {
        if(level == 1) {
            var alea = aleatoire(0,lengthWhite);

            var idTouch = toucheBlanche.data[alea].tId;
            var nomTouch = toucheBlanche.data[alea].nom;
        }
        else {

            if(aleatoire(0,3) < 2) {
                var alea = aleatoire(0,lengthWhite);

                var idTouch = toucheBlanche.data[alea].tId;
                var nomTouch = toucheBlanche.data[alea].nom;
            }
            else {
                var alea = aleatoire(0,lengthBlack);

                var idTouch = toucheNoire.data[alea].tId;
                var nomTouch = toucheNoire.data[alea].nom;
            }

        }

        notes[i] = {id:idTouch, name:nomTouch};
    }

    creerBaliseExercices(notes,1);

    var baliseEnonce = enonceEx1(level);
    modifierEnonce(baliseEnonce);
};


function enonceEx1(level) {
    /* Enonce */
    var baliseEnonce = "Cliquez sur le clavier ou appuyez sur le clavier de votre ordinateur" +
        " la même note inscrite dans la bulle <font color=\"darkviolet\">violette</font> correspondante";
    /* aide Clavier */
    if(level == 1) {
        baliseEnonce += "<br><a href=\"assets/img/help/PianoSimpleAide.png\" " +
        "onclick=\"window.open(this.href,'Aide Piano'," +
        "'menubar=no, toolbar=no, scrollbars=no, top=100, left=0, width=300, height=200');return false\">AIDE POUR LES TOUCHES DU CLAVIER</a>";

    } else if(level == 2) {
        baliseEnonce += "<br><a href=\"assets/img/help/PianoSimpleAide2.png\" " +
        "onclick=\"window.open(this.href,'Aide Piano'," +
        "'menubar=no, toolbar=no, scrollbars=no, top=100, left=0, width=300, height=200');return false\">AIDE POUR LES TOUCHES DU CLAVIER</a>";
    } else if(level == 3) {
        baliseEnonce += "<br><a href=\"assets/img/help/PianoLongAide2.png\" " +
        "onclick=\"window.open(this.href,'Aide Piano'," +
        "'menubar=no, toolbar=no, scrollbars=no, top=400, left=0, width=600, height=200');return false\">AIDE POUR LES TOUCHES DU CLAVIER</a>";
    }
    return baliseEnonce;
}

function aleatoire(min, max) {
    return (Math.floor((max-min)*Math.random())+min);
};