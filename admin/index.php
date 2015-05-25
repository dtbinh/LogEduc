<?php   require_once('../db/database.php');
spl_autoload_register('loadClass');

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Administration</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />


    </head>

  <body>

<div id="container" class="hero-unit">
  <h1>SKATEALYON - Admin</h1>

<nav>
  <h5><a href="#container">SKATEALYON - Admin</a></h5>
  <ul>
    <li><a href="#showSpotsUnchecked"><strong>Les spots en attente</strong></a></li>
    <li><a href="#showSpots"><strong>Les spots</strong></a></li>
    <li><ul><a href="#addSpot">Ajouter</a></ul></li>
    <li><a href="#showUsers"><strong>Les utilisateurs</strong></a></li>
    <li><ul><a href="#addUser">Ajouter</a></ul></li>
  </ul>
  <a href="..">Retour au site</a>
</nav>

  <h3 id="showSpotsUnchecked">Les spots en attente</h3>
  <table class="table table-striped">
    <tr>
      <th>Id</th>
      <th>Nom</th>
      <th>Clé</th>
      <th>Adresse</th>
      <th>Lattitude</th>
      <th>Longitude</th>
      <th>Description</th>
      <th>Ajouteur</th>
      <th>Ajouter</th>
      <th>Supprimer</th>

    </tr>
    <?php
      $spots = getSpotsUnchecked();

       foreach($spots as $spot) {
        echo '
          <tr> <form method="post" action="Admin_controller.php">
        <input type="hidden" name="manageSpot" />
          <td>'.$spot->getId().'</td>
          <td>'.htmlspecialchars_decode($spot->getNom()).'</td>
          <td>'.htmlspecialchars_decode($spot->getKey()).'</td>
          <td>'.htmlspecialchars_decode($spot->getAdresse()).'</td>
          <td>'.$spot->getLat().'</td>
          <td>'.$spot->getLng().'</td>
          <td>'.htmlspecialchars_decode($spot->getDesc()).'</td>
          <td>'.htmlspecialchars_decode($spot->getAkaUserAdd()).'</td>

          <input type="hidden" name="id_spot" value="'.$spot->getId().'" />
          <input type="hidden" name="nom_spot" value="'.htmlspecialchars_decode($spot->getNom()).'" />
          <input type="hidden" name="key_spot" value="'.htmlspecialchars_decode($spot->getKey()).'" />
          <input type="hidden" name="adresse_spot" value="'.htmlspecialchars_decode($spot->getAdresse()).'" />
          <input type="hidden" name="lat_spot" value="'.$spot->getLat().'" />
          <input type="hidden" name="lng_spot" value="'.$spot->getLng().'" />
          <input type="hidden" name="desc_spot" value="'.htmlspecialchars_decode($spot->getDesc()).'" />
          <input type="hidden" name="aka_user_add" value="'.htmlspecialchars_decode($spot->getAkaUserAdd()).'" />
          <input type="hidden" name="user_add" value="'.$spot->getUserAdd().'" />
          <td>
            <button class="btn btn-success glyphicon glyphicon-ok" name="editSpot" value="'.$spot->getId().'"></button>
      
            </td>
          <td>
            <button class="btn btn-danger glyphicon glyphicon-remove" name="deleteSpot" value="'.$spot->getId().'"></button>
            </td>
            </form>
        </tr>';
       }
    ?>
    </table>

<?php $spots = getSpotsChecked(); ?>
  <h3 id="showSpots">Les spots</h3>
  <table class="table table-striped">
    <tr>
      <th>Id</th>
      <th>Nom</th>
      <th>Clé</th>
      <th>Adresse</th>
      <th>Lattitude</th>
      <th>Longitude</th>
      <th>Description</th>
      <th>Ajouteur</th>
      <th>Supprimer</th>

    </tr>
    <?php
       foreach($spots as $spot) {
        echo '<tr>
          <td>'.$spot->getId().'</td>
          <td>'.htmlspecialchars_decode($spot->getNom()).'</td>
          <td>'.htmlspecialchars_decode($spot->getKey()).'</td>
          <td>'.htmlspecialchars_decode($spot->getAdresse()).'</td>
          <td>'.$spot->getLat().'</td>
          <td>'.$spot->getLng().'</td>
          <td>'.htmlspecialchars_decode($spot->getDesc()).'</td>
          <td>'.htmlspecialchars_decode($spot->getAkaUserAdd()).'</td>
          <td><form method="post" action="Admin_controller.php">
            <input type="hidden" name="deleteSpot" value="'.$spot->getId().'" />
            <button class="btn btn-danger glyphicon glyphicon-remove"></button>
            </form>
            </td>
        </tr>';
       }
    ?>
    </table>



  <h3 id="addSpot">Ajouter un spot</h3>


<form role="form" method="post" action="Admin_controller.php">
<input type="hidden" name="addSpot" />
<div class="form-group has-feedback" id="nom_spot_group">
    <label class="control-label" for="nom_spot">Nom</label>
    <input type="text" class="form-control" id="nom_spot" name="nom_spot" placeholder="Nom du spot">
  <span class="glyphicon form-control-feedback"></span>
</div>

<div class="form-group has-feedback" id="adresse_spot_group">
    <label class="control-label" for="adresse_spot">Adresse</label>
    <input type="text" class="form-control" id="adresse_spot" name="adresse_spot" placeholder="Adresse du spot">
  <span class="glyphicon form-control-feedback"></span>
