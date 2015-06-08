/**
 * Created by luk on 07/06/15.
 */

function generateCours() {

    var body = $('body');
    //Le Rémi Fasol
    body.prepend(   "<div id=\"partieGauche\" class=\"col-sm-6\">" +
                        "<div id=\"interfacePerso\">" +
                            "<div class=\"col-sm-5\" id=\"persoContainer\">" +
                                "<img id=\"perso\" height=\"250\" width=\"250\" src=\"assets\/img\/ico\/Perso.jpeg\"/>" +
                            "<\/div>" +
                            "<div class=\"col-sm-6\" id=\"BulleText\">" +
                                "<div id=\"TextContent\"><p><FONT color='blue' size='4'>Bonjour camarade, je suis Rémi Fasol! " +
                                    "Aujourd'hui nous allons apprendre le piano !<\/FONT><\/p>" +
                                    "<a onmouseover=\"this.style.cursor='pointer'\" onClick=\"sommaire()\">suite -></a>" +
                                "<\/div>" +
                            "<\/div>" +
                        "<\/div>" +
                    "<\/div>");

    // Le Titre
    body.prepend(   "<div class=\"col-md-12 titre\">" +
                    "<H1><b>Apprendre le piano<\/b><\/H1>" +
                "<\/div>");



    apparaitrePiano(3);

    // Resize le piano
    var $piano = $('ul.piano');
    var $notesBlanches = $('span:visible[class="white-key"]');
    $notesBlanches.each(function(){
        $(this).addClass('lesson');
    });
    var $notesNoirs = $('span:visible[class="black-key"]');
    $notesNoirs.each(function(){
        $(this).addClass('lesson');
    });
    // FIN Resize le piano
    $('#interfacePerso').after($('ul.piano'));
    $('ul.piano').addClass("col-sm-11");

    // Supprime la balise enonce & sujetExercice
    $('#enonce').replaceWith("<div id=\"partieDroite\" class=\"col-sm-6\"><\/div>");
    $('#sujetExercice').remove();

    gestionPerso();
}

function sommaire() {

    changerMessage("<p><FONT color='blue' size='4'>Okay nous voici dans le sommaire! Choisissez un cours<\/FONT><\/p>");

    $('#partieDroite').empty();
    $('#partieDroite').append("<div id=\"sommaire\" ><br\/>" +
    "<a onmouseover=\"this.style.cursor='pointer'\" onClick=\"introduction()\"><FONT size=\"6\"> 1) Introduction <\/FONT><\/a><br\/>" +
    "<a onmouseover=\"this.style.cursor='pointer'\" onClick=\"notesBlanches()\"><FONT size=\"6\"> 2) Les notes blanches <\/FONT> <\/a> <br\/>" +
    "<a onmouseover=\"this.style.cursor='pointer'\" onClick=\"notesNoires()\"><FONT size=\"6\"> 3) Les notes noires <\/FONT> <\/a><br\/>" +
    "<a onmouseover=\"this.style.cursor='pointer'\" onClick=\"aVenir()\"><FONT size=\"6\"> 4)  (En construction) <\/FONT> <\/a><\/div>");


}

function introduction() {

    changerMessage("<p><FONT color='blue' size='4'>Commençons par une petite Introduction !<\/FONT><\/p>" +
        "<a onmouseover=\"this.style.cursor='pointer'\" onClick=\"sommaire()\"> <- Sommaire<\/a><br\/>" +
        "<a onmouseover=\"this.style.cursor='pointer'\" onClick=\"notesBlanches()\">Les notes blanches -><\/a>");

    $('#partieDroite').load("assets/html/cours1.html");
    $('#partieDroite').addClass('scrollable');

}

function notesBlanches() {

    changerMessage("<p><FONT color='blue' size='4'>Apprenons à jouer !<\/FONT><\/p>" +
        "<a onmouseover=\"this.style.cursor='pointer'\" onClick=\"sommaire()\"> <- Sommaire<\/a><br\/>" +
        "<a onmouseover=\"this.style.cursor='pointer'\" onClick=\"notesNoires()\">Les notes noires -><\/a>");

    $('#partieDroite').load("assets/html/cours2.html");
    $('#partieDroite').addClass('scrollable');

}

function notesNoires() {

    changerMessage("<p><FONT color='blue' size='4'>Apprenons à jouer !<\/FONT><\/p>" +
        "<a onmouseover=\"this.style.cursor='pointer'\" onClick=\"sommaire()\"> <- Sommaire<\/a><br\/>" +
        "<a onmouseover=\"this.style.cursor='pointer'\" onClick=\"notesNoires()\">à suivre... -><\/a>");

    $('#partieDroite').load("assets/html/cours3.html");
    $('#partieDroite').addClass('scrollable');

}

function testerNote(note) {

    var $key = $('[data-note="'+note+'"]');

    notes[note].play();
    $key.addClass('active');
    $key.parent().addClass('active');

    setTimeout(function(){
        $key.removeClass('active');
        $key.parent().removeClass('active');
    }, 1500);
}