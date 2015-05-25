<?php  session_start();
require_once('../db/database.php');
spl_autoload_register('loadClass');
if(isset($_SESSION['user']) && $_SESSION['username'] != "-error-") header('Location: main.php');

?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <title>La Musique par les Plantes</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../plugin/bootstrap/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
  </head>

  <body id="accueil">
  <?php 
  if($_SESSION['errorLogin'] == "-first-" && $_SESSION['creationSuccess'] == "-first-") {

  } else if($_SESSION['username'] == "-errorConnexion-" && isset($_SESSION['loginError'])) { 
      echo '<p class="bg-danger" id="infobarLogin">Erreur lors de la connexion: '.$_SESSION['loginError'].'</p>';
  } else if($_SESSION['username'] == "-errorCreation-" && isset($_SESSION['loginError'])) {
      echo '<p class="bg-danger" id="infobarLogin">Erreur lors de la cr&eacute;ation de compte: '.$_SESSION['loginError'].'</p>';
  } else if (isset($_SESSION['creationSuccess'])) {
      echo '<p class="bg-success" id="infobarLogin">'.$_SESSION['creationSuccess'].'</p>';      
  } ?>
  <h1>La musique par les plantes</h1>
  <section id="mainSection">
     <button type="button" class="btn btn-primary btn-page" data-toggle="modal" data-target="#user_co_modal">Connexion</button>
     <button type="button" class="btn btn-primary btn-page" data-toggle="modal" data-target="#user_cr_modal">Créer un compte</button>
</section>

<!-- Modal connexion -->
<form method="post" action="../Controller/Login_controller.php">
    <div class="modal fade" id="user_co_modal" tabindex="-1" role="dialog" aria-labelledby="connexion_modal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="connexion_modal">Connexion à un compte</h4>
          </div>
          <div class="modal-body">
              <fieldset><input class="input" type="text" name="user_login" id="user_login" placeholder="Nom d'utilisateur" /></fieldset>
              <fieldset><input class="input" type="password" name="user_pass" id="user_pass" placeholder="Mot de passe" /></fieldset>
              <!-- <fieldset><label>Se souvenir de moi</label><input type="checkbox" name="user_pass" id="user_pass" placeholder="Mot de passe" /></fieldset> -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            <input type="submit" value="Se connecter" class="btn btn-primary" />
          </div>
        </div>
      </div>
    </div>
  </form>
  
<!-- Modal creation -->
  <form method="post" action="../Controller/Login_controller.php">
    <div class="modal fade" id="user_cr_modal" tabindex="-1" role="dialog" aria-labelledby="creation_modal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="creation_modal">Création d'un compte</h4>
          </div>
          <div class="modal-body">
            <table>
              <tr>
              <fieldset><td><label for="user_login_c">Nom d'utilisateur</label></td><td class="spaceTd"></td><td><input class="input" type="text" name="user_login_c" id="user_login_c" value="" /></td></fieldset>
              </tr>
              <tr class="spaceTr"></tr>
              <tr>
              <fieldset><td><label for="user_pass_c">Mot de passe</label></td><td class="spaceTd"></td><td><input class="input" type="password" name="user_pass_c" id="user_pass_c" value="" /></td></fieldset>
              </tr>
            </table>
            <input type="hidden" name="creation" />
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            <input type="submit" value="Créer" class="btn btn-primary" />
          </div>
        </div>
      </div>
    </div>
  </form>


  <script type="text/javascript"  src="../plugin/jquery/jquery.min.js"> </script>
  <script type="text/javascript"  src="../plugin/bootstrap/js/bootstrap.min.js"> </script>
  <script src="../js/script.js"></script>
  <script type="text/javascript">
    $("#user_login_c, #user_pass_c, #user_login, #user_pass").val('');
  </script>



  </body>
</html>