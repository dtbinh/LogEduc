text = "Peux-tu me donner le nom de la note que tu viens de placer ?";
reponse = "";
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
			note ="ré";
			break;
		}
		
		
			for(j=0; j<nbColonne; j++)
			{
				if(i >= 4 && i <13)
					{
						if(i % 2 == 0)
							tableau += "<td class = 'casePL' checkN = 'no' title = '"+note+"' note = '"+note+"' id='l"+i+"c"+j+"'></td>";
						else
							tableau += "<td class = 'caseP' checkN = 'no' title = '"+note+"' note = '"+note+"' id='l"+i+"c"+j+"'></td>";
					
					}
					
				else
				{
					if(i % 2 == 0)
						tableau += "<td class = 'case' checkN = 'no' title = '"+note+"' note = '"+note+"'  id='l"+i+"c"+j+"'></td>";	
					else
						tableau += "<td class = 'caseP' checkN = 'no' title = '"+note+"' note = '"+note+"'  id='l"+i+"c"+j+"'></td>";
				}
			}
			tableau += "</tr>";
	}
	
	
	
	
	$("#porteeContainer").append(tableau);

}

$('body').on("click","td.case", function(event){
	var note = $(this).attr("note");
	
	var check = $(this).attr('checkN');

	if(check == 'no')
	{
		text = "Peux-tu me donner le nom de la note que tu viens de placer ? <br/><a onclick='DonneReponse()'>reponse</a>";
		changerMessage(text);
		reponse = note;
		
		$(this).css("background-image","url('ligneNote2.png')");
		$(this).attr("checkN","yes");
	}
	else
	{	
		text = "hmm, place une autre note.";
		changerMessage(text);
		//alert("heu");
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
		text = "Peux-tu me donner le nom de la note que tu viens de placer ? <br/><a onclick='DonneReponse()'>reponse</a>";
		changerMessage(text);
		reponse = note;
		
		$(this).css("background-image","url('ligneNote.png')");
		$(this).attr('checkN',"yes");
	}
	else
	{
		//alert("heu");
		text = "hmm, place une autre note.";
		changerMessage(text);
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
		reponse = note;
		text = "Peux-tu me donner le nom de la note que tu viens de placer ? <br/><a onclick='DonneReponse()'>reponse</a>";
		changerMessage(text);
		
		$(this).css("background-image","url('note.png')");
		$(this).attr('checkN',"yes");
	}
	else
	{
		//alert("heu");
		text = "hmm, place une autre note.";
		changerMessage(text);
		$(this).css("background-image","url('caseVide.png')");
		$(this).attr('checkN',"no");
	}
	//$(this).css("background-image","url('note.png')");
	
});

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

function DonneReponse()
{
	var rep = "la réponse est <b>"+reponse+ "</b> <br/> Continue, place une autre note ! ";
	changerMessage(rep);
}


