
//Variable globales utiles 
blockClick = false;
suiteNote = new Array();
suiteNoteIndice = new Array();
faute = false;
nbFaute = 0;
nbFauteTotale = 0;
tempsAffichage = 5000;
//Infos sur l'utilisateur a remplir en récupérant de la base !
//L'indice auquel l'utilisateur en est
indiceProgression = 0;
// Le niveau du joueur
//niveauJoueur = 1;
niveauJoueur = $('#niveauEtu').html();
niveauJoueur = parseInt(niveauJoueur);
//Variables utiles à l'exo
nbNotePlacee = 0;
nbFauteNiveau1 = 0;
nbNote = 0;

//Variable utile pour les indices niveau 1
indices = new Array();
indexIndice = 0;




function levelUp()
{
	
	var exo ="exo="+ 22;
	 $.ajax({
        type: 'GET',
          url: "/LogEduc/Exercices/Portee/webapp/levelup.php", 
           data: exo,
            success: function (data) {
                  alert("Félicitaion, tu as augmenté d'un niveau !");          
            }
        });
}
function aleatoire(min, max) {
    return (Math.floor((max-min)*Math.random())+min);
}

function recupInfoBase(){
	//Ici la requete sql pour récupérer les infos de la base. A faire avant toute chose !
}

function reprendreExercice(){
	//Si un exercice etait en cours, on le recupere !
	ajoutMouseOverLeave();
}

function choixNiveau(){
	
	switch(niveauJoueur)
	{
	case 1:
		genereExerciceNiveau1();
		break;
	case 2:
		genereExerciceNiveau2();
		break;
	case 3:
		genereExerciceNiveau3();
		break;
	case 4:
		genereExerciceNiveau4();
		break;
	case 5:
		genereExerciceNiveau5();
		break;
	}
	
}


function genererPortee(nbLigne, nbColonne)
{
	nbLigne = 20;
	nbColonne = 20;
	/* Pour une portée de 20 lignes
	 * 0 _________________________ do
	 * 1                           si
	 * 2 ________________________  la
	 * 3                           sol
	 * 4 -------ligne pleine------ fa
	 * 5                           mi
	 * 6 ------------------------- ré
	 * 7                           do
	 * 8 ------------------------- si
	 * 9						   la
	 * 10 ------------------------ sol
	 * 11						   fa	
	 * 12 ------------------------ mi
	 * 13						   ré
	 * 14 ________________________ do
	 * 15                          si
	 * 16 ________________________ la
	 * 17                          sol
	 * 18 ________________________ fa
	 * 19                          mi
	 * 20 ________________________ ré
	 */
	var tableau = "";
	
	for(i=0; i<nbLigne; i++)
	{
		
		tableau += "<tr id='l"+i+"'>";
		var note = "";
		var pos = i %  7;
		// Pour assigner les notes à chaque case
		switch(pos)
		{
		case 0:
			note = "do";
			break;
		case 1:
			note ="si";
			break;
		case 2:
			note ="la";
			break;
		case 3:
			note ="sol";
			break;
		case 4:
			note ="fa";
			break;
		case 5:
			note ="mi";
			break;
		case 6:
			note ="re";
			break;
		}
		
			for(j=0; j<nbColonne; j++)
			{
				if(i >= 4 && i <13)
					{
						if(i % 2 == 0)
							tableau += "<td class = 'casePL' ligne = '"+i+"' checkN = 'no'  note = '"+note+"' id='l"+i+"c"+j+"' notePlacee ='no'></td>";
						else
							tableau += "<td class = 'caseP' ligne = '"+i+"' checkN = 'no' note = '"+note+"' id='l"+i+"c"+j+"' notePlacee ='no'></td>";
					
					}
					
				else
				{
					if(i % 2 == 0)
						tableau += "<td class = 'case' ligne = '"+i+"' checkN = 'no' note = '"+note+"'  id='l"+i+"c"+j+"' notePlacee ='no'></td>";	
					else
						tableau += "<td class = 'caseP' ligne = '"+i+"' checkN = 'no' note = '"+note+"'  id='l"+i+"c"+j+"' notePlacee ='no'></td>";
				}
			}
			tableau += "</tr>";
	}
	
	
	
	
	$("#porteeContainer").append(tableau);

}

function reInitPortee(){
	$("#porteeContainer").empty();
	genererPortee(20, 20);
}

function finJeu()
{
	function finJeu()
{
	if(nbFaute == 0)
	{
		var text = "<FONT color='green' size='3' >Hey pas mal ! Tu as réussi du premier coup ! </FONT>";
		levelUp();
	}
	else
	{
		var text = "<FONT color='green' size='3' > Bravo ! Tu as fini l'exercice en </FONT><FONT color='blue' size='3'>"+(nbFaute+1)+" </FONT><FONT color='green' size='3'> essais ! <br/> Tu as fais </FONT><FONT color='blue' size='3'>"+nbFauteTotale+" </FONT><FONT color='green' size='3'>fautes au total </FONT>" ;
	}
	changerMessage(text);
}
}