</div>

<div class="form-group has-feedback" id="key_spot_group">
  <label class="control-label" for="key_spot">Clé</label>
  <input type="text" class="form-control" id="key_spot" name="key_spot" placeholder="Clé du spot">
  <span class="glyphicon form-control-feedback"></span>
  <span class="help-block">Identifiant unique de 7 caractères : PKGERLA, BWGUILL</span>
</div>

<div class="form-group has-feedback" id="lat_spot_group">
    <label class="control-label" for="lat_spot">Lattitude</label>
    <input type="text" class="form-control" id="lat_spot" name="lat_spot" placeholder="Lattitude du spot">
  <span class="glyphicon form-control-feedback"></span>
  <span class="help-block">Nombre flottant avec point : 45.4568</span>
</div>

<div class="form-group has-feedback" id="lng_spot_group">
    <label class="control-label" for="lng_spot">Longitude</label>
    <input type="text" class="form-control" id="lng_spot" name="lng_spot" placeholder="Longitude du spot">
  <span class="glyphicon form-control-feedback"></span>
  <span class="help-block">Nombre flottant avec point : 4.85426</span>
  </div>

<div class="form-group has-feedback" id="desc_spot_group">
    <label class="control-label" for="desc_spot">Description</label>
          <textarea class="form-control" name="desc_spot" id="desc_spot"></textarea>
  <span class="glyphicon form-control-feedback"></span>
  <span class="help-block">Nombre flottant avec point : 4.8568</span>
</div>


  <button type="submit" class="btn btn-default">Ajouter</button>
</form>


  <h3 id="showUsers">Les utilisateurs</h3>
  <table id="manageUsers" class="table table-striped">
    <tr>
      <th>Id</th>
      <th>Aka</th>
      <th>Mail</th>
      <th>Pass</th>
      <th>Pix</th>
      <th>Droits</th>
      <th>Disc</th>
      <th>EDIT</th>
      <th>DELETE</th>
    </tr>

    <?php
      $users = getUsers();
       foreach($users as $user) {
        echo '<tr id="'.$user->getId().'">
          <td class="show-user">'.$user->getId().'</td>
          <td class="show-user">'.htmlspecialchars_decode($user->getAka()).'</td>
          <td class="show-user">'.htmlspecialchars_decode($user->getMail()).'</td>
          <td class="show-user">'.htmlspecialchars_decode($user->getPass()).'</td>
          <td class="show-user">'.htmlspecialchars_decode($user->getPix()).'</td>
          <td class="show-user">'.$user->getDroits().'</td>
          <td class="show-user">'.$user->getDisc().'</td>
          <td class="show-user">
            <button class="btn btn-warning glyphicon glyphicon-pencil"></button>
          </td>
          <td class="show-user">
            <form method="post" action="Admin_controller.php">
              <input type="hidden" name="deleteUser" value="'.$user->getId().'" />
              <button class="btn btn-danger glyphicon glyphicon-remove"></button>
            </form>
          </td>

          <form method="post" action="Admin_controller.php">
            <input type="hidden" name="manageUser" value="'.$user->getId().'" />

            <td class="manage-user"><input type="text" class="form-control" name="id" value="'.$user->getId().'"/></td>
            <td class="manage-user"><input type="text" class="form-control" name="aka" value="'.htmlspecialchars_decode($user->getAka()).'"/></td>
            <td class="manage-user"><input type="text" class="form-control" name="mail" value="'.htmlspecialchars_decode($user->getMail()).'"/></td>
            <td class="manage-user"><input type="text" class="form-control" name="pass" value="'.htmlspecialchars_decode($user->getPass()).'"/></td>
            <td class="manage-user"><input type="text" class="form-control" name="pix" value="'.htmlspecialchars_decode($user->getPix()).'"/></td>
            <td class="manage-user"><input type="text" class="form-control" name="droits" value="'.$user->getDroits().'"/></td>
            <td class="manage-user"><input type="text" class="form-control" name="disc" value="'.$user->getDisc().'"/></td>

            <td colspan="2" class="manage-user">
              <button class="btn btn-success glyphicon glyphicon-ok"></button>
            </td>
          </form>

        </tr>';
       }
    ?>
    </table>


  <h3 id="addUser">Ajouter un utilisateur</h3>


<form role="form" method="post" action="Admin_controller.php">

<input type="hidden" name="addUser" />

<div class="form-group has-feedback" id="mail_user_group">
    <label class="control-label" for="mail_user">Mail</label>
    <input type="text" class="form-control" id="mail_user" name="mail_user" placeholder="Nom de l'utilisateur">
</div>

<div class="form-group has-feedback" id="pass_user_group">
    <label class="control-label" for="pass_user">Mot de passe</label>
    <input type="password" class="form-control" id="pass_user" name="pass_user" placeholder="Mot de passe de l'utilisateur">
</div>

  <button type="submit" class="btn btn-default">Ajouter</button>
</form>


</div>
    <script src="../plugin/jquery/jquery.min.js"></script>
    <script src="../plugin/bootstrap/js/bootstrap.min.js"></script>

    <script src="js/formAddspot.js" type="text/javascript"> </script>
    <script src="js/script.js" type="text/javascript"> </script>
  </body>

 
</html>


