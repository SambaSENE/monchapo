<?php 
require("scripts-php/connexion_bdd.php");



if(isset($_GET["id"])){


    $requete=$bdd->prepare("SELECT * FROM commande WHERE id_commande=?");
    $requete->execute(array($_GET["id"])); 
    $commande=$requete->fetch(); 


} 


?>




<form action="scripts-php/update.php?action=commande&id=<?= $_GET["id"] ?>" method="post" >
<label for="exp_commande">Date d'expedition de la commande</label>
    <input type="date" name="exp_commande" id="exp_commande" value="<?= $commande["exp_commande"] ?>">

    Statut de commande
    <label for="statut_commande"><input type="radio" id="statut_commande" name="statut_commande" value="<?= $commande["statut_commande"]="En cours"?>">En cours</label>
    <label for="statut_commande"><input type="radio" id="statut_commande" name="statut_commande" value="<?=$commande["statut_commande"]="Expédiée"?>">Expédiée</label>
    
      
    
    <input type="submit" name="valider" value="modifier">


</form>