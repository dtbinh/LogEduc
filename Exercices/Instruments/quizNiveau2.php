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
 ["Trouve l'instrument appartenant à la famille des instruments à cordes","img/harpe.jpg","img/tuba.jpg","img/flute.jpg","img/harmonica.jpg","A","La harpe est un instrument de musique à cordes pincées de forme le plus souvent triangulaire, muni de cordes tendues de longueurs variables dont les plus courtes donnent les notes les plus aiguës.","Cet instrument possède des cordes"],
  ["Trouve l'instrument appartenant à la famille des instruments à vent","img/ocarina.jpg","img/tambour.jpg","img/accordeon.jpg","img/djembe.jpg","A","Les instruments à vent constituent une grande famille d'instruments de musique dont le son est produit grâce au souffle du musicien. Ils sont répartis en deux sous-familles : les bois et les cuivres.","Cet instrument possède des cordes"],
 ["Trouve l'instrument appartenant à la famille des instruments à cordes frappées","img/harpe.jpg","img/violon.jpg","img/piano.jpg","img/flute.jpg","C","Un instrument à cordes frappées est un instrument de musique dont les notes sont produites par la frappe manuelle des cordes, avec des petites baguettes ou de petits marteaux (mailloches). Comme le piano.","Cet instrument possède des cordes"],
 ["Trouve l'instrument appartenant à la famille des bois","img/tuba.jpg","img/sax.jpg","img/accordeon.jpg","img/violon.jpg","B","Le nom de cette sous-famille fait référence au matériau avec lequel sont fabriqués les instruments. Mais il y a des exceptions : par exemple la flûte traversière et le saxophone, fabriqués en métal !","Cet instrument possède des cordes"],
 ["Trouve l'instrument appartenant à la famille des instruments à percussion","img/harmonica.jpg","img/cuivre.jpg","img/tambour.jpg","img/flute.jpg","C","Les instruments à percussion sont des instruments de musique que l'on frappe avec ou sans ses mains. Par exemple, on utilise deux bâtons pour frapper sur la batterie, contrairement au djembé, sur lequel on utilise seulement ses mains.","Cet instrument possède des cordes"],
 ["Trouve l'instrument appartenant à la famille des instruments à cordes frottées","img/tuba.jpg","img/piano.jpg","img/sax.jpg","img/violon.jpg","D","Les instruments à percussion sont des instruments de musique que l'on frappe avec ou sans ses mains. Par exemple, on utilise deux bâtons pour frapper sur la batterie, contrairement au djembé, sur lequel on utilise seulement ses mains.","Cet instrument possède des cordes"],
 ["Trouve l'instrument appartenant à la famille des instruments à cordes pincées","img/harmonica.jpg","img/harpe.jpg","img/accordeon.jpg","img/ocarina.jpg","B","La harpe est un instrument de musique à cordes pincées de forme le plus souvent triangulaire, muni de cordes tendues de longueurs variables dont les plus courtes donnent les notes les plus aiguës.","Cet instrument possède des cordes"],
 ["Trouve l'instrument appartenant à la famille des cuivres","img/cuivre.jpg","img/sax.jpg","img/violon.jpg","img/guitareElec.jpg","A","Les instruments de cette sous-famille sont pour la plupart construits en laiton (et pas en... cuivre, qui est un métal trop mou). Comme le tuba ou la trompette","Cet instrument possède des cordes"],
  ["Trouve l'instrument appartenant à la famille des instruments à vent", "img/harmonica.jpg", "img/piano.jpg","img/accordeon.jpg","img/guitare.jpg", "A","Les instruments à vent constituent une grande famille d'instruments de musique dont le son est produit grâce au souffle du musicien."],
 ["Trouve l'instrument appartenant à la famille des instruments à cordes", "img/guitare.jpg", "img/flute.jpg","img/piano.jpg","img/sax.jpg", "A","La guitare est un instrument à cordes pincées. Les cordes sont disposées parallèlement à la table d'harmonie et au manche, généralement coupé de frettes, sur lesquelles on appuie les cordes, d'une main, pour produire des notes différentes"]

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
        console.log(questions);
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
                    "<p><a class=\"btn btn-primary btn-lg\" href=\"/LogEduc/Exercices/Instruments/quizNiveau2.php\"  role=\"button\">Recommencer</a></p>"+
                    "<p><a class=\"btn btn-primary btn-lg\" href=\"/LogEduc/Exercices/Instruments/quizNiveau1.php\"  role=\"button\">Exercice précédent</a></p>"+
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
