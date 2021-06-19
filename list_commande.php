<?php 

require("scripts-php/connexion_bdd.php");
$requete=$bdd->prepare("SELECT * FROM commande");
$requete->execute(array());

?>

<table>
    <thead>
        <tr>
            <th> Title </th>
            <th> </th>
            <th> </th>
        </tr>
    </thead>

    <tbody>
    <?php 
    
    while($commande=$requete->fetch()){ ?>

<tr>
<td> <?= $commande["id_commande"] ?></td>
<td><button><a href="update_commande.php?id=<?= $commande["id_commande"] ?>">Modifier commande</a></button></td>
<td><button><a href="scripts-php/delete.php?action=commande&id=<?= $commande["id_commande"] ?>">Supprimer la commande</a></button></td>
<tr>

<?php } ?>
</tbody>