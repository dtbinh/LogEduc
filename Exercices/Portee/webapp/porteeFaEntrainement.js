text = "<FONT color='blue' size='4'> Peux-tu me donner le nom de la note que tu viens de placer ? <br/></FONT>";
text+= '<br/><br/><a onmouseover="this.style.cursor=\'pointer\'" onClick="sommaire()"> <- Retour au sommaire</a>';
text+= '<br/><a onmouseover="this.style.cursor=\'pointer\'" onClick="cleFa()">La clé de Fa -></a>'; 
reponse = "";
function genererPorteeFa(nbLigne, nbColonne)
{
	nbLigne = 20;
	nbColonne = 8;
	/* Pour une portée de 20 lignes
	 * 0 _________________________ mi
	 * 1                           ré
	 * 2 ________________________  do
	 * 3                           si
	 * 4 -------ligne pleine------ la
	 * 5                           sol
	 * 6 ------------------------- fa
	 * 7                           mi
	 * 8 ------------------------- ré
	 * 9						   do
	 * 10 ------------------------ si
	 * 11						   la	
	 * 12 ------------------------ sol
	 * 13						   fa
	 * 14 ________________________ mi
	 * 15                          ré
	 * 16 ________________________ do
	 * 17                          si
	 * 18 ________________________ la
	 * 19                          sol
	 * 20 ________________________ fa
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
			note = "Mi";
			break;
		case 1:
			note ="Ré";
			break;
		case 2:
			note ="Do";
			break;
		case 3:
			note ="Si";
			break;
		case 4:
			note ="La";
			break;
		case 5:
			note ="Sol";
			break;
		case 6:
			note ="Fa";
			break;
		}
		
		
			for(j=0; j<nbColonne; j++)
			{
				if(i >= 4 && i <13)
					{
						if(i % 2 == 0)
							tableau += "<td class = 'fcasePL' fcheckN = 'no' title = '"+note+"' note = '"+note+"' id='fl"+i+"c"+j+"'></td>";
						else
							tableau += "<td class = 'fcaseP' fcheckN = 'no' title = '"+note+"' note = '"+note+"' id='fl"+i+"c"+j+"'></td>";
					
					}
					
				else
				{
					if(i % 2 == 0)
						tableau += "<td class = 'fcase' fcheckN = 'no' title = '"+note+"' note = '"+note+"'  id='fl"+i+"c"+j+"'></td>";	
					else
						tableau += "<td class = 'fcaseP' fcheckN = 'no' title = '"+note+"' note = '"+note+"'  id='fl"+i+"c"+j+"'></td>";
				}
			}
			tableau += "</tr>";
	}
	
	
	
	
	$("#porteeContainer").append(tableau);

}

$('body').on("click","td.fcase", function(event){
	var note = $(this).attr("note");
	
	var check = $(this).attr('fcheckN');

	if(check == 'no')
	{
		text = "<FONT color='blue' size='4' >Peux-tu me donner le nom de la note que tu viens de placer ?<FONT><br/> <br/><a onmouseover=\"this.style.cursor='pointer'\" onclick='DonneReponse()'>Réponse</a>";
		changerMessage(text);
		reponse = note;
		
		$(this).css("background-image","url('ligneNote2.png')");
		$(this).attr("fcheckN","yes");
	}
	else
	{	
		text = "<FONT color='blue' size='4' >Hihihi, place une autre note.</FONT>";
		text+= '<br/><br/><a onmouseover="this.style.cursor=\'pointer\'" onClick="sommaire()"> <- Retour au sommaire</a>';
		text+= '<br/><a onmouseover="this.style.cursor=\'pointer\'" onClick="cleFa()">La clé de Fa -></a>'; 
		changerMessage(text);
		//alert("heu");
		$(this).css("background-image","url('caseVide.png')");
		$(this).attr("fcheckN","no");
	}
		
	
});
$('body').on("click","td.fcasePL",function(event){
	//alert("y");
	var note = $(this).attr("note");
	var check = $(this).attr('fcheckN');

	if(check == 'no')
	{
		text = "<FONT color='blue' size='4' >Peux-tu me donner le nom de la note que tu viens de placer ?<FONT><br/> <br/><a onmouseover=\"this.style.cursor='pointer'\" onclick='DonneReponse()'>Réponse</a>";
		changerMessage(text);
		reponse = note;
		
		$(this).css("background-image","url('ligneNote.png')");
		$(this).attr('fcheckN',"yes");
	}
	else
	{
		//alert("heu");
		text = "<FONT color='blue' size='4' >Hihihi, place une autre note.</FONT>";
		text+= '<br/><br/><a onmouseover="this.style.cursor=\'pointer\'" onClick="sommaire()"> <- Retour au sommaire</a>';
		text+= '<br/><a onmouseover="this.style.cursor=\'pointer\'" onClick="cleFa()">La clé de Fa -></a>'; 
		changerMessage(text);
		$(this).css("background-image","url('ligne1.png')");
		$(this).attr('fcheckN',"no");
	}
	//$(this).css("background-image","url('ligneNote.png')");
	
});
$('body').on("click","td.fcaseP", function(event){
	//alert("yo");
	var note = $(this).attr("note");
	
	var check = $(this).attr('fcheckN');

	if(check == 'no')
	{
		reponse = note;
		text = "<FONT color='blue' size='4' >Peux-tu me donner le nom de la note que tu viens de placer ?<FONT><br/> <br/><a onmouseover=\"this.style.cursor='pointer'\" onclick='DonneReponse()'>Réponse</a>";
		changerMessage(text);
		
		$(this).css("background-image","url('note.png')");
		$(this).attr('fcheckN',"yes");
	}
	else
	{
		//alert("heu");
		text = "<FONT color='blue' size='4' >Hihihi, place une autre note.</FONT>";
		text+= '<br/><br/><a onmouseover="this.style.cursor=\'pointer\'" onClick="sommaire()"> <- Retour au sommaire</a>';
		text+= '<br/><a onmouseover="this.style.cursor=\'pointer\'" onClick="cleFa()">La clé de Fa -></a>'; 
		changerMessage(text);
		$(this).css("background-image","url('caseVide.png')");
		$(this).attr('fcheckN',"no");
	}
	//$(this).css("background-image","url('note.png')");
	
});

//MOUSE OVER
$('body').on("mouseover","td.fcase", function(event){

	var check = $(this).attr('fcheckN');
	//$(this).css("border","1px solid black");
	if(check == 'no')
	{
		
		$(this).css("background-image","url('ligneNote2.png')");
		
	}
	
});
$('body').on("mouseover","td.fcasePL",function(event){
	//$(this).css("border","1px solid black");
	var check = $(this).attr('fcheckN');
	if(check == 'no')
	{
		$(this).css("background-image","url('ligneNote.png')");
	
	}
	
});
$('body').on("mouseover","td.fcaseP", function(event){
	//$(this).css("border","1px solid black");
	var check = $(this).attr('fcheckN');
	if(check == 'no')
	{
		$(this).css("background-image","url('note.png')");

	}
	
});

//MOUSE LEAVE
$('body').on("mouseleave","td.fcase", function(event){
	var check = $(this).attr('fcheckN');
	if(check == 'no')
	{
		$(this).css("background-image","url('caseVide.png')");
	
	}
	
});
$('body').on("mouseleave","td.fcasePL",function(event){
	var check = $(this).attr('fcheckN');
	if(check == 'no')
	{
		$(this).css("background-image","url('ligne1.png')");

	}
	
});
$('body').on("mouseleave","td.fcaseP", function(event){
	var check = $(this).attr('fcheckN');
	//$(this).css("border","none");
	if(check == 'no')
	{
		$(this).css("background-image","url('caseVide.png')");

	}
	
});

function DonneReponse()
{
	var rep = "<FONT color='blue' size='4'> La réponse était <b>"+reponse+ "</b> <br/> Continue, place une autre note ! </FONT>";
	rep+= '<br/><br/><a onmouseover="this.style.cursor=\'pointer\'" onClick="sommaire()"> <- Retour au sommaire</a>';
	rep+= '<br/><a onmouseover="this.style.cursor=\'pointer\'" onClick="cleFa()">La clé de Fa -></a>'; 
	changerMessage(rep);
}


