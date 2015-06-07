/**
 * Created by luk on 06/06/15.
 */

function creerExercice() {
    modifierEnonce("Selectionner le niveau et le type d'exercice, puis cliquez sur les bulles pour créer votre exercice perso");

    //Deux boutons à faire
    var level = 1;
    var numExercice = 1;

    var toucheBlanche = jsonTableauNoteBlanche1;
    var toucheNoire = jsonTableauNoteNoire1;

    if(level == 3) {
        toucheBlanche = jsonTableauNoteBlanche2;
        toucheNoire = jsonTableauNoteNoire2;
    }

    var lengthWhite = Object.keys(toucheBlanche.data).length;
    var lengthBlack = Object.keys(toucheNoire.data).length;

    var notes = [];

    if(level == 1) {
        //console.log("okay "+lengthWhite);

        for(var i = 0 ; i < lengthWhite ; i ++) {

            var idTouch = toucheBlanche.data[i].tId;
            var nomTouch = toucheBlanche.data[i].nom;

            notes[i] = {id: idTouch, name: nomTouch};
        }

    }

    creerBaliseExercices(notes,0);

    var $container = $('#sujetExercice');

    $container.append("<br \/><br \/><br \/><ol id=\"modele\" ><\/ol>");

    var cmpt = 0;

    $('.note').bind('selectstart', function(ev) {

        var $modele = $('#modele');

        if (ev.type == 'selectstart') {

            var me = $(this);
            var id = me.context.id;
            var name = me.context.innerText;

            $modele.append("<li tId="+id+" parameters="+id+cmpt+">"+name+" <a parameter="+id+cmpt+">supprimer<\/a>"+"<\/li>");

            var nvlleNote = $('a[parameter='+id+cmpt+']');
            nvlleNote.click(function() {
                var idcmpt = nvlleNote.attr('parameter');
                suppNoteEnseignant(idcmpt);
            });
            cmpt++;

        }

    });


}

function suppNoteEnseignant(idcmpt) {

    console.log("Suppression de la balise "+idcmpt);
    $('li[parameters='+idcmpt+']').remove();
}