function genereExerciceNiveau1()
{	
	//On ajoute le niveau au titre
	$("#titreNiveau").append(" <br/> niveau 1");
	// ON genere l'exercice de niveau 1
	// AJOUTER UN FACTEUR SUR L ALEATOIRE POUR GENERER LES NOTE ------------------------
	nbNote = 7;
	var note1 = -1;
	var note2 = -1;
	var textNote  = "suite note : ";
	for(var i = 0; i<nbNote; i++)
	{
			var note ="";
			var intNote = aleatoire(1, 7);
			while(intNote == note1 || intNote == note2)
			{
				var intNote = aleatoire(1, 7);
			}
			note2 = note1;
			note1 = intNote;
			indicePos = 0;
			//OOn génere notre tableau de notes.
			//Le premier niveau se contente de placer les notes entre la ligne 8 et 14
			switch(intNote)
			{
			case 0:
				note = "do";
				indicePos = 14;
				break;
			case 1:
				note ="re";
				indicePos = 13;
				break;
			case 2:
				note ="mi";
				indicePos = 12;
				break;
			case 3:
				note ="fa";
				indicePos = 11;
				break;
			case 4:
				note ="sol";
				indicePos = 10;
				break;
			case 5:
				note ="la";
				indicePos = 9;
				break;
			case 6:
				note ="si";
				indicePos = 8;
				break;
			}
		suiteNote.push(note);
		
		//On genère l'indice de la case
		var colonneClick = i+3;
		var indiceClick = "l"+indicePos+"c"+colonneClick;
		suiteNoteIndice.push(indiceClick);
		//On recupere le type de case pour pouvoir associerles bonnes images
		var typeCase = $('[id~="'+indiceClick+'"]').attr("class");
		//console.log(typeCase);
		
		if(typeCase == "casePL")
		{
			$('[id~="'+indiceClick+'"]').css("background-image","url('ligneNote.png')");
			$('[id~="'+indiceClick+'"]').attr("checkN","yes");
		}
		if(typeCase == "case")
		{
			$('[id~="'+indiceClick+'"]').css("background-image","url('ligneNote2.png')");
			$('[id~="'+indiceClick+'"]').attr("checkN","yes");
		}
		if(typeCase == "caseP")
		{
			$('[id~="'+indiceClick+'"]').css("background-image","url('note.png')");
			$('[id~="'+indiceClick+'"]').attr("checkN","yes");
		}
		textNote += note+" ";
		
		//Il faut également gerer les images !
		var idnoteImage = "note"+(i+1);
		
		
	}
	
	
	for(var i=0; i<suiteNote.length; i++)
	{
		console.log(suiteNote[i]);
	}
	//On remet l'indice de prog à 0
	indiceProgression = 0;
	nbFaute = 0;
	gestionDragDrop();
	poseQuestionNiveau1();
	
}	

