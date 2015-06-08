nbclick = 0;
txt = "";

function gestionPerso() {
    myVar = setTimeout(cligne, 3000);
}

function cligne() {

	$("#perso").attr("src","assets/img/ico/Perso1.jpeg");
	setTimeout(function(){
        $("#perso").attr("src","assets/img/ico/Perso2.jpeg");
	    setTimeout(function(){ $("#perso").attr("src","assets/img/ico/Perso.jpeg"); }, 40);
    }, 40);

	gestionPerso();
}

function changerMessage(message)
{
	$('#TextContent').empty();
	$('#TextContent').append(message);
}


$('body').on("click","#perso", function(event){
	nbclick++;
	if(nbclick > 5)
	{
		txt = $('#TextContent').html();
	
		//var txt = "prout";
		var textNouveau = "<br/> Arrête, tu me chatouille ^^ !";
		changerMessage(textNouveau);
		 myVar = setTimeout(function(){remettreText();}, 1500);
	}
});

function remettreText()
{
	changerMessage(txt);
}