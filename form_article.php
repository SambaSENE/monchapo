<?php include("admin.php");
 require("scripts-php/connexion_bdd.php");
  
     ?>

<form action="scripts-php/insert.php?action=article" method="post" enctype="multipart/form-data">

<label for="file">Image produit :</label>
<input type="file" name="file">

<label for="intitule">Intitulé :</label>
<input type="text" name="intitule">

<label for="description">Description :</label>
<textarea name="description"></textarea>

<label for="prix">Prix :</label>
<input type="text" name="prix">



<?php
$requete=$bdd->prepare("SELECT * FROM couleur");
 $requete->execute(array());
?>
 <label for="couleur">Couleur :</label>
<select name="couleur">
<?php
 while ($couleur=$requete->fetch()){
?>


<option value="<?= $couleur["id_couleur"] ?>"><?= $couleur["couleur_article"] ?></option>


<?php }
?>
</select>
<input type="submit" value="Ajouter">

</form>

