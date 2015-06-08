/**
 * Created by luk on 06/06/15.
 */

var apparaitrePiano = function (level) {

    /* Pour les test */
    var $faireApparaitre = $('[level="1"]');
    $faireApparaitre.show( 50 );

    /*
     $faireApparaitre.first().show( 4000, function showNext() {
     if($( this).next( "li" ).attr('level') == "1")
     $( this ).next( "li" ).show( 50, showNext );
     else
     return false;
     });*/


    var toucheBlanche = jsonTableauNoteBlanche1;
    var toucheNoire = jsonTableauNoteNoire1;

    if(level > 2) {
        $faireApparaitre = $('[level="3"]');
        $faireApparaitre.show( 50 );
        /*$faireApparaitre.first().show( 4000, function showNext() {
         if($( this).next( "li" ).attr('level') == "2")
         $( this ).next( "li" ).show( 50, showNext );
         else
         return false;
         });*/

        if(level == 3) {
            toucheBlanche = jsonTableauNoteBlanche2;
            toucheNoire = jsonTableauNoteNoire2;
        }
    }

    /* pour la detection d'erreurs */
    var $notesBlanches = $('span:visible[class="white-key"]');
    var i = 0;
    $notesBlanches.each(function(){
        $(this).attr('id-database',toucheBlanche.data[i].id);
        i++;
    });
    var $notesNoirs = $('span:visible[class="black-key"]');
    i = 0;
    $notesNoirs.each(function(){
        $(this).attr('id-database',toucheNoire.data[i].id);
        i++;
        if(i %2 == 1 ) {
            i++
        }
    });
}