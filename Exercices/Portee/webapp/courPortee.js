


/*
 * La fonction changerMessage(message) prend du html en entrée et l'ajoute dans la bulle de Rémi
 */


function sommaire()
{
	//Gestion de l'affichage
	$("#textContainer").scrollTop( 1000 );
	$('#introduction').hide();
	$('#sommaire').show();
	$('#cleSol').hide();
	$('#cleFa').hide();
	$('#porteeContainer').hide();
	$('#nomCle').empty();
	//POUR REMI
	var message = "<FONT color='blue' size='3'>";
	/*
	 * Ici ce que vous voulez faire dire à Rémi, Faites ce que vous voulez, moi j'vais lui faire dire que c'est le sommaire !
	 */
	message+= "Voici le sommaire de la leçon ! Clique sur un chapite pour y acceder directement, ou clique sur suite pour commencer le cours du début !";
	message+= '<br/><a onmouseover="this.style.cursor=\'pointer\'" onClick="introduction()"> suite -></a>';
	/*
	 * Fin du text
	 */
	message += "</FONT>";
	//Et on ajoute
	changerMessage(message);

	
	//Pour afficher le cours à droite et le perso à gauche
	$("#persoCol").attr("class","col-sm-5");
	$("#textContainer").attr("class","col-sm-7");
	$("#persoContainer").attr("class","col-sm-5");
	$("#BulleText").attr("class","col-sm-5");
	
	
}
function introduction()
{
	//Gestion de l'affichage
//	$("#textContainer").scrollTop( 1000 );
	$('#sommaire').hide();
	$('#introduction').show();
	$('#cleSol').hide();
	$('#cleFa').hide();
	$('#porteeContainer').hide();
	$('#nomCle').empty();
	
	
	$('#textContainer').animate({
		
		scrollTop:$('#sommaire').offset().top
	}, 'slow');
	
	
	
	
	
	//POUR REMI
	var message = "<FONT color='blue' size='3'>";
	/*
	 * Ici ce que vous voulez faire dire à Rémi, Faites ce que vous voulez, moi j'vais lui faire dire que c'est le sommaire !
	 */
	message+= "<br/>Commençons par une petite Introduction !<br/>";
	message+= '<br/><br/><a onmouseover="this.style.cursor=\'pointer\'" onClick="sommaire()"> <- Sommaire</a>';
	message+= '<br/><a onmouseover="this.style.cursor=\'pointer\'" onClick="cleSol()">La clé de Sol -></a>';

	/*
	 * Fin du text
	 */
	message += "</FONT>";
	//Et on ajoute
	changerMessage(message);

}
function cleSol()
{
	
	$('#sommaire').hide();
	$('#introduction').hide();
	$('#cleSol').show();
	$('#cleFa').hide();
	$('#porteeContainer').empty();
	genererPortee(20, 8);
	$('#porteeContainer').show();
	$('#nomCle').empty();
	$('#nomCle').append("<FONT size='6'><b>  - Clé de Sol</b></FONT>");
	
	//Gestion de l'affichage
	$('#textContainer').animate({
			
			scrollTop:$('#sommaire').offset().top
		}, 'slow');
	//POUR REMI
	var message = "<FONT color='blue' size='3'>";
	/*
	 * Ici ce que vous voulez faire dire à Rémi, Faites ce que vous voulez, moi j'vais lui faire dire que c'est le sommaire !
	 */
	message+= "<br/> Grr, la clé de Sol ... Je n'arrive jamais à la dessiner ... Et toi ?";
	message+= '<br/><br/><a onmouseover="this.style.cursor=\'pointer\'" onClick="introduction()"> <- Introduction </a>';
	message+= '<br/><a onmouseover="this.style.cursor=\'pointer\'" onClick="cleFa()">La clé de Fa -></a>';
	
	/*
	 * Fin du text
	 */
	message += "</FONT>";
	//Et on ajoute
	changerMessage(message);

}
function cleFa()
{
	//Gestion de l'affichage
	$('#sommaire').hide();
	$('#introduction').hide();
	$('#cleSol').hide();
	$('#porteeContainer').empty();
	genererPorteeFa(20, 8);
	$('#porteeContainer').show();
	$('#nomCle').empty();
	$('#nomCle').append("<FONT size='6'><b>  - Clé de Fa</b></FONT>");
	$('#cleFa').show();
	
	//Gestion de l'affichage
	$('#textContainer').animate({
			
			scrollTop:$('#sommaire').offset().top
		}, 'slow');
	
	//POUR REMI
	var message = "<FONT color='blue' size='3'>";
	/*
	 * Ici ce que vous voulez faire dire à Rémi, Faites ce que vous voulez, moi j'vais lui faire dire que c'est le sommaire !
	 */
	message+= "<br/> Aah voici quelque chose de facile à dessiner ! Camarade, La-clé-de-Fa !<br/>";
	message+= '<br/><a onmouseover="this.style.cursor=\'pointer\'" onClick="cleSol()"> <- La clé de Sol</a>';
	message+= '<br/><a onmouseover="this.style.cursor=\'pointer\'" onClick="cleUt()">La clé de Ut -></a>';
	
	/*
	 * Fin du text
	 */
	message += "</FONT>";
	//Et on ajoute
	changerMessage(message);

}
function cleUt()
{
	alert("Un jour peut être ...");
}
//Gestion du Son, Ben ouai c'est un logiciel sur la musique après tout
$("#gammeDo").on('click',function(){
	
		$('#son')[0].play();
		
});

