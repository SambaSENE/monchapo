<?php
require("scripts-php/connexion_bdd.php");

if(isset($_GET["id"])){

$requete=$bdd->prepare("SELECT * FROM article WHERE id_article=?");
$requete->execute(array($_GET["id"]));
$article=$requete->fetch();

?>

<?php
include("admin.php"); 
?>

<form action="scripts-php/update.php?action=article&id=<?= $_GET["id"] ?>" method="post" enctype="multipart/form-data">
<img src=" <?= 'images/'.$article["photo_article"] ?>">

<label for="file">Image produit :</label>
<input type="file" name="file">
<input type="hidden" name="name_file" value="<?= $article["photo_article"] ?>">

<label for="intitule">Intitulé :</label>
<input type="text" name="intitule" value="<?= $article["intitule_article"] ?>">

<label for="description">Description :</label>
<textarea name="description"><?= $article["description_article"] ?></textarea>
<input type="submit" value="send">

<label for="prix">prix :</label>
<input type="text" name="prix" value="<?= $article["prix_article"] ?>">

<?php
$requete=$bdd->prepare("SELECT * FROM couleur");
 $requete->execute(array());
?>
 <label for="couleur">Couleur :</label>
<select name="couleur">
<?php
 while ($couleur=$requete->fetch()){
?>
<?php
if($couleur ["id_couleur"] == $article["id_couleur"]){
    $selected = "selected";
} else {
    $selected = "";
} ?>

<option value="<?= $couleur["id_couleur"] ?>" <?= $selected ?> ><?= $couleur["couleur_article"] ?></option>


<?php }
?>
</select>
<input type="submit" value="Modifier">

</form>

<?php } ?>