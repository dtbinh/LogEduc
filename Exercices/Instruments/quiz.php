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

      var pos = 0, test, test_status, chA, chB, chC, chD, cpt=0;
     var suivanteQuestion = false;

      var questions = [
        ["Lequel de ces instruments est une guitare?", "img/guitare.jpg", "img/flute.jpg","img/piano.jpg","img/sax.jpg", "A","La guitare est un instrument à cordes pincées. Les cordes sont disposées parallèlement à la table d'harmonie et au manche, généralement coupé de frettes, sur lesquelles on appuie les cordes, d'une main, pour produire des notes différentes"],
        ["Retrouve la note DO sur la portée?", "img/rePorte.jpg", "img/doPorte.jpg","img/siPorte.jpg","img/solPorte.png", "B","Le Do s'écrit en Clé de Sol sur une ligne supplémentaire juste au-dessous de la portée musicale"],
        ["Lequel de ses instruments est un ocarina?", "img/accordeon.jpg", "img/flute.jpg","img/ocarina.jpg","img/harmonica.jpg", "C","L’ocarina est un instrument de musique à vent ovoïde, ressemblant à une tête d’oie ; d’où son nom : en italien, oca signifie «oie», et ocarina, «petite oie»"],
        ["Lequel de ses instruments est une flûte à bec?", "img/accordeon.jpg", "img/flute.jpg","img/ocarina.jpg","img/sax.jpg", "B","La flûte à bec est un instrument qui comporte huit trous de jeu, dont un manipulé par le pouce pour permettre l'émission des octaves aigües"],
        ["Retrouve la note LA sur la portée?", "img/solPorte.png", "img/doPorte.jpg","img/siPorte.jpg","img/laPorte.png", "D","La note La s'écrit dans le deuxième interligne de la portée musicale, c'est-à-dire entre les deuxième et troisième lignes de la portée "],
        ["Lequel de ses instruments est un accordéon?", "img/harmonica.jpg", "img/piano.jpg","img/accordeon.jpg","img/sax.jpg", "C","Le nom d'accordéon regroupe une famille d'instruments à clavier, polyphonique, utilisant des anches libres excitées par un vent variable fourni par le soufflet actionné par le musicien"],
        ["Retrouve la note RE sur la portée?", "img/rePorte.jpg", "img/doPorte.jpg","img/siPorte.jpg","img/laPorte.png", "A","Le ré s'écrit juste au-dessous de la première ligne de la portée en touchant cette ligne"],
        ["Lequel de ses instruments est un saxophone?", "img/accordeon.jpg", "img/flute.jpg","img/sax.jpg","img/ocarina.jpg", "C","Le saxophone est généralement en laiton, bien qu'il en existe certains modèles en cuivre, en argent, en plastique ou plaqués en or"],
        ["Retrouve la note SI sur la portée?", "img/siPorte.jpg", "img/doPorte.jpg","img/rePorte.jpg","img/laPorte.png", "A","La note de musique Si s'écrit sur la troisième ligne de la portée, la ligne du milieu entre le La et le Do du haut)"],
        ["Retrouve la note SOL sur la portée?", "img/siPorte.jpg", "img/solPorte.png","img/rePorte.jpg","img/doPorte.jpg", "B","La note sol s'écrit sur la deuxième ligne de la portée musicale, ligne qui donne le nom à la clé de sol"]




      ];

      function _(x){
        return document.getElementById(x);
      }



      function renderQuestion(){
        test = _("test");
        var note;
        if(cpt>questions.length/2){
            note = "correct";
        }
        else {
          note ="faux";
        }
        if(pos >= questions.length){
          if (cpt<=1){
            answer = "réponse correcte";
          }
          else answer = "réponses correctes";

          //test.innerHTML = "<h1 class='jumbotron'>Tu as "+cpt+" "+answer+" sur "+questions.length+"</h1>";

          test.innerHTML = "<div class=\"jumbotron "+note+"\" >"+"<div class=\"container\">"
              +"<h1>"+cpt+"\/"+questions.length+"</h1>"+
              "<p>Tu as "+cpt+" "+answer+" sur "+questions.length+"</p>"+
              "<p><a class=\"btn btn-primary btn-lg\" href=\"/LogEduc/\"  role=\"button\">Revenir à l\'accueil</a></p>"+
          "<p><a class=\"btn btn-primary btn-lg\" href=\"/LogEduc/Exercices/Instruments/quiz.html\"  role=\"button\">Recommencer</a></p>"+
          "</div>"+
          "</div>"

          _("test_status").innerHTML = "Test terminé";
          pos = 0;
          cpt = 0;



          //test.innerHTML += '<div><a href="http://localhost:3000/" class="btn btn-info bouton col-xs-6 col-sm-3" role="button">Revenir à l\'accueil</a></div>';
          //test.innerHTML += '<div><a href="http://localhost:3000/quiz.html" class="btn btn-info bouton col-xs-6 col-sm-3" role="button">Recommencer</a></div>';

          //test.innerHTML += "<button onclick='go()' type='submit' class='btn btn-primary  bouton'>Question Suivante</button>";

          return false;
        }
        question = questions[pos][0];

        _("test_status").innerHTML = "<h4>Question "+(pos+1)+" sur "+questions.length+"</h4><h1 >Q"+(pos+1)+": "+question+"</h1>";

        chA = questions[pos][1];
        chB = questions[pos][2];
        chC = questions[pos][3];
        chD = questions[pos][4];
        reponse = questions[pos][5];
        explicatif = questions[pos][6];
        //indice = question[pos][7];

        contenu = "<div class='InstrumentAvent row'>"
          +"<div id='ImageVent'>"
          +"<div class='col-xs-6 col-sm-3'><img class='img-responsive img-rounded  thumbnail' src=\'"+chA+"' alt='A'  /></div>"
          +"<div class='col-xs-6 col-sm-3'><img class='img-responsive img-rounded  thumbnail' src=\'"+chB+"' alt='B'  /></div>"
          +'<div class=\'col-xs-6 col-sm-3\'><img class=\'img-responsive img-rounded  thumbnail\' src=\''+chC+"' alt='C'  /></div>"
          +"<div class='col-xs-6 col-sm-3'><img class='img-responsive img-rounded  thumbnail' src="+chD+" alt='D'></div>"
          +"</div></div>"+"<div><span class='glyphicon glyphicon-triangle-bottom'>"+"<h3>Déplace la bonne image dans le cadre marqué <small>”Glissez une image ici”</small></h3></span></div>"
          +"<div class='DepotVent col-xs-6 .col-md-4 jumbotron'><p>Glissez une image ici.</p></div>"
          +"<div class='col-xs-6 .col-md-4'>"+"<div><div class='aide'>"+"<div class='explication jumbotron'><kbd><kbd>...</kbd></kbd></div>"
          +"<div class='score bouton'><kbd><kbd>SCORE</kbd> : "+cpt+"<kbd></kbd></kbd></div>"
          +"<button onclick='checkAnswer()' type='submit' class='btn btn-primary  bouton'>Question Suivante</button>"+"</div> </div> </div>";
        test.innerHTML = contenu;

        $(document).ready(function()
        {
          suivanteQuestion = false;

          //<span class="glyphicon glyphicon-music"></span>
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
              suivanteQuestion =true;


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
                $('.aide').append('<button onclick="checkAnswer()" type="submit" class="btn btn-primary bouton">Question Suivante</button>');

              }
              else{

                $('.aide .explication').remove();
                $('.aide').append('<div class="explication jumbotron faux"><kbd><kbd>'+"DOMMAGE. Explication: "+explicatif+'</kbd></kbd></div>');

                $('.aide .score').remove();
                $('.aide').append('<div class="score"><kbd><kbd>SCORE</kbd> : <kbd>'+cpt+'</kbd></kbd></div>');

                $('.aide .bouton').remove();
                $('.aide').append('<button onclick="checkAnswer()" type="submit" class="btn btn-primary bouton">Question Suivante</button>');
              }
            }

          });
        });

      }
        function checkAnswer(){
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
