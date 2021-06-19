<?php
require("scripts-php/connexion_bdd.php");
?>

<h2>Historique de commande</h2><br>
<?php
 $requete=$bdd->prepare("SELECT * FROM commande WHERE id_client=?");
 $requete->execute(array($_SESSION["id_client"]));
 while($commande=$requete->fetch()){ ?>




<h3>N° commande : <?=$commande["id_commande"]?> <br> Effectué le : <?=$commande["eff_commande"]?> <br> Statut de la commande : <?=$commande["statut_commande"]?> <br> Expédié le : <?=$commande["exp_commande"]?>  </h3>

<?php
        }
        ?>