function verifierQuestion1()
{
	$('#reponseQ1').empty();
	
	if( ($('#But').is(':checked')) || ($('#Lut').is(':checked')) || ($('#Sut').is(':checked'))  )
	{
		$('#reponseQ1').append("<FONT color ='red'> Ta réponse est fausse, retente ta chance ! </FONT>");
	}
	else if($('#Ut').is(':checked'))
	{
		$('#reponseQ1').append("<FONT color ='green'> Bravo, c'est bien le Ut ! </FONT>");
	}
	else
	{
		$('#reponseQ1').append("<FONT color ='red'> Ta réponse est fausse, retente ta chance ! </FONT>");
	}
}
function verifierQuestion2()
{
	$('#reponseQ2').empty();
	
	//Les réponses fausses
	if( ($('#r1').is(':checked')) || ($('#r3').is(':checked')) || ($('#r4').is(':checked'))  )
	{
		$('#reponseQ2').append("<FONT color ='red'> Ta réponse est fausse, retente ta chance ! </FONT>");
	}
	//la juste
	else if($('#r2').is(':checked'))
	{
		$('#reponseQ2').append("<FONT color ='green'> Bravo, c'est bien la tête, la hampe et la durée ! </FONT>");
	}
	else
	{
		$('#reponseQ2').append("<FONT color ='red'> Ta réponse est fausse, retente ta chance ! </FONT>");
	}
}
function verifierQuestion3()
{
	$('#reponseQ3').empty();
	
	//Les réponses fausses
	if( ($('#q3r1').is(':checked')) || ($('#q3r3').is(':checked')) || ($('#q3r4').is(':checked'))  )
	{
		$('#reponseQ3').append("<FONT color ='red'> Ta réponse est fausse, retente ta chance ! </FONT>");
	}
	//la juste
	else if($('#q3r2').is(':checked'))
	{
		$('#reponseQ3').append("<FONT color ='green'> Bravo, c'est bien la clé de fa ! </FONT>");
	}
	else
	{
		$('#reponseQ3').append("<FONT color ='red'> Ta réponse est fausse, retente ta chance ! </FONT>");
	}
}
function verifierQuestion4()
{
	$('#reponseQ4').empty();
	
	//Les réponses fausses
	if( ($('#q4r2').is(':checked')) || ($('#q4r3').is(':checked')) || ($('#q4r4').is(':checked'))  )
	{
		$('#reponseQ4').append("<FONT color ='red'> Ta réponse est fausse, retente ta chance ! </FONT>");
	}
	//la juste
	else if($('#q4r1').is(':checked'))
	{
		$('#reponseQ4').append("<FONT color ='green'> Bravo, en effet la clé de la n'existe pas ! </FONT>");
	}
	else
	{
		$('#reponseQ4').append("<FONT color ='red'> Ta réponse est fausse, retente ta chance ! </FONT>");
	}
}
function verifierQuestion5()
{
	$('#reponseQ5').empty();
	
	//Les réponses fausses
	if( ($('#q5r2').is(':checked')) || ($('#q5r3').is(':checked')) || ($('#q5r1').is(':checked'))  )
	{
		$('#reponseQ5').append("<FONT color ='red'> Ta réponse est fausse, retente ta chance ! </FONT>");
	}
	//la juste
	else if($('#q5r4').is(':checked'))
	{
		$('#reponseQ5').append("<FONT color ='green'> Bravo, en effet ce sont des silences ! </FONT>");
	}
	else
	{
		$('#reponseQ5').append("<FONT color ='red'> Ta réponse est fausse, retente ta chance ! </FONT>");
	}
}
function verifierQuestion6()
{
	$('#reponseQ6').empty();
	
	//Les réponses fausses
	if( ($('#q6r1').is(':checked')) || ($('#q6r3').is(':checked')) || ($('#q6r4').is(':checked'))  )
	{
		$('#reponseQ6').append("<FONT color ='red'> Ta réponse est fausse, retente ta chance ! </FONT>");
	}
	//la juste
	else if($('#q6r2').is(':checked'))
	{
		$('#reponseQ6').append("<FONT color ='green'> Bravo, on ne peut mettre qu'une seule ronde (une ronde dure quatre temps) ! </FONT>");
	}
	else
	{
		$('#reponseQ6').append("<FONT color ='red'> Ta réponse est fausse, retente ta chance ! </FONT>");
	}
}
function verifierQuestion7()
{
	$('#reponseQ7').empty();
	
	
	if( ($('#q7r2').is(':checked')) || ($('#q7r3').is(':checked')) || ($('#q7r4').is(':checked')) || $('#q7r1').is(':checked')  )
	{
		$('#reponseQ7').append("<FONT color ='green'> Moi aussi ! Passe à la suite ;) </FONT>");
	}
	
	else
	{
		$('#reponseQ7').append("<FONT color ='red'> Ne sois pas timide ... </FONT>");
	}
}