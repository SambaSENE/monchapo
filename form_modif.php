<?php
require("scripts-php/connexion_bdd.php");
$requete=$bdd->prepare("SELECT * FROM client WHERE id_client=?");
$requete->execute(array($_SESSION["id_client"]));
$info=$requete->fetch();
?>

<form action="scripts-php/modif.php" method="post">

<label for="nom">Nom :</label>
<input type="text" id="nom" name="nom_client" value="<?= $info["nom_client"] ?>">

<label for="prenom">Prénom :</label>
<input type="text" id="prenom" name="prenom_client" value="<?= $info["prenom_client"] ?>">

<label for="mail">Mail :</label>
<input type="email" id="mail" name="mail_client" value="<?= $info["mail_client"] ?>">

<label for="adresse">Adresse :</label>
<input type="text" id="adresse" name="adresse_client" value="<?= $info["adresse_client"] ?>">

<label for="mdp">Ancien mot de passe</label>
<input type="password" id="mdp" name="ancien_mdp_client">

<label for="mdp">Nouveau mot de passe</label>
<input type="password" id="mdp" name="mdp_client">

<label for="mdp_confirm">Confirmez</label>
<input type="password" id="mdp_confirm" name="mdp_client_conf">

<input class="btn btn-primary" type="submit" value="Valider">

</form>