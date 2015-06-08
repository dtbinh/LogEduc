/**
 * Created by luk on 06/06/15.
 */


function valideReponse(note,level) {

    var reponse = noteAlea[numnote-1].id;

    console.log("Reponse : "+reponse);
    console.log("Jouée : "+note);

    if(reponse == note) {
        modifierEnonce("Bien joué! <button onclick=\"commencerEnonceEx2()\">note suivante<\/button>");
        numnote++;
    }
    else {
        var reponseCmp = noteAlea[numnote-1].dataId;

        var indices = jsonAideReponseNoteSimple;
        if(level == 3) {
            indices = jsonAideReponseNoteLong;
        }

        var index = indices.index[reponseCmp];
        var before = indices.data[index].before;
        var after = indices.data[index].after;

        modifierEnonce("Raté! La note cherché se trouve entre un <FONT size=\"4\" color='blue'>"+before+" et un "+after+"<\/FONT> <button onclick=\"jouerEnonceEx2()\">Rejouer note<\/button>");
        nbErreur++;
    }

    if(numnote > noteAlea.length) {
        modifierEnonce("Bien joué! Nombres d'erreurs : " + nbErreur);

        if(nbErreur < 4 && level < 3) {
            var exo = "exo=" + 32;
            $.ajax({
                type: 'GET',
                url: "/LogEduc/Exercices/Portee/webapp/levelup.php",
                data: exo,
                success: function (data) {
                    modifierEnonce("Fin! Nombre erreur = "+nbErreur+" Félicitation tu gagnes un niveau!");
                }
            });
        }
    }
};

var noteAlea;

var generateExercicePiano2 = function (level) {
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

    var $container = $('#sujetExercice');
    //Vide la balise
    $container.empty();
    var baliseExercice = "";

    var notes = [];

    if(level == 1) {
        var notes = [];

        for(var i = 0 ; i < lengthWhite ; i ++) {

            var idTouch = toucheBlanche.data[i].tId;
            var nomTouch = toucheBlanche.data[i].nom;

            var alea = aleatoire(0, lengthWhite);

            while (notes[alea]) {
                alea = aleatoire(0, lengthWhite);
            }

            notes[alea] = {id: idTouch, name: nomTouch};
        }

    }
    else if(level >= 2) {

        //var concatTouches = JSON.stringify(toucheBlanche.data).concat(JSON.stringify(toucheNoire.data));
        //console.log(concatTouches);

        for(var i = 0 ; i < (lengthWhite+lengthBlack) ; i ++) {

            if(i < lengthWhite) {

                var idTouch = toucheBlanche.data[i].tId;
                var nomTouch = toucheBlanche.data[i].nom;

                var alea = aleatoire(0,(lengthWhite+lengthBlack));

                if(level == 2) {
                    while(notes[alea] || alea < 2 || alea > 8){
                        alea = aleatoire(0,(lengthWhite+lengthBlack));
                    }
                }
                else {
                    while(notes[alea] || alea < 2 || (alea > 8 && alea < 14) || alea > 20){
                        alea = aleatoire(0,(lengthWhite+lengthBlack));
                    }
                }

                notes[alea] = {id:idTouch, name:nomTouch};
            }
            else {

                var idTouch = toucheNoire.data[i-lengthWhite].tId;
                var nomTouch = toucheNoire.data[i-lengthWhite].nom;

                var alea = aleatoire(0,(lengthWhite+lengthBlack));

                while(notes[alea]){
                    alea = aleatoire(0,(lengthWhite+lengthBlack));
                }

                notes[alea] = {id:idTouch, name:nomTouch};
            }
        }
    }

    creerBaliseExercices(notes,2);

    var $mesBullesDeNotes = $('[id*="s"]');
    $mesBullesDeNotes.addClass('white-key');

    noteAlea = [];
    for(var i = 0 ; i < 12 ; i ++) {
        /*
         var alea = aleatoire(0,lengthWhite);

         var idTouch = toucheBlanche.data[alea].tId;
         var nomTouch = toucheBlanche.data[alea].nom;*/

        if(level == 1) {
            var alea = aleatoire(0,lengthWhite);

            var idTouch = toucheBlanche.data[alea].tId;
            var nomTouch = toucheBlanche.data[alea].nom;
            var dataId = toucheBlanche.data[alea].id;
            noteAlea[i] = {id:idTouch, name:nomTouch, dataId:dataId};
        }
        else {

            if(aleatoire(0,3) < 2) {
                var alea = aleatoire(0,lengthWhite);

                var idTouch = toucheBlanche.data[alea].tId;
                var nomTouch = toucheBlanche.data[alea].nom;
                var dataId = toucheBlanche.data[alea].id;
            }
            else {
                var alea = aleatoire(0,lengthBlack);

                var idTouch = toucheNoire.data[alea].tId;
                var nomTouch = toucheNoire.data[alea].nom;
                var dataId = toucheNoire.data[alea].id;
            }
            //var dataId = toucheBlanche.data[alea].id;
            noteAlea[i] = {id:idTouch, name:nomTouch, dataId:dataId};
        }
    }

    /* Enonce */
    modifierEnonce( "Cliquez sur la bulle ci-dessous correspondant à la note jouée par le piano, "+
        "<button onclick=\"commencerEnonceEx2()\">appuyez ici pour commencer<\/button>");

};

function commencerEnonceEx2() {

    modifierEnonce( "Cliquez sur la bulle ci-dessous correspondant à la note jouée par le piano, " +
        "vous pouvez revoir le son joué " +
        "<button onclick=\"jouerEnonceEx2()\">en cliquant ici<\/button>");

    jouerEnonceEx2();
}

function jouerEnonceEx2() {

    var note = noteAlea[numnote-1].id;
    var $key = $('[data-note="'+note+'"]');

    notes[note].play();
    $key.addClass('active');
    $key.parent().addClass('active');

    setTimeout(function(){
        $key.removeClass('active');
        $key.parent().removeClass('active');
    }, 1500);
};