function gestionDragDrop()
{

	$(".imgNote").draggable({
		  helper: 'clone',
		    revert: 'invalid',
		    appendTo: 'body',
		    
		   
		    
		   
	});
	$(".imgNote").hover(
			function () {
			$(this).css('cursor','pointer');
			});
			
	$('[checkN~="yes"]').droppable({
		 activeClass: "ui-state-hover",
		 hoverClass: "ui-state-active",
		 tolerance: "touch",
		
		drop: function(envent, ui){
			//Pour gerer le nombre de notes placées
			if($(this).attr("notePlacee") =="no")
				nbNotePlacee++;
			
			if(nbNotePlacee == nbNote)
			{
				proposeValidationN1();
				
			}
			
			
			
			
			
			var noteDrag = $(ui.draggable).attr('id');
			//console.log(noteDrag);
			if(noteDrag == "do")
			{
				console.log($(this).attr("class"));
				if($(this).attr("class") == "case ui-droppable")
					$(this).css("background-image","url('do3.png')");
				if($(this).attr("class") == "caseP ui-droppable")
					$(this).css("background-image","url('do.png')");
				if($(this).attr("class") == "casePL ui-droppable")
					$(this).css("background-image","url('do2.png')");
				
				$(this).attr("notePlacee","do");
			}
			if(noteDrag == "re")
			{
				if($(this).attr("class") == "case ui-droppable")
					$(this).css("background-image","url('re3.png')");
				if($(this).attr("class") == "caseP ui-droppable")
					$(this).css("background-image","url('re.png')");
				if($(this).attr("class") == "casePL ui-droppable")
					$(this).css("background-image","url('re2.png')");
				
				$(this).attr("notePlacee","re");
			}
			if(noteDrag == "mi")
			{
				if($(this).attr("class") == "case ui-droppable")
					$(this).css("background-image","url('mi3.png')");
				if($(this).attr("class") == "caseP ui-droppable")
					$(this).css("background-image","url('mi.png')");
				if($(this).attr("class") == "casePL ui-droppable")
					$(this).css("background-image","url('mi2.png')");
				
				$(this).attr("notePlacee","mi");
			}
			if(noteDrag == "fa")
			{
				if($(this).attr("class") == "case ui-droppable")
					$(this).css("background-image","url('fa3.png')");
				if($(this).attr("class") == "caseP ui-droppable")
					$(this).css("background-image","url('fa.png')");
				if($(this).attr("class") == "casePL ui-droppable")
					$(this).css("background-image","url('fa2.png')");
				
				$(this).attr("notePlacee","fa");
			}
			if(noteDrag == "sol")
			{
				if($(this).attr("class") == "case ui-droppable")
					$(this).css("background-image","url('sol3.png')");
				if($(this).attr("class") == "caseP ui-droppable")
					$(this).css("background-image","url('sol.png')");
				if($(this).attr("class") == "casePL ui-droppable")
					$(this).css("background-image","url('sol2.png')");
				
				$(this).attr("notePlacee","sol");
			}
			if(noteDrag == "la")
			{
				if($(this).attr("class") == "case ui-droppable")
					$(this).css("background-image","url('la3.png')");
				if($(this).attr("class") == "caseP ui-droppable")
					$(this).css("background-image","url('la.png')");
				if($(this).attr("class") == "casePL ui-droppable")
					$(this).css("background-image","url('la2.png')");
				
				$(this).attr("notePlacee","la");
			}
			if(noteDrag == "si")
			{
				if($(this).attr("class") == "case ui-droppable")
					$(this).css("background-image","url('si3.png')");
				if($(this).attr("class") == "caseP ui-droppable")
					$(this).css("background-image","url('si.png')");
				if($(this).attr("class") == "casePL ui-droppable")
					$(this).css("background-image","url('si2.png')");

				$(this).attr("notePlacee","si");
			}
			
		}	
	});
}
function poseQuestionNiveau1(){
	var mess = "<FONT color='blue' size='3'> C'est partit ! Peux-tu retrouver le nom des notes que j'ai placées sur la porté ? </FONT>";
	changerMessage(mess);
}
function poseQuestionNiveau2(){
	var mess = "<FONT color='blue' size='3'> Un peu plus dur cette fois ! Peux-tu retrouver le nom des notes que j'ai placées sur la porté ? </FONT>";
	changerMessage(mess);
}
function poseQuestionNiveau3(){
	var mess = "<FONT color='blue' size='3'> Pas mal, tu commences à bien te débrouiller ! Continue, peux-tu retrouver le nom des notes que j'ai placées sur la porté ? </FONT>";
	changerMessage(mess);
}
function poseQuestionNiveau4(){
	var mess = "<FONT color='blue' size='3'> Tu atteind un très bon niveau ! Mais arrivera-tu à t'en sortir cette fois ? </FONT>";
	changerMessage(mess);
}
function poseQuestionNiveau5(){
	var mess = "<FONT color='blue' size='3'> Hé bien ! Tu es un champion à ce que je vois ! Voici mon défi final, un dernière effort avant la gloire ! Seras-tu à la hauteur ? </FONT>";
	changerMessage(mess);
}
function proposeValidationN1()
{
	//Quand l'utilisateur a placé toutes ses notes, on lui propose de valider
	var mess = "<FONT color='blue' size='4'> tu as l'air d'avoir fini, clique sur Valider si tu veux que je corrige </FONT><br/><br/>";
	mess += "<a size='4' onmouseover=\"this.style.cursor='pointer'\" onclick='verifierNiveau1()'>Valider</a>";
	changerMessage(mess)
}
function verifierNiveau1(){
	
	// INDICE LIGNE
	var noteBienPlaceeLigne = new Array();
	var noteMalPlaceeLigne = new Array();
	// Indice deux même notes doivent être separé par 7 cases
	var noteBienPlaceeSeven = new Array();
	var noteMalPlaceeSeven = new Array();
	indices= new Array();
	indexIndice = 0;
	// Indice compte : L'apprenant a placé cette note 7 ligne en dessous ou au dessus, il faut qu'il compte
	// Pas utile dans le niveau 1 vu qu'on ne fait que sur un interval de 7 lignes
	var noteBienPlaceeCompte = new Array();
	var noteMalPlaceeCompte = new Array();
	
	
	//Indice, après le note viens le ... ?
	var noteBienPlaceePrec = new Array();
	var noteMalPlaceePrec = new Array();
	
	for(var i=0; i<suiteNoteIndice.length; i++)
	{
		//On verifie que notePlacee = note
		/*console.log(i+" note");
		console.log($('[id~="'+suiteNoteIndice[i]+'"]').attr("notePlacee"));
		console.log($('[id~="'+suiteNoteIndice[i]+'"]').attr("note"));*/
		
		//Variable utile pour generer indice
		
		
		
		if($('[id~="'+suiteNoteIndice[i]+'"]').attr("notePlacee") == $('[id~="'+suiteNoteIndice[i]+'"]').attr("note"))
		{
			console.log("ok");
			if($('[id~="'+suiteNoteIndice[i]+'"]').attr("class") == "case ui-droppable")
				$('[id~="'+suiteNoteIndice[i]+'"]').css("background-image","url('"+$('[id~="'+suiteNoteIndice[i]+'"]').attr("notePlacee")+"3green.png')");
			if($('[id~="'+suiteNoteIndice[i]+'"]').attr("class") == "caseP ui-droppable")
				$('[id~="'+suiteNoteIndice[i]+'"]').css("background-image","url('"+$('[id~="'+suiteNoteIndice[i]+'"]').attr("notePlacee")+"green.png')");
			if($('[id~="'+suiteNoteIndice[i]+'"]').attr("class") == "casePL ui-droppable")
				$('[id~="'+suiteNoteIndice[i]+'"]').css("background-image","url('"+$('[id~="'+suiteNoteIndice[i]+'"]').attr("notePlacee")+"2green.png')");
		
			//Si on a placé une bonne note sur cette ligne, on la retient pour l'indice
			noteBienPlaceeLigne.push($('[id~="'+suiteNoteIndice[i]+'"]').attr("ligne"));
			//On retient les notes que l'on a bien placé
			noteBienPlaceeSeven.push($('[id~="'+suiteNoteIndice[i]+'"]').attr("notePlacee"));
			noteBienPlaceeCompte.push($('[id~="'+suiteNoteIndice[i]+'"]').attr("notePlacee"));
			noteBienPlaceePrec.push($('[id~="'+suiteNoteIndice[i]+'"]').attr("notePlacee"));
		}
		else
		{
			console.log("nope");
			if($('[id~="'+suiteNoteIndice[i]+'"]').attr("class") == "case ui-droppable")
				$('[id~="'+suiteNoteIndice[i]+'"]').css("background-image","url('"+$('[id~="'+suiteNoteIndice[i]+'"]').attr("notePlacee")+"3red.png')");
			if($('[id~="'+suiteNoteIndice[i]+'"]').attr("class") == "caseP ui-droppable")
				$('[id~="'+suiteNoteIndice[i]+'"]').css("background-image","url('"+$('[id~="'+suiteNoteIndice[i]+'"]').attr("notePlacee")+"red.png')");
			if($('[id~="'+suiteNoteIndice[i]+'"]').attr("class") == "casePL ui-droppable")
				$('[id~="'+suiteNoteIndice[i]+'"]').css("background-image","url('"+$('[id~="'+suiteNoteIndice[i]+'"]').attr("notePlacee")+"2red.png')");
			nbFauteNiveau1++;
			nbFauteTotale++;
			//Ligne mal
			noteMalPlaceeLigne.push($('[id~="'+suiteNoteIndice[i]+'"]').attr("ligne"));
			// seven mal
			noteMalPlaceeSeven.push($('[id~="'+suiteNoteIndice[i]+'"]').attr("notePlacee"));
			//Compte, on ne push plus la note placee mais la réponse
			var trouve = false;
			for(var y=0; y<noteBienPlaceeLigne.length; y++)
			{
				if($('[id~="'+suiteNoteIndice[i]+'"]').attr("ligne") == noteBienPlaceeLigne[y] )
					trouve = true;
			}
			if(trouve = false)
			{
				noteMalPlaceeCompte.push($('[id~="'+suiteNoteIndice[i]+'"]').attr("note"));
			}
			
			var notePrec = null;
			var noteAct = $('[id~="'+suiteNoteIndice[i]+'"]').attr("note");
			if(noteAct == "do")
				notePrec = "Si";
			if(noteAct == "re")
				notePrec = "Do";
			if(noteAct == "mi")
				notePrec = "Ré";
			if(noteAct == "fa")
				notePrec = "Mi";
			if(noteAct == "sol")
				notePrec = "Fa";
			if(noteAct == "la")
				notePrec = "Sol";
			if(noteAct == "si")
				notePrec = "La";
			
			noteMalPlaceePrec.push(notePrec);
	
		}
	}
	
	// INDICE DE LIGNE
	for(var j = 0; j< noteBienPlaceeLigne.length; j++)
	{
		for(var t=0; t<noteMalPlaceeLigne.length; t++)
		{
			if(noteMalPlaceeLigne[t] == noteBienPlaceeLigne[j])
			{
				indices.push("Une de tes notes est fausse alors que tu as déjà placé la bonne réponse sur cette ligne");
				console.log("on ajoute un indice Ligne");
			}
		}
	}
	
	//Indice seven
	for(var j = 0; j< noteBienPlaceeSeven.length; j++)
	{
		for(var t=0; t<noteMalPlaceeSeven.length; t++)
		{
			if(noteMalPlaceeSeven[t] == noteBienPlaceeSeven[j])
			{
				indices.push("Tu as bien placé un "+ noteBienPlaceeSeven[j] +" Souviens toi, un autre "+noteBienPlaceeSeven[j]+" ne peut être qu'à 7 'cases' de différences. Compte !");
				console.log("on ajoute un indice Seven");
			}
		}
	}
	
	//Indice Seven
	for(var j = 0; j< noteBienPlaceeCompte.length; j++)
	{
		for(var t=0; t<noteMalPlaceeCompte.length; t++)
		{
			if(noteMalPlaceeCompte[t] == noteBienPlaceeCompte[j])
			{
				indices.push("Si tu prend une de tes notes fausses et que tu compte 7 cases vers le haut ou vers le bas, peut-être a-tu déjà placé cette note ;) !");
				console.log("on ajoute un indice Compte");
			}
		}
	}
	
	for(var t=0; t<noteMalPlaceePrec.length; t++)
	{
		
			indices.push("après le "+ noteMalPlaceePrec[t] + " viens le ...");
			console.log("on ajoute un indice Prec");
		
	}
	
	if(nbFauteNiveau1 == 0)
	{
		finJeu();
	}
	else
	{
		nbFaute++;
		var mess = "<FONT color='blue' size='3'> J'ai colorié tes notes fausses en </FONT><FONT color='red' size='3'>rouge</FONT><FONT color='blue' size='3'>, essaie de corriger tes erreurs ! Puis clique sur valider quand tu es prêt </FONT></br>";
		mess += "<a size='4' onmouseover=\"this.style.cursor='pointer'\" onclick='donneIndice()'>Indice</a><br/>";
		mess += "<a size='4' onmouseover=\"this.style.cursor='pointer'\" onclick='verifierNiveau1()'>Valider</a>";
		nbFauteNiveau1 = 0;
		changerMessage(mess);
	}
}
function donneSolution()
{

	for(var i=0; i<suiteNoteIndice.length; i++)
	{
		if($('[id~="'+suiteNoteIndice[i]+'"]').attr("notePlacee") == $('[id~="'+suiteNoteIndice[i]+'"]').attr("note"))
		{
			if($('[id~="'+suiteNoteIndice[i]+'"]').attr("class") == "case ui-droppable")
				$('[id~="'+suiteNoteIndice[i]+'"]').css("background-image","url('"+$('[id~="'+suiteNoteIndice[i]+'"]').attr("note")+"3green.png')");
			if($('[id~="'+suiteNoteIndice[i]+'"]').attr("class") == "caseP ui-droppable")
				$('[id~="'+suiteNoteIndice[i]+'"]').css("background-image","url('"+$('[id~="'+suiteNoteIndice[i]+'"]').attr("note")+"green.png')");
			if($('[id~="'+suiteNoteIndice[i]+'"]').attr("class") == "casePL ui-droppable")
				$('[id~="'+suiteNoteIndice[i]+'"]').css("background-image","url('"+$('[id~="'+suiteNoteIndice[i]+'"]').attr("note")+"2green.png')");
		}
		else
		{
			if($('[id~="'+suiteNoteIndice[i]+'"]').attr("class") == "case ui-droppable")
				$('[id~="'+suiteNoteIndice[i]+'"]').css("background-image","url('"+$('[id~="'+suiteNoteIndice[i]+'"]').attr("note")+"3red.png')");
			if($('[id~="'+suiteNoteIndice[i]+'"]').attr("class") == "caseP ui-droppable")
				$('[id~="'+suiteNoteIndice[i]+'"]').css("background-image","url('"+$('[id~="'+suiteNoteIndice[i]+'"]').attr("note")+"red.png')");
			if($('[id~="'+suiteNoteIndice[i]+'"]').attr("class") == "casePL ui-droppable")
				$('[id~="'+suiteNoteIndice[i]+'"]').css("background-image","url('"+$('[id~="'+suiteNoteIndice[i]+'"]').attr("note")+"2red.png')");
			
			
		}
	}
	
	var mess =" <FONT color='blue' size='3'> Voici la réponse, dommage, essaie une autre fois !</FONT color='blue' size='3'>";
	if(suiteNoteIndice.length>0)
		changerMessage(mess);
}

