<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <title>Quiz - Let's Go</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- inclusion du style CSS de base -->
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/indexStyle.css" />

    <style>
        .img-responsive {margin: 0 auto}
        .jumbotron{
            margin: 0 0 0 0;
        }
        .score{
            border: double #0f0f0f;
            margin: 1px 1px 1px 1px;
            margin-top: 30px;

        }
        .correct{
            background-color: lightgreen;
        }
        .faux{
            background-color: tomato;
        }
        .bouton{
            margin-top: 50px;
        }
    </style>


    <!-- inclusion des librairies jQuery et jQuery UI (fichier principal et plugins) -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>
</head>
<body>

<div id="test_status" class="text-center"></div>
<div id="test" class="testJeux text-center container"></div>

</body>

<script>

    var pos = 0, test, test_status, chA, chB, chC, chD, cpt= 0, pourcent= 0, pourfaux=0, cptfaux=0;
    var conseil;
    var compte;
    var suivanteQuestion = false;


    var temp = [
        ["Lequel de ces instruments est un tuba?","img/tambour.jpg","img/tuba.jpg","img/guitareelec.jpg","img/violon.jpg","B","Le tuba est un instrument de musique appartenant à la famille des cuivres. Par la variété de ses tailles et de ses formes, il constitue une sous-famille des cuivres"],
        ["Lequel de ces instruments est une guitare?", "img/guitare.jpg", "img/flute.jpg","img/piano.jpg","img/sax.jpg", "A","La guitare est un instrument à cordes pincées. Les cordes sont disposées parallèlement à la table d'harmonie et au manche, généralement coupé de frettes, sur lesquelles on appuie les cordes, d'une main, pour produire des notes différentes"],
        ["Lequel de ces instruments est un ocarina?", "img/accordeon.jpg", "img/flute.jpg","img/ocarina.jpg","img/harmonica.jpg", "C","L’ocarina est un instrument de musique à vent ovoïde, ressemblant à une tête d’oie ; d’où son nom : en italien, oca signifie «oie», et ocarina, «petite oie»"],
        ["Lequel de ces instruments est une guitare électrique?","img/tuba.jpg","img/tambour.jpg","img/violon.jpg","img/guitareelec.jpg","D","La guitare électrique est un type de guitare qui produit des sons grâce à des capteurs souvent appelés micros, transformant les vibrations des cordes en un signal électrique qui peut être modifié par divers accessoires comme des pédales d'effets avant d'être converti en un son par un ampli"],
        ["Lequel de ces instruments est un djembé?","img/djembe.jpg","img/flute.jpg","img/accordeon2.jpg","img/harpe.jpg","A","Un djembé est un instrument de percussion africain composé d'un fût de bois en forme de calice sur lequel est montée une peau de chèvre ou d'antilope tendue à l'aide d'un système de tension","Le Djembe permet de jouer des percussions"],
        ["Lequel de ces instruments est une flûte à bec?", "img/accordeon.jpg", "img/flute.jpg","img/ocarina.jpg","img/sax.jpg", "B","La flûte à bec est un instrument qui comporte huit trous de jeu, dont un manipulé par le pouce pour permettre l'émission des octaves aigües"],
        ["Lequel de ces instruments est une harpe?","img/djembe.jpg","img/flute.jpg","img/accordeon2.jpg","img/harpe.jpg","D","La harpe est un instrument de musique à cordes pincées de forme le plus souvent triangulaire, muni de cordes tendues de longueurs variables dont les plus courtes donnent les notes les plus aiguës"],
        ["Lequel de ces instruments est un accordéon?", "img/harmonica.jpg", "img/piano.jpg","img/accordeon.jpg","img/sax.jpg", "C","Le nom d'accordéon regroupe une famille d'instruments à clavier, polyphonique, utilisant des anches libres excitées par un vent variable fourni par le soufflet actionné par le musicien"],
        ["Lequel de ces instruments est un violon?", "img/violon.jpg","img/tuba.jpg","img/harmonica.jpg","img/flute.jpg","A","Le violon est un instrument de musique à cordes frottées, car il possède des cordres qu'on frotte avec un archet.","Il se tient en partie sur l'épaule"],
        ["Lequel de ces instruments est un saxophone?", "img/accordeon.jpg", "img/flute.jpg","img/sax.jpg","img/ocarina.jpg", "C","Le saxophone est généralement en laiton, bien qu'il en existe certains modèles en cuivre, en argent, en plastique ou plaqués en or"]
    ];

