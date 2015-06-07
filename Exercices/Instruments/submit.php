
<!DOCTYPE html>
<html>
<head lang="fr">
  <title>Bienvenue dans notre quiz</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- inclusion du style CSS de base -->
  <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/themes/smoothness/jquery-ui.css" />
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
  <!-- inclusion des librairies jQuery et jQuery UI (fichier principal et plugins) -->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>
</head>


<body>

<?php

	  $question = $_POST['question'];
	  $imageA = $_POST['imageA'];
	  $imageB = $_POST['imageB'];
	  $imageC = $_POST['imageC'];
	  $imageD = $_POST['imageD'];
	  $reponse = $_POST['reponse'];
	  $indice = $_POST['indice'];
	  $explication = $_POST['explication'];



	  echo '<h3>'+$question+'</h3>';
?>


</body>
</html>