function finJeu()
{
	if(nbFaute == 0)
	{
		var text = "<FONT color='green' size='3' >Hey pas mal ! Tu as réussi du premier coup ! </FONT>";
		levelUp();
	}
	else
	{
		var text = "<FONT color='green' size='3' > Bravo ! Tu as fini l'exercice en </FONT><FONT color='blue' size='3'>"+(nbFaute+1)+" </FONT><FONT color='green' size='3'> essais ! <br/> Tu as fais </FONT><FONT color='blue' size='3'>"+nbFauteTotale+" </FONT><FONT color='green' size='3'>fautes au total </FONT>" ;
	}
	changerMessage(text);
}

function donneIndice()
{
	console.log("indice");
	if(indices.length == 0)
	{
		var mess = "<FONT color='blue' size='3'> Je n'ai hélas pas d'indice à te donner pour l'instant";
		
	}
	else
	{
		//On pioche un indice aléatoire dans le tableau
		var intAlea = indexIndice;
		var mess = "<FONT color='blue' size='3'>";
		mess+= indices[intAlea];
		mess+= "</FONT>";
	}
	
	indexIndice++;
	if(indexIndice == indices.length)
		indexIndice = 0;
	
	changerMessage(mess);
	var timer = setTimeout(function(){
		var mess2 = "<FONT color='blue' size='3'> J'ai colorié tes notes fausses en </FONT><FONT color='red' size='3'>rouge</FONT><FONT color='blue' size='3'>, essaie de corriger tes erreurs ! Puis clique sur valider quand tu es prêt </FONT></br>";
		mess2 += "<a size='4'  onmouseover=\"this.style.cursor='pointer'\" onclick='donneIndice()'>Indice</a><br/>";
		mess2 += "<a size='4'  onmouseover=\"this.style.cursor='pointer'\" onclick='verifierNiveau1()'>Valider</a>";
		changerMessage(mess2);
	}, tempsAffichage);
}