function shuffle(array) {
    for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
    return array;
}

        var questions = shuffle(temp);


    function _(x){
        return document.getElementById(x);
    }



    function renderQuestion()
    {
        test = _("test");
        var note;
        if(cpt>=questions.length/2){
            note = "correct";
            if (cpt==questions.length/2){
            conseil= "C'est moyen, tu peux t'améliorer en revoyant le cours";}
            else {
            if (cpt<=(questions.length/2+questions.length/4))
            conseil= "C'est plutôt bon, tu peux soit revoir le cours, soit passer aux exercices suivants.";
            else
                conseil= "Excellent, tu peux passer aux exercices suivants.";
}

        }
        else {
            note ="faux";
            conseil= "Ce n'est pas bon, je te conseille de revoir le cours.";

        }
        if(pos >= questions.length){
            if (cpt<=1){
                answer = "réponse correcte";
            }
            else answer = "réponses correctes";


            test.innerHTML = "<div class=\"jumbotron "+note+"\" >"+"<div class=\"container\">"
                    +"<h1>"+cpt+"\/"+questions.length+"</h1>"+
                    "<p>Tu as "+cpt+" "+answer+" sur "+questions.length+"</p>"+"<p>"+conseil+"</p>"+
                    "<p><a class=\"btn btn-primary btn-lg\" href=\"/LogEduc/\"  role=\"button\">Revenir à l\'accueil</a></p>"+
                    "<p><a class=\"btn btn-primary btn-lg\" href=\"/LogEduc/Exercices/Instruments/quizNiveau1.php\"  role=\"button\">Recommencer</a></p>"+
                    "<p><a class=\"btn btn-primary btn-lg\" href=\"/LogEduc/Exercices/Instruments/quizNiveau2.php\"  role=\"button\">Exercice Suivant</a></p>"+
                    "<p><a class=\"btn btn-warning btn-lg\" href=\"/LogEduc/Exercices/Instruments/cours.php\"  role=\"button\">Revoir le cours</a></p>"+

                    "</div>"+
                    "</div>"


            _("test_status").innerHTML = "<button href='#' class='btn btn-success left-block'>Test terminé</button>";
            pos = 0;
            cpt = 0;

            return false;
        }
        //question = compte[pos].question;
        question = questions[pos][0];

        tete = "<div class='row titre'><div class='col-sm-8 col-sm-offset-2'><h2>Question "+(pos+1)+" sur "+questions.length+"</h2>"+
                "</div><div class='col-sm-1'> <br/> <header><nav><table><tr><td><a href='/LogEduc/'><button class='btn btn-success'>Menu</button></a>"+
                "</td> <td><a href='/LogEduc/Exercices/Instruments/indexEx.php'><button class='btn btn-primary'>Exos</button></a>"+
                "<td><form method='post' action='../../../Controller/Login_controller.php'><input type='hidden' name='deconnexion' />"+
                "<input type='submit'class='btn btn-danger' value='Quitter' /> </form> </td> </tr></table></nav></header></div></div>";
        _("test_status").innerHTML = tete+"<h1 >"+question+"</h1></div>";



        chA = questions[pos][1];
        chB = questions[pos][2];
        chC = questions[pos][3];
        chD = questions[pos][4];
        reponse = questions[pos][5];
        explicatif = questions[pos][6];
        indice = "Rémi attend ta réponse !";
        if (indice==""){
            indice="...";
        }

        //indice = question[pos][7];

        contenu = "<div class='InstrumentAvent row'>"
                +"<div id='ImageVent'>"
                +"<div class='col-xs-6 col-sm-3'><img class='img-responsive img-rounded  thumbnail' src=\'"+chA+"' alt='A'  /></div>"
                +"<div class='col-xs-6 col-sm-3'><img class='img-responsive img-rounded  thumbnail' src=\'"+chB+"' alt='B'  /></div>"
                +'<div class=\'col-xs-6 col-sm-3\'><img class=\'img-responsive img-rounded  thumbnail\' src=\''+chC+"' alt='C'  /></div>"
                +"<div class='col-xs-6 col-sm-3'><img class='img-responsive img-rounded  thumbnail' src="+chD+" alt='D'></div>"
                +"</div></div>"+"<div><span class='glyphicon glyphicon-triangle-bottom'>"+"</span><div class=\"progress\">"+'<div class="progress-bar progress-bar-success progress-bar-striped active" aria-valuenow="'+pourcent+'" style="width: '+pourcent+'%"><span class="sr-only">'+pourcent+'%</span> </div> <div class="progress-bar progress-bar-danger progress-bar-striped active" aria-valuenow="'+pourfaux+'" style="width: '+pourfaux+'%"> <span class="sr-only">'+pourfaux+'%</span> </div>'+"</div></div>"
                +"<div class='DepotVent col-xs-6 .col-md-4 jumbotron'><p><br>Glisse la bonne image ici</p></div>"
                +"<div class='col-xs-6 .col-md-4'>"+"<div><div class='aide'>"+"<div class='explication jumbotron'><kbd><kbd>"+indice+"</kbd></kbd></div>"
                +"<div class='score bouton'><kbd><kbd>SCORE</kbd> : "+cpt+"<kbd></kbd></kbd></div>"
                +"<button onclick='checkAnswer()' type='submit' class='btn btn-primary  bouton'>Question Suivante</button>"+"</div> </div> </div>";
        test.innerHTML = contenu;

        $(document).ready(function()
        {
            suivanteQuestion = false;

            $('img').draggable({
                revert: true, // on renvoie les images à leur place si elles ne sont pas déposées au bon endroit
                cursor: 'move', // on définit un nouveau curseur pour aider le visiteur à comprendre l'action
                stack: 'img', // option dont je n'ai pas parlé, elle permet de mettre au premier plan l'image déplacée (cela empêche les autres de passer au-dessus)

                start: function () {
                    content = $(this).attr('src');
                    alt = $(this).attr('alt');

                }
            });
            $('.DepotVent').droppable({
                accept: '#ImageVent img', // très important, ce paramètre permet de n'accepter que les images de la classe à vent
                activeClass: 'alert-info', // classe appelée lorsqu'on commence l'action de transition
                hoverClass: 'alert-warning',// classe appelée lorsqu'on rentrer l'image dans la bonne zone
                drop: function (event,ui) {
                    url = '<div class=""><img class="img-responsive img-rounded thumbnail" src='+content+' alt='+alt+' /></div>'
                    $(".DepotVent p").remove();

                    $(".DepotVent div").remove();
                    suivanteQuestion = true;

                    //nb = ((pos+1)/questions.length)*100;
                    //pourcent = nb.toFixed();
                    //var allo = $('.progress-bar').innerHTML;
                    //alert(allo);

                    //$('.progress').html("<div class=\"progress-bar progress-bar-warning progress-bar-striped active\" role=\"progressbar\"aria-valuenow=\""+pourcent+"\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:"+pourcent+"%\">"+ pourcent+"% </div>");


                    //$(this).html(' ');
                    //alert(alt);
                    //$(this).append(url);

                    ui.draggable.appendTo($(this)).css({left: '0px', top: '0px',bottom: '0px', right: '0px'});
                    $(this).droppable("destroy");


                    if(alt==reponse)
                    {
                        cpt++;

                        $('.aide .explication').remove();
                        $('.aide').append('<div class=" explication jumbotron correct"><kbd><kbd>BRAVO!!! '+explicatif+'</kbd></kbd></div>');

                        $('.aide .score').remove();
                        $('.aide').append('<div class="score"><kbd><kbd>SCORE</kbd> : <kbd>'+cpt+'</kbd></kbd></div>');

                        $('.aide .bouton').remove();
                        if(pos==questions.length-1){
                            $('.aide').append('<button onclick="checkAnswer()" type="submit" class="btn btn-primary bouton">Résultats</button>');
                        }
                        else
                            $('.aide').append('<button onclick="checkAnswer()" type="submit" class="btn btn-primary bouton">Question Suivante</button>');

                    }
                    else{
                        cptfaux++;

                        $('.aide .explication').remove();
                        $('.aide').append('<div class=" explication jumbotron faux"><kbd><kbd>'+"DOMMAGE. Explication: "+explicatif+'</kbd></kbd></div>');

                        $('.aide .score').remove();
                        $('.aide').append('<div class="score"><kbd><kbd>SCORE</kbd> : <kbd>'+cpt+'</kbd></kbd></div>');
                        $('.aide .bouton').remove();
                        if(pos==questions.length-1){
                            $('.aide').append('<button onclick="checkAnswer()" type="submit" class="btn btn-primary bouton">Résultats</button>');
                        }
                        else
                            $('.aide').append('<button onclick="checkAnswer()" type="submit" class="btn btn-primary bouton">Question Suivante</button>');
                    }

                    nb = ((pos+1)/questions.length)*100;
                    juste = ((cpt)/questions.length)*100;
                    wrong = ((cptfaux)/questions.length)*100;
                    //pourcent = nb.toFixed();
                    pourcent = juste.toFixed();
                    pourfaux = wrong.toFixed();

                    //var allo = $('.progress-bar').innerHTML;
                    //alert(allo);

                    total= '<div class="progress-bar progress-bar-success progress-bar-striped active" aria-valuenow="'+pourcent+'" style="width: '+pourcent+'%"><span class="sr-only">'+pourcent+'%</span> </div> <div class="progress-bar progress-bar-danger progress-bar-striped active" aria-valuenow="'+pourfaux+'" style="width: '+pourfaux+'%"> <span class="sr-only">'+pourfaux+'%</span> </div>';
                    $('.progress').html(total);
                }

            });
        });

    }
    function checkAnswer()
    {
        if(suivanteQuestion){
            pos++;
            renderQuestion();}
        else {
            $('.aide .explication').remove();
            $('.aide').append('<div class=" explication jumbotron faux"><kbd><kbd>Il faut que tu répondes à la question. Il est important d\'essayer. COURAGE !!!!</kbd></kbd></div>');

            $('.aide .score').remove();
            $('.aide').append('<div class="score"><kbd><kbd>SCORE</kbd> : <kbd>'+cpt+'</kbd></kbd></div>');

            $('.aide .bouton').remove();
            $('.aide').append('<button onclick="checkAnswer()" type="submit" class="btn btn-primary bouton">Question Suivante</button>');
        }
    }
    window.addEventListener("load", renderQuestion, false);

    /* ------------------------------------ Script global --------------------------------------------*/
</script>
</html>
