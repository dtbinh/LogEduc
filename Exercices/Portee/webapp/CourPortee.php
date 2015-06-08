<?php 
session_start();
require_once('../../../db/database.php');
spl_autoload_register('loadClass');
//if(!isset($_SESSION['user']) || $_SESSION['username'] != "-error-") header('Location: accueil.php');
$news = getNews();
$user = unserialize($_SESSION['user']);
$level = getLevelByUser($user);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="CourStyle.css" type="text/css">
    </head>
<body>
<div class="row titre">
	<div class="col-sm-8 col-sm-offset-2">
		    	<h2>Retrouve la note en Clé de Sol !</h2>
	</div>
	<div class="col-sm-1">
		<br/>
			<header>
		    <nav>
		        <table>
		            <tr>
		            	<td>
		                	<a href="/LogEduc/"><button class="btn btn-success">Menu</button></a>
		                </td>
		               <td><a href="/LogEduc/Exercices/Portee/webapp/menuExo.php"><button class="btn btn-primary">Exos</button></a>
		                <td>
		               
		                 
		                </td>
		            </tr>
		        </table>
		    </nav>
		    </header>
	</div>
	
</div>

<div id="page">
	<div class="row">
		<div class="none" id="persoCol">
			<div class = "row PersoPlugn">
				<div class="col-sm-2 col-sm-offset-3" id="persoContainer">
					<img id="perso" height="250" width = "250" src="Perso.jpeg"/>
				</div>
				<div class="col-sm-6" id="BulleText">
					<div id="TextContent"><p><FONT color='blue' size='4'>Bonjour camarade, je suis Rémi Fasol !
					Aujourd'hui nous allons apprendre la lecture des notes !</FONT></p>
					<a href="/LogEduc/" onmouseover="this.style.cursor='pointer'"><- Menu principal</a><br/>
					<a onmouseover="this.style.cursor='pointer'" onClick="sommaire()">suite -></a>
					</div>
				</div>
			</div>
			<div class="row porteeBoot" >
				<div class = "row">
					<div class ="col-sm-11 col-sm-offset-1" id="nomCle">
					</div>
				</div>
				<div class = "col-sm-10 col-sm-offset-1" id=porteeContainer>
					<table id='portee'>
					</table>	
				</div>
			</div>
		</div>
		
			<div class="none" id="textContainer">
				<div  class = 'col-sm-10'>
				
					<!-- LES PARAGRAPHES -->
					
					<div id="sommaire" style="display: none;">
							<br/>
						<a onmouseover="this.style.cursor='pointer'" onClick="introduction()"><FONT size="6"> 1) Introduction </FONT></a>
							<br/>
						<a onmouseover="this.style.cursor='pointer'" onClick="cleSol()"><FONT size="6"> 2) La clé de Sol </FONT> </a>
							<br/>
						<a onmouseover="this.style.cursor='pointer'" onClick="cleFa()"><FONT size="6"> 3) La clé de Fa </FONT> </a>
							<br/>
						<a onmouseover="this.style.cursor='pointer'" onClick="cleUt()"><FONT size="6"> 4) La clé de Ut (En construction) </FONT> </a>
					</div>
					
					<div id="introduction" style="display: none;">
						<FONT size='2'>
							<br/>
							<a  onmouseover="this.style.cursor='pointer'" onClick="introduction()"><FONT size="6"> 1) Introduction </FONT> </a>
							<br/><br/>
							<a onmouseover="this.style.cursor='pointer'" onClick="introduction()"><FONT size="4">Qu'est ce que le solfège ? </FONT> </a>
							<br/><br/>
							Le solfège est l'étude de la théorie musicale et de sa notation. En effet, tu peux voir la musique comme une langue  tel que le Français par exemple. Or Tu dois sans doute savoir que la musique est composée de notes (Ré, Mi, Fa, Sol ...) ainsi que de rythme ? Et bien le solfège, c'est l'art de savoir parler et écrire cette langue ! Après ce cours, tu sera capable de lire et écrire des notes, et tu te rendra vite compte que c'est un véritable atout pour l'apprentissage de la musique et de ton instrument !
							<br/><br/>
							<a onmouseover="this.style.cursor='pointer'" onClick="introduction()"><FONT size="4">Les notes </FONT> </a>
							<br/><br/>
							En musique, une note est un soit un symbole représentant la hauteur et la durée relative d'un son, soit la hauteur d'un son en lui même. Il en existe sept en tout. En france et en Italie, le nom des différentes notes dans l'ordre est Do, Ré, Mi, Fa, Sol, La, Si. Les pays Anglo-Saxons utilisent une notation différente dont voici la conversion pour les curieux :
							<br/>
							<div>
								<img src ='ConversionNote.png'/>
							</div>
							De plus, les notes peuvent être modifiées par des altérations tel que le # (diez, augmentation de la note d'un demi-ton) et le b (bémol, diminution de la note d'un demi ton).
							La notatation Do, Ré, Mi, Fa, Sol, La Si a été crée par un moine Italien Guido d'Arezzo (XI siècle) en s'inspirant d'un chant religieux latin : <b>l'Hymne de Saint Jean-Baptiste :</b>
							<br/><br/>
							
							<div id="poeme">
							<b>Hymne de Saint Jean-Baptiste</b><br/><br/>
								<b>Ut</b> queant laxis<br/>
								<b>Re</b>sonare fibris<br/>
   								<b>Mi</b>ra gestorum<br/>
      							<b>Fa</b>muli tuorum<br/>
         						<b>Sol</b>ve polluti<br/>
           						<b>La</b>bii reatum<br/>
                      			<b>S</b>ancte <b>I</b>ohannes<br/><br/>
                      		</div>
							<div id="question"><i>Mais, me diras-tu, je vois bien la relation, mais quel est ce <b>Ut</b> ? </i><br/></div>
							En fait, le Do se dit également Ut, dont découlera la clé de Ut mais on parlera plus tard !<br/>
							Il faut cependant que tu sache que l'intervale Do, Ré, Mi, Fa, Sol, La, Si, Do est appelé une <b>Octave</b>
							<br/>
							Pour continuer, en combinant ces notes, on peux faire toute sorte de choses, comme des accords, ou encore des gammes ! <br/>
							Voici la gamme de Do par exemple (clique sur l'image pour écouter) :
							<br/><br/>
							<div id="imageCentre">
								<img  id = "gammeDo" src ='gammeDo.png'/>
							</div>
							<br/><br/>
							<audio preload="auto" id="son">
  								<source src="gammeDo.mp3" type="audio/mp3">
							</audio> 
							<br/><br/>
							Tu notera que l'image ci dessus représente une portée en clé de Sol. Mais on verra ça dans la partie suivante :)
							<br/><br/>
							Comme je te l'ai dis précédemment, une note peut représenter également la durée d'un son. Cette durée est divisée en plusieurs types de notes : les croches, les doubles croches, les triples croches, les quadruples croches, les noirs (l'unité de temps), les blanches et les rondes.
							<br/><br/>
							<div id="imageCentre">
								<img width = '200px' src ='typeNotes.gif'/>
							</div>
							<br/>
							La noire est l'unité de temps. On dit qu'elle dure un temps. De là, la blanche dure deux temps, la ronde quatre, la croche 1/2 temps et ainsi de suite !
							<br/>
							
							Intéressons nous maintenant à la forme des notes. Voici le symbole représentant une note :
							<br/><br/>
							<div id="imageCentre">
								<img src ='partiNote.png'/>
							</div>
							<br/>
							La tête peut être vide (ronde, blanche) ou pleine (noire, croche ...). Pour certains instruments, elle peut prendre des formes diverses comme pour la percussion (par exemple, croix pour les cymbales, triangle pour l'instrument du même nom, rectangle pour le tambourin…).
							D'une manière générale, sa direction est au-dessus et à droite de la tête pour les notes placées en-dessous de la troisième ligne, et en-dessous et à gauche pour les notes placées au-dessus de la troisième ligne.
							A partir de la croche, on ajoute le symbole de la durée, un pour la croche, deux pour la double croche ...
							<br/><br/>
							<b>Allez, c'est tout pour les notes, place maintenant à la portée !</b>
							
							<br/><br/>
							<a onmouseover="this.style.cursor='pointer'" onClick="introduction()"><FONT size="4">La portée </FONT> </a>
							<br/><br/>
							
							Voici à présent la portée. La portée est formée de cinq lignes horizontales. C'est la position des notes sur ces lignes ou entre ces lignes qui indiquera leur nom. On parle de lignes et d'interlignes :
							<br/><br/>
							<div>
								<img src ='porteeLigneInterligne.jpg'/>
							</div>
							En fait, la portée est à la musique ce que le cahier et ses lignes sont à l'écriture.
							On pourra donc écrire différentes informations sur celle-ci :
							<br/><br/>
							<b>Des clés :</b>
							<br/>
							<div>
								<img src ='cle.jpg'/>
							</div>
							Il existe trois clés, la clé de Sol, de Fa et de Ut ! Ces clés définissent la façon dont les notes vont êtres placées sur la portée. Celle-ci est la clé de <b>Fa</b>.
							<br/><br/>
							
							<b>Des indications de mesure :</b>
							<br/><br/>
							<div>
								<img src ='mesure.jpg'/>
							</div>
							Ces indications définissent le temps (relatif) d'une mesure (4 temps, 2 temps). Par exemple, on pourra mettre dans une mesure à 4 temps, 4 noires ou encore deux blanches.
							<br/><br/>
							
							
							<b>Une armure :</b>
							<br/>
							<div>
								<img src ='armure.jpg'/>
							</div>
							L'armure sert à spécifier que toutes les notes situées sur cette ligne ou interligne sera afféctée d'un bémol (diminution d'un ton) ou d'un diez (augmentation d'un ton). Celà évite de trop encombrer la portée !
							<br/><br/>
							
							<b>Des barres de mesure :</b>
							<br/>
							<div>
								<img src ='finMesure.jpg'/>
							</div>
							Elles servent à marquer la fin d'une mesure
							<br/><br/>
							
							<b>Des notes et des rythmes :</b>
							<br/>
							<div>
								<img src ='noteRythme.jpg'/>
							</div>
							Je pense que vous en savez déjà beaucoup :) !
							<br/><br/>
							
							<b>Des silences :</b>
							<br/>
							<div>
								<img src ='silence.jpg'/>
							</div>
							La musique c'est aussi des moments de silence ! Et voici enfin la façon de les écrires ! Leur forme correspond à leur durée.
							<br/><br/>
							
							On pourra lire également des choses au-dessus ou au-dessous de la portée. Des symboles, des indications en italiens, d'autres en français...
							<br/><br/>
							
							<b>Des indications de tempo :</b>
							<br/>
							<div>
								<img src ='tempo.jpg'/>
							</div>
							Qui spécifira si on doit jouer la musique de manière rapide ou lente.
							<br/><br/>
							
							<b>Des indications de caractère :</b>
							<br/>
							<div>
								<img src ='caractere.jpg'/>
							</div>
							Pour indiquer le caractère de la musique. Doit-on jouer de manière brutale, joyeuse ou plutôt mélancolique ? La musique c'est aussi et avant tout des sentiments :) !
							<br/><br/>
							
							<b>Des indications de nuances :</b>
							<br/>
							<div>
								<img src ='nuance.jpg'/>
							</div>
							Les nuances, c'est le charme de la musique ! Jouer tantôt fort (<i>forte</i>) ou moins fort (<i>mezzo forte</i>) ...
							<br/><br/><br/>
							
					
							<a onmouseover="this.style.cursor='pointer'" onClick="introduction()"><FONT size="4">Vérifie tes connaissances !</FONT> </a>
							<br/><br/>
							Voici un petit QCM, répond aux question puis valide pour vérifier que tu as bien assimilé toutes ces connaissances !
							<br/><br/>
							
							<form id="question1">
								<b>1) Quel autre nom donne-t-on à la note Do ?</b>
								<br/>
								  <input type="checkbox" id="Sut"  value="Sut"> Sut <br>
 								  <input type="checkbox" id="But" value="But">But<br>
 								  <input type="checkbox" id="Ut" value="Ut"> Ut <br>
 								  <input type="checkbox" id="Lut" value="Lut">Lut<br>
 								  <a onmouseover="this.style.cursor='pointer'" onclick="verifierQuestion1()">Vérifier !</a>
 								  <div id="reponseQ1"></div>
							</form>
							<form id="question2">
								<b>2) Quelles sont les trois caractéristiques du symbole de la note ?</b>
								<br/>
								  <input type="checkbox" id="r1" >Le cou, la hampe, le crochet <br>
 								  <input type="checkbox" id="r2" >La tête, la hampe, la durée<br>
 								  <input type="checkbox" id="r3" > La tête, la hanche, la barette <br>
 								  <input type="checkbox" id="r4" >Le cou, la hanche, la purée<br>
 								  <a onmouseover="this.style.cursor='pointer'" onclick="verifierQuestion2()">Vérifier !</a>
 								  <div id="reponseQ2"></div>
							</form>
							<form id="question3">
								<b>3) Que représente cette image ?</b>
								<br/>
								<div>
									<img src ='cle.jpg'/>
								</div>
								  <input type="checkbox" id="q3r1" >La clé de ré <br>
 								  <input type="checkbox" id="q3r2" >La clé de fa<br>
 								  <input type="checkbox" id="q3r3" > La clé de sol<br>
 								  <input type="checkbox" id="q3r4" >la clé à molette<br>
 								  <a onmouseover="this.style.cursor='pointer'" onclick="verifierQuestion3()">Vérifier !</a>
 								  <div id="reponseQ3"></div>
							</form>
							
							<form id="question4">
								<b>4) Parmis ces clés, laquelle n'existe pas ?</b>
								<br/>
								  <input type="checkbox" id="q4r1" >La clé de la <br>
 								  <input type="checkbox" id="q4r2" >La clé de fa<br>
 								  <input type="checkbox" id="q4r3" > La clé de ut<br>
 								  <input type="checkbox" id="q4r4" >la clé de sol<br>
 								  <a onmouseover="this.style.cursor='pointer'" onclick="verifierQuestion4()">Vérifier !</a>
 								  <div id="reponseQ4"></div>
							</form>
							<form id="question5">
								<b>5) Que représente cette image ?</b>
								<br/>
								<div>
									<img src ='silence.jpg'/>
								</div>
								  <input type="checkbox" id="q5r1" > Des indications de mesure<br>
 								  <input type="checkbox" id="q5r2" >Des indications sur le caractère<br>
 								  <input type="checkbox" id="q5r3" >Des indications sur le tempo<br>
 								  <input type="checkbox" id="q5r4" >Des silences<br>
 								  <a onmouseover="this.style.cursor='pointer'" onclick="verifierQuestion5()">Vérifier !</a>
 								  <div id="reponseQ5"></div>
							</form>
							<form id="question6">
								<b>6) Combien peut-on mettre de ronde(s) dans une mesure à quatre temps ?</b>
								<br/>
								  <input type="checkbox" id="q6r1" >2<br>
 								  <input type="checkbox" id="q6r2" >1<br>
 								  <input type="checkbox" id="q6r3" >4<br>
 								  <input type="checkbox" id="q6r4" >0 évidemment<br>
 								  <a onmouseover="this.style.cursor='pointer'" onclick="verifierQuestion6()">Vérifier !</a>
 								  <div id="reponseQ6"></div>
							</form>
							<form id="question7">
								<b>7) As-tu aimé ce cour ?</b>
								<br/>
								  <input type="checkbox" id="q7r1" >Oui<br>
 								  <input type="checkbox" id="q7r2" >Oui<br>
 								  <input type="checkbox" id="q7r3" >Oui<br>
 								  <input type="checkbox" id="q7r4" >Oui<br>
 								  <a onmouseover="this.style.cursor='pointer'" onclick="verifierQuestion7()">Vérifier !</a>
 								  <div id="reponseQ7"></div>
							</form>
							<br/>
							<FONT size='4'><b>Voilà, c'en est fini de l'introduction ! Nous allons maintenant passer à la clé de Sol ! <br/> Demande à Rémi de changer de page ;)</b></FONT>
							<br/><br/><br/><br/>
							<i>sources : <br/> 
							<a href=" http://fr.wikipedia.org/wiki/Note_de_musique"> http://fr.wikipedia.org/wiki/Note_de_musique</a> <br/>
							<a href=" http://www.coursdesolfege.fr/lesbases/3/les-notes-de-musique.html">http://www.coursdesolfege.fr/lesbases/3/les-notes-de-musique.html</a>
							 <br/>
							 <a href="https://www.youtube.com/watch?v=69Kd-7P3MTo">P'tit Bouchon</a>
							 </i>
							
						</FONT>
					</div>
					
					<div id="cleSol" style="display: none;">
						<FONT size='2'>
						<br/>
							<a onmouseover="this.style.cursor='pointer'" onClick="cleSol()"><FONT size="6"> 2) La clé de Sol </FONT> </a>
							<br/><br/>
							Allons-y ! <br/>
							Pour rappel, il faut placer au début de chaque portée une clé. Cette clé est indispensable pour savoir où placer les notes.
							Il existe trois clé : la clé de Sol, de Fa et de Ut
							<div>
									<img src ='troisClefs.png'/>
							</div>
							<br/>
							Nous allons ici nous intéresser à la clé de Sol, la plus commune.
							Commençons d'abord par apprivoiser la façon de l'écrire ! Et oui, tu verra qu'il n'est pas si aisé de la dessiner correctement ! 
							<br/>Entraine toi :) !
							<br/><br/>
							<div>
									<img src ='clef_de_sol_dessin.png'/>
							</div>
							<br/>
							Bien, tu remarquera que la clé commence à la deuxième ligne (on numérote en partant du bas). Et bien c'est justement pour ça qu'on l'apelle clé de sol, toutes les notes situées sur cette ligne sont des sol ! Essaie de retrenir celà ;)
							<br/>
							Voici maintenant la première Octave de la clé de Sol. Il va falloir à présent que tu retienne au maximum ces notes et que tu sois capable de les lire et de les placer sur la portée.
							<div>
									<img src ='porteenote.jpeg'/>
							</div>
							
							<- Tu peux t'entrainer sur la portée à gauche et jouer avec Rémi !
							<br/>
							Si tu as bien retenu ces notes de bases, commence à apprendre celles ci-dessous et tu connaîtra toutes les notes sur la portée en clé de Sol :)
							
							<div>
									<img src ='cleSolcomplet.png'/>
							</div>
							
							
							Une fois que tu te sens prêt, Tu peux commencer les exercices sur la clé de Sol :
							<br/><br/>
							<a href="porteeExGen1.php"><FONT size='4'>Exercice 1</FONT></a> <i> Replace les notes sur la portée dont Rémi va te dire le nom.</i>
							<br/>
							<a href="porteeExGen2.php"><FONT size='4'>Exercice 2</FONT></a> <i>Retrouve les notes que Rémi a placés sur la portée.</i>
							<br/>
							<br/>
							<br/>
							<FONT size='4'><b>C'est terminé pour la clé de Sol, demande à Rémi de changer de page :) !</b></FONT>
							<br/><br/><br/><br/>
							<i>sources : <br/> 
							<a href=" http://fr.wikipedia.org/wiki/Note_de_musique"> http://fr.wikipedia.org/wiki/Note_de_musique</a> <br/>
							<a href=" http://www.coursdesolfege.fr/lesbases/3/les-notes-de-musique.html">http://www.coursdesolfege.fr/lesbases/3/les-notes-de-musique.html</a>
							 </i>
							 <br/>
						</FONT>
					</div>
					
					<div id="cleFa" style="display: none;">
						<FONT size='2'>
						<br/>
						<a onmouseover="this.style.cursor='pointer'" onClick="cleFa()"><FONT size="6"> 3) La clé de Fa </FONT> </a>
						<br/><br/>
						C'est partit !<br/>
						Pour rappel, il faut placer au début de chaque portée une clé. Cette clé est indispensable pour savoir où placer les notes.
						Il existe trois clé : la clé de Sol, de Fa et de Ut
						<div>
							<img src ='troisClefs.png'/>
						</div>
						<br/>
						Nous allons ici nous intéresser à la clé de Fa.
						Commençons par le graphisme.
						<br/>
						Bon, si tu as suivi le cours sur la clé de Sol, je pense que tu n'aura aucun mal à reproduire la clé de Fa, n'est-ce pas ;) ?
						<br/><br/>
						<div>
									<img src ='clef_de_fa_dessin.png'/>
						</div>
						<br/>
						<br/>
						Ok, ici la note représentée par cette clé est sur la ligne entre les deux petits points. Tu la vois ? Allez, je te le donne dans le mille, cette note est un Fa !
						<br/>
						<br/>
						<i>- "Clé de Fa ok mais ... à quoi ça sert ?"</i>
						<br/>
						<br/>
						En fait cette clé est utilisée pour représenter toutes les notes les plus graves lorsque la clé de sol ne suffit plus !
						<br/>
						Par exemple dans ce cas, avec la clé de Sol, si on descend plus bas, ça devient illisible :
						<div>
									<img src ='cleSolFa.jpg'/>
						</div>
						<br/>
						On utilise donc la clé de Fa pour écrire ces notes, et tu remarquera qu'il reste encore beaucoup de place en dessous :
						<div>
									<img src ='cleFaSol.png'/>
						</div>
						<br/><br/>
						Voici maintenant la première octave en clé de Fa : 
						<div>
									<img src ='cleFa2.jpeg'/>
						</div>
						Et la seconde octave :
						<div>
									<img src ='cleFa.jpeg'/>
						</div>
						Il faut à présent que tu sois capable de lire et placer ces notes sur une portée en clé de Fa. 
						<br/>
						Voici une image récapitulative de toutes les notes sur la clé de Fa.
						<br>
						<- Bien sûr tu peux aussi jouer avec Rémi, il sera ravi !
						<div>
									<img src ='cleFa3.jpeg'/>
						</div>
						<br/>
						<br/>
							Une fois que tu te sens prêt, Tu peux commencer les exercices sur la clé de Fa :
							<br/><br/>
							<a href="porteeFaExGen1.php"><FONT size='4'>Exercice 1</FONT></a> <i> Replace les notes sur la portée dont Rémi va te dire le nom.</i>
							<br/>
							<a href="porteeFaExGen2.php"><FONT size='4'>Exercice 2</FONT></a> <i> Retrouve les notes que Rémi a placés sur la portée.</i>
							<br/>
							<br/>
							<br/>
							<FONT size='4'><b>C'est terminé pour la clé de Fa, demande à Rémi de changer de page :) !</b></FONT>
							<br/><br/><br/><br/>
							<i>sources : <br/> 
							<a href=" http://fr.wikipedia.org/wiki/Note_de_musique"> http://fr.wikipedia.org/wiki/Note_de_musique</a> <br/>
							<a href=" http://www.coursdesolfege.fr/lesbases/3/les-notes-de-musique.html">http://www.coursdesolfege.fr/lesbases/3/les-notes-de-musique.html</a>
							 </i>
							 <br/>
						</FONT>
					</div>
					
					
					
				</div>
			</div>
			
			
			
			
			
			</div>
	</div>
<div id="son">

</div>

<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="perso.js"></script>
<script src="porteeEntrainement.js"></script>
<script src="porteeFaEntrainement.js"></script>
<script src="courPortee.js"></script>

<script>
gestionPerso();
</script>
</body>
</html>