function genereExerciceNiveau2()
{	
	//On ajoute le niveau au titre
	$("#titreNiveau").append(" <br/> niveau 2");
	// ON genere l'exercice de niveau 1
	// AJOUTER UN FACTEUR SUR L ALEATOIRE POUR GENERER LES NOTE ------------------------
	nbNote = 7;
	var note1 = -1;
	var note2 = -1;
	var textNote  = "suite note : ";
	for(var i = 0; i<nbNote; i++)
	{
			var note ="";
			var intNote = aleatoire(1, 7);
			while(intNote == note1 || intNote == note2)
			{
				var intNote = aleatoire(1, 7);
			}
			note2 = note1;
			note1 = intNote;
			indicePos = 0;
			var ligneAlea = aleatoire(1, 3);
			console.log(ligneAlea);
			//OOn génere notre tableau de notes.
			//Le premier niveau se contente de placer les notes entre la ligne 8 et 14
			switch(intNote)
			{
			case 0:
				note = "do";
				if(ligneAlea == 1)
					indicePos = 14;
				else
					indicePos = 7;
				break;
			case 1:
				note ="re";
				if(ligneAlea == 1)
					indicePos = 13;
				else
					indicePos = 6;
				break;
			case 2:
				note ="mi";
				if(ligneAlea == 1)
					indicePos = 12;
				else
					indicePos = 5;
				break;
			case 3:
				note ="fa";
				if(ligneAlea == 1)
					indicePos = 11;
				else
					indicePos = 4;
				break;
			case 4:
				note ="sol";
				if(ligneAlea == 1)
					indicePos = 10;
				else
					indicePos = 3;
				break;
			case 5:
				note ="la";
				if(ligneAlea == 1)
					indicePos = 9;
				else
					indicePos = 2;
				break;
			case 6:
				note ="si";
				if(ligneAlea == 1)
					indicePos = 8;
				else
					indicePos = 1;
				break;
			}
		suiteNote.push(note);
		
		//On genère l'indice de la case
		var colonneClick = i+3;
		var indiceClick = "l"+indicePos+"c"+colonneClick;
		suiteNoteIndice.push(indiceClick);
		//On recupere le type de case pour pouvoir associerles bonnes images
		var typeCase = $('[id~="'+indiceClick+'"]').attr("class");
		//console.log(typeCase);
		
		if(typeCase == "casePL")
		{
			$('[id~="'+indiceClick+'"]').css("background-image","url('ligneNote.png')");
			$('[id~="'+indiceClick+'"]').attr("checkN","yes");
		}
		if(typeCase == "case")
		{
			$('[id~="'+indiceClick+'"]').css("background-image","url('ligneNote2.png')");
			$('[id~="'+indiceClick+'"]').attr("checkN","yes");
		}
		if(typeCase == "caseP")
		{
			$('[id~="'+indiceClick+'"]').css("background-image","url('note.png')");
			$('[id~="'+indiceClick+'"]').attr("checkN","yes");
		}
		textNote += note+" ";
		
		//Il faut également gerer les images !
		var idnoteImage = "note"+(i+1);
		
		
	}
	
	
	
	//On remet l'indice de prog à 0
	indiceProgression = 0;
	nbFaute = 0;
	gestionDragDrop();
	poseQuestionNiveau2();
	
}	

