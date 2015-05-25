text = "Peux-tu me donner le nom de la note que tu viens de placer ?";
reponse = "";

//Variable globales utiles 
blockClick = false;
suiteNote = new Array();
faute = false;
nbFaute = 0;
//Infos sur l'utilisateur a remplir en récupérant de la base !
//L'indice auquel l'utilisateur en est
indiceProgression = 0;

function recupInfoBase(){
	//Ici la requete sql pour récupérer les infos de la base. A faire avant toute chose !
}

function reprendreExercice(){
	//Si un exercice etait en cours, on le recupere !
	ajoutMouseOverLeave();
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
			note = "Do";
			break;
		case 1:
			note ="Si";
			break;
		case 2:
			note ="La";
			break;
		case 3:
			note ="Sol";
			break;
		case 4:
			note ="Fa";
			break;
		case 5:
			note ="Mi";
			break;
		case 6:
			note ="Ré";
			break;
		}
		
			for(j=0; j<nbColonne; j++)
			{
				if(i >= 4 && i <13)
					{
						if(i % 2 == 0)
							tableau += "<td class = 'casePL' checkN = 'no'  note = '"+note+"' id='l"+i+"c"+j+"'></td>";
						else
							tableau += "<td class = 'caseP' checkN = 'no' note = '"+note+"' id='l"+i+"c"+j+"'></td>";
					
					}
					
				else
				{
					if(i % 2 == 0)
						tableau += "<td class = 'case' checkN = 'no' note = '"+note+"'  id='l"+i+"c"+j+"'></td>";	
					else
						tableau += "<td class = 'caseP' checkN = 'no' note = '"+note+"'  id='l"+i+"c"+j+"'></td>";
				}
			}
			tableau += "</tr>";
	}
	
	
	
	
	$("#porteeContainer").append(tableau);

}


//Les fonctions du bonhomme

function poseQuestionNiv1(){
	console.log("faute :"+faute);
	if(faute == false)
	{
		var message = "<font color = 'blue' size='3'> Continue, peux tu placer un <h1>"+suiteNote[indiceProgression]+" ? </h1> </font>";
	}
	else
	{
		var message = "<font color = 'blue' size='3'> Essaie encore, peux tu placer un <h1>"+suiteNote[indiceProgression]+" ? </h1> </font>";
	}
	changerMessage(message);
	blockClick = false;
}

function DonneReponsePosNiv1(notePlace)
{
	faute = false;
	var rep = "<font color = 'green' size='4'> Ta réponse est juste bravo ! La note que tu viens de placer est bien un<h1>"+notePlace+"</h1></font>";
	changerMessage(rep);
}

function DonneReponseNegNiv1(notePlace)
{
	faute = true;
	nbFaute++;
	var rep = "  <font color = 'red' size='3'> Ta réponse est fausse hélas, la note que tu viens de placer est un <h1>"+notePlace+"</h1></font>";
	changerMessage(rep);
}

function DonneInstruction()
{
	var message = "Le but de cet exercice est de replacer sur la portée la note dont je vais te donner le nom ! ";
	changerMessage(message);
}