function genereExerciceNiveau3()
{	
	//On ajoute le niveau au titre
	$("#titreNiveau").append(" <br/> niveau 3");
	// ON genere l'exercice de niveau 1
	// AJOUTER UN FACTEUR SUR L ALEATOIRE POUR GENERER LES NOTE ------------------------
	nbNote = 7;
	var note1 = -1;
	var note2 = -1;
	var textNote  = "suite note : ";
	for(var i = 0; i<nbNote; i++)
	{
			var note ="";
			var intNote = aleatoire(1, 7);
			while(intNote == note1 || intNote == note2)
			{
				var intNote = aleatoire(1, 7);
			}
			note2 = note1;
			note1 = intNote;
			indicePos = 0;
			var ligneAlea = aleatoire(1, 4);
			console.log(ligneAlea);
			//OOn génere notre tableau de notes.
			//Le premier niveau se contente de placer les notes entre la ligne 8 et 14
			switch(intNote)
			{
			case 0:
				note = "do";
				if(ligneAlea == 1)
					indicePos = 14;
				else if(ligneAlea == 2)
					indicePos = 7;
				else
					indicePos = 0;
				break;
			case 1:
				note ="re";
				if(ligneAlea == 1)
					indicePos = 13;
				else if(ligneAlea == 2)
					indicePos = 6;
				else
					indicePos = 6; // On laisse 6 car apres on va trop en bas
				break;
			case 2:
				note ="mi";
				if(ligneAlea == 1)
					indicePos = 12;
				else if(ligneAlea == 2)
					indicePos = 5;
				else
					indicePos = 5; // pareil
				break;
			case 3:
				note ="fa";
				if(ligneAlea == 1)
					indicePos = 11;
				else if(ligneAlea == 2)
					indicePos = 4;
				else
					indicePos = 18;
				break;
			case 4:
				note ="sol";
				if(ligneAlea == 1)
					indicePos = 10;
				else if(ligneAlea == 2)
					indicePos = 3;
				else
					indicePos = 3; // pareil
				break;
			case 5:
				note ="la";
				if(ligneAlea == 1)
					indicePos = 9;
				else if(ligneAlea == 2)
					indicePos = 2;
				else
					indicePos = 16;
				break;
			case 6:
				note ="si";
				if(ligneAlea == 1)
					indicePos = 8;
				else if(ligneAlea == 2)
					indicePos = 1;
				else
					indicePos = 15;
				break;
			}
		suiteNote.push(note);
		
		//On genère l'indice de la case
		var colonneClick = i+3;
		var indiceClick = "l"+indicePos+"c"+colonneClick;
		suiteNoteIndice.push(indiceClick);
		//On recupere le type de case pour pouvoir associerles bonnes images
		var typeCase = $('[id~="'+indiceClick+'"]').attr("class");
		//console.log(typeCase);
		
		if(typeCase == "casePL")
		{
			$('[id~="'+indiceClick+'"]').css("background-image","url('ligneNote.png')");
			$('[id~="'+indiceClick+'"]').attr("checkN","yes");
		}
		if(typeCase == "case")
		{
			$('[id~="'+indiceClick+'"]').css("background-image","url('ligneNote2.png')");
			$('[id~="'+indiceClick+'"]').attr("checkN","yes");
		}
		if(typeCase == "caseP")
		{
			$('[id~="'+indiceClick+'"]').css("background-image","url('note.png')");
			$('[id~="'+indiceClick+'"]').attr("checkN","yes");
		}
		textNote += note+" ";
		
		//Il faut également gerer les images !
		var idnoteImage = "note"+(i+1);
		
		
	}
	
	
	
	//On remet l'indice de prog à 0
	indiceProgression = 0;
	nbFaute = 0;
	gestionDragDrop();
	poseQuestionNiveau3();
	
}
function genereExerciceNiveau4()
{	
	//On ajoute le niveau au titre
	$("#titreNiveau").append(" <br/> niveau 4");
	// ON genere l'exercice de niveau 1
	// AJOUTER UN FACTEUR SUR L ALEATOIRE POUR GENERER LES NOTE ------------------------
	nbNote = 11;
	var note1 = -1;
	var note2 = -1;
	var textNote  = "suite note : ";
	for(var i = 0; i<nbNote; i++)
	{
			var note ="";
			var intNote = aleatoire(1, 7);
			while(intNote == note1 || intNote == note2)
			{
				var intNote = aleatoire(1, 7);
			}
			note2 = note1;
			note1 = intNote;
			indicePos = 0;
			var ligneAlea = aleatoire(1, 4);
			console.log(ligneAlea);
			//OOn génere notre tableau de notes.
			//Le premier niveau se contente de placer les notes entre la ligne 8 et 14
			switch(intNote)
			{
			case 0:
				note = "do";
				if(ligneAlea == 1)
					indicePos = 14;
				else if(ligneAlea == 2)
					indicePos = 7;
				else
					indicePos = 0;
				break;
			case 1:
				note ="re";
				if(ligneAlea == 1)
					indicePos = 13;
				else if(ligneAlea == 2)
					indicePos = 6;
				else
					indicePos = 6; // On laisse 6 car apres on va trop en bas
				break;
			case 2:
				note ="mi";
				if(ligneAlea == 1)
					indicePos = 12;
				else if(ligneAlea == 2)
					indicePos = 5;
				else
					indicePos = 5; // pareil
				break;
			case 3:
				note ="fa";
				if(ligneAlea == 1)
					indicePos = 11;
				else if(ligneAlea == 2)
					indicePos = 4;
				else
					indicePos = 18;
				break;
			case 4:
				note ="sol";
				if(ligneAlea == 1)
					indicePos = 10;
				else if(ligneAlea == 2)
					indicePos = 3;
				else
					indicePos = 3; // pareil
				break;
			case 5:
				note ="la";
				if(ligneAlea == 1)
					indicePos = 9;
				else if(ligneAlea == 2)
					indicePos = 2;
				else
					indicePos = 16;
				break;
			case 6:
				note ="si";
				if(ligneAlea == 1)
					indicePos = 8;
				else if(ligneAlea == 2)
					indicePos = 1;
				else
					indicePos = 15;
				break;
			}
		suiteNote.push(note);
		
		//On genère l'indice de la case
		var colonneClick = i+3;
		var indiceClick = "l"+indicePos+"c"+colonneClick;
		suiteNoteIndice.push(indiceClick);
		//On recupere le type de case pour pouvoir associerles bonnes images
		var typeCase = $('[id~="'+indiceClick+'"]').attr("class");
		//console.log(typeCase);
		
		if(typeCase == "casePL")
		{
			$('[id~="'+indiceClick+'"]').css("background-image","url('ligneNote.png')");
			$('[id~="'+indiceClick+'"]').attr("checkN","yes");
		}
		if(typeCase == "case")
		{
			$('[id~="'+indiceClick+'"]').css("background-image","url('ligneNote2.png')");
			$('[id~="'+indiceClick+'"]').attr("checkN","yes");
		}
		if(typeCase == "caseP")
		{
			$('[id~="'+indiceClick+'"]').css("background-image","url('note.png')");
			$('[id~="'+indiceClick+'"]').attr("checkN","yes");
		}
		textNote += note+" ";
		
		//Il faut également gerer les images !
		var idnoteImage = "note"+(i+1);
		
		
	}
	
	
	
	//On remet l'indice de prog à 0
	indiceProgression = 0;
	nbFaute = 0;
	gestionDragDrop();
	poseQuestionNiveau4();
	
}
function genereExerciceNiveau5()
{	
	//On ajoute le niveau au titre
	$("#titreNiveau").append(" <br/> niveau 5");
	// On efface le tableau de note pour les mettre dans le desordre
	$("#noteContainer").empty();
	var tableauImg = "<tr>";
	tableauImg += '<td class="caseImg" id="note6"><img class="imgNote" id="la" src="laImg.png"></td>';
	tableauImg += '<td class="caseImg" id="note2"><img class="imgNote" id="re" src="reImg.png"></td>';
	tableauImg += '<td class="caseImg" id="note5"><img class="imgNote" id="sol" src="solImg.png"></td>';
	tableauImg += '<td class="caseImg" id="note3"><img class="imgNote" id="mi" src="miImg.png"></td>';
	tableauImg += '<td class="caseImg" id="note1"><img class="imgNote" id="do" src="doImg.png"></td>';
	tableauImg += '<td class="caseImg" id="note4"><img class="imgNote" id="fa" src="faImg.png"></td>';
	tableauImg += '<td class="caseImg" id="note7"><img class="imgNote" id="si" src="siImg.png"></td>';
	tableauImg+="</tr>";
	$("#noteContainer").append(tableauImg);
	// ON genere l'exercice de niveau 1
	// AJOUTER UN FACTEUR SUR L ALEATOIRE POUR GENERER LES NOTE ------------------------
	nbNote = 15;
	var note1 = -1;
	var note2 = -1;
	var textNote  = "suite note : ";
	for(var i = 0; i<nbNote; i++)
	{
			var note ="";
			var intNote = aleatoire(1, 7);
			while(intNote == note1 || intNote == note2)
			{
				var intNote = aleatoire(1, 7);
			}
			note2 = note1;
			note1 = intNote;
			indicePos = 0;
			var ligneAlea = aleatoire(1, 4);
			console.log(ligneAlea);
			//OOn génere notre tableau de notes.
			//Le premier niveau se contente de placer les notes entre la ligne 8 et 14
			switch(intNote)
			{
			case 0:
				note = "do";
				if(ligneAlea == 1)
					indicePos = 14;
				else if(ligneAlea == 2)
					indicePos = 7;
				else
					indicePos = 0;
				break;
			case 1:
				note ="re";
				if(ligneAlea == 1)
					indicePos = 13;
				else if(ligneAlea == 2)
					indicePos = 6;
				else
					indicePos = 6; // On laisse 6 car apres on va trop en bas
				break;
			case 2:
				note ="mi";
				if(ligneAlea == 1)
					indicePos = 12;
				else if(ligneAlea == 2)
					indicePos = 5;
				else
					indicePos = 5; // pareil
				break;
			case 3:
				note ="fa";
				if(ligneAlea == 1)
					indicePos = 11;
				else if(ligneAlea == 2)
					indicePos = 4;
				else
					indicePos = 18;
				break;
			case 4:
				note ="sol";
				if(ligneAlea == 1)
					indicePos = 10;
				else if(ligneAlea == 2)
					indicePos = 3;
				else
					indicePos = 3; // pareil
				break;
			case 5:
				note ="la";
				if(ligneAlea == 1)
					indicePos = 9;
				else if(ligneAlea == 2)
					indicePos = 2;
				else
					indicePos = 16;
				break;
			case 6:
				note ="si";
				if(ligneAlea == 1)
					indicePos = 8;
				else if(ligneAlea == 2)
					indicePos = 1;
				else
					indicePos = 15;
				break;
			}
		suiteNote.push(note);
		
		//On genère l'indice de la case
		var colonneClick = i+3;
		var indiceClick = "l"+indicePos+"c"+colonneClick;
		suiteNoteIndice.push(indiceClick);
		//On recupere le type de case pour pouvoir associerles bonnes images
		var typeCase = $('[id~="'+indiceClick+'"]').attr("class");
		//console.log(typeCase);
		
		if(typeCase == "casePL")
		{
			$('[id~="'+indiceClick+'"]').css("background-image","url('ligneNote.png')");
			$('[id~="'+indiceClick+'"]').attr("checkN","yes");
		}
		if(typeCase == "case")
		{
			$('[id~="'+indiceClick+'"]').css("background-image","url('ligneNote2.png')");
			$('[id~="'+indiceClick+'"]').attr("checkN","yes");
		}
		if(typeCase == "caseP")
		{
			$('[id~="'+indiceClick+'"]').css("background-image","url('note.png')");
			$('[id~="'+indiceClick+'"]').attr("checkN","yes");
		}
		textNote += note+" ";
		
		//Il faut également gerer les images !
		var idnoteImage = "note"+(i+1);
		
		
	}
	
	
	
	//On remet l'indice de prog à 0
	indiceProgression = 0;
	nbFaute = 0;
	gestionDragDrop();
	poseQuestionNiveau5();
	
}