function genereExerciceNiveau1()
{	
	
	// ON genere l'exercice de niveau 1
	// L exercice comporte une serie de cinq note a replacer sur la portee
	// La suite de ces notes seront placee dans l objet suite note
	// AJOUTER UN FACTEUR SUR L ALEATOIRE POUR GENERER LES NOTE ------------------------
	
	var note1 = -1;
	var note2 = -1;
	var textNote  = "suite note : ";
	for(var i = 0; i<5; i++)
	{
			var note ="";
			var intNote = aleatoire(1, 7);
			while(intNote == note1 || intNote == note2)
			{
				var intNote = aleatoire(1, 7);
			}
			note2 = note1;
			note1 = intNote;
			
			switch(intNote)
			{
			case 0:
				note = "Do";
				break;
			case 1:
				note ="Si";
				break;
			case 2:
				note ="La";
				break;
			case 3:
				note ="Sol";
				break;
			case 4:
				note ="Fa";
				break;
			case 5:
				note ="Mi";
				break;
			case 6:
				note ="Ré";
				break;
			}
		suiteNote.push(note);
		textNote += note+" ";
	}
	
	
	//On remet l'indice de prog à 0
	indiceProgression = 0;
	nbFaute = 0;
	var message = " <font color = 'blue' size='3'>Ok, commençons ! <br/> Peut tu placer un <h1> "+suiteNote[indiceProgression]+" ? </h1></font>";
	changerMessage(message);
	
	
	
	
	
	
	
	
	
	
	
	
	//On ajoute les mouseOver et Leave sur la portee
	ajoutMouseOverLeave();
	//On surcharge le comportement quand on click sur la portee
	//LES CLICKS SUR LA PORTEE -------------------------------------------------------------------------------------------------------
	$('body').on("click","td.case", function(event){
		var note = $(this).attr("note");
		
		var check = $(this).attr('checkN');

		if(check == 'no')
		{
		
			if(blockClick == false)
			{
				// Ici le comportement du bonhome
				verifierNoteClickNiveau1(note);
				
				$(this).css("background-image","url('ligneNote2.png')");
				$(this).attr("checkN","yes");
			}
		}
		else
		{	
			
		
			
			$(this).css("background-image","url('caseVide.png')");
			$(this).attr("checkN","no");
		}
			
		
	});
	$('body').on("click","td.casePL",function(event){
		//alert("y");
		var note = $(this).attr("note");
		var check = $(this).attr('checkN');

		if(check == 'no')
		{
			
			if(blockClick == false)
			{
				// COMPORTEMENT
				verifierNoteClickNiveau1(note);
				$(this).css("background-image","url('ligneNote.png')");
				$(this).attr('checkN',"yes");
			}
		}
		else
		{
		
	
			
			
			$(this).css("background-image","url('ligne1.png')");
			$(this).attr('checkN',"no");
		}
		//$(this).css("background-image","url('ligneNote.png')");
		
	});
	$('body').on("click","td.caseP", function(event){
		//alert("yo");
		var note = $(this).attr("note");
		
		var check = $(this).attr('checkN');

		if(check == 'no')
		{
			
			if(blockClick == false)
			{
				//COMPORTEMENT
				verifierNoteClickNiveau1(note);
				$(this).css("background-image","url('note.png')");
				$(this).attr('checkN',"yes");
			}
		}
		else
		{
			

			
			$(this).css("background-image","url('caseVide.png')");
			$(this).attr('checkN',"no");
		}
		//$(this).css("background-image","url('note.png')");
		
	});
		//FIN CLICK SUR PORTEE -----------------------------------------------------------------------------------------------
	
	console.log(textNote);
	

}

function finJeu()
{
	var text = "Tu as fais "+nbFaute+" fautes";
	$("#nbFaute").append(text);
	affichePopuVictoireNiv1();
}

function verifierNoteClickNiveau1(note)
{
	console.log(blockClick);
	if(blockClick == false)
	{
		console.log(blockClick);
		//On block le comportement losrqu'on est entrain de donner la reponse. 
		//On le reactivera lors que la prochaine question est posee
		blockClick = true;
		//Ici le comportement du monsieur
		//alert("je vérifie ma note");
		if(note == suiteNote[indiceProgression])
		{
			DonneReponsePosNiv1(note);
			
			if(indiceProgression == 4)
			{
					finJeu();
			}
			else
			{
				indiceProgression++;
				myVar = setTimeout(function(){poseQuestionNiv1()}, 1000);
			}
		}
		else
		{
			DonneReponseNegNiv1(note);
			myVar = setTimeout(function(){poseQuestionNiv1()}, 1000);
		}
	}
}


















function ajoutMouseOverLeave()
{
	//MOUSE OVER
	$('body').on("mouseover","td.case", function(event){

		var check = $(this).attr('checkN');
		//$(this).css("border","1px solid black");
		if(check == 'no')
		{
			
			$(this).css("background-image","url('ligneNote2.png')");
			
		}
		
	});
	$('body').on("mouseover","td.casePL",function(event){
		//$(this).css("border","1px solid black");
		var check = $(this).attr('checkN');
		if(check == 'no')
		{
			$(this).css("background-image","url('ligneNote.png')");
		
		}
		
	});
	$('body').on("mouseover","td.caseP", function(event){
		//$(this).css("border","1px solid black");
		var check = $(this).attr('checkN');
		if(check == 'no')
		{
			$(this).css("background-image","url('note.png')");

		}
		
	});

	//MOUSE LEAVE
	$('body').on("mouseleave","td.case", function(event){
		var check = $(this).attr('checkN');
		if(check == 'no')
		{
			$(this).css("background-image","url('caseVide.png')");
		
		}
		
	});
	$('body').on("mouseleave","td.casePL",function(event){
		var check = $(this).attr('checkN');
		if(check == 'no')
		{
			$(this).css("background-image","url('ligne1.png')");

		}
		
	});
	$('body').on("mouseleave","td.caseP", function(event){
		var check = $(this).attr('checkN');
		//$(this).css("border","none");
		if(check == 'no')
		{
			$(this).css("background-image","url('caseVide.png')");

		}
		
	});
}

function aleatoire(min, max) {
    return (Math.floor((max-min)*Math.random())+min);
};