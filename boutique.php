<?php 
require("scripts-php/connexion_bdd.php");

        
?>



<div>
<?php
$requete=$bdd->prepare("SELECT * FROM article");
        $requete->execute(array());
while($article=$requete->fetch()){
?>

<div class="card" style="width: 18rem;">
  <img src="<?= "./images/".$article["photo_article"] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $article["intitule_article"] ?></h5>
    <p class="card-text"><?= $article["description_article"] ?></p>
    <p class="card-text"><?= $article["prix_article"]." "."€" ?></p>
    <a href="panier.php?id_article=<?= $article ["id_article"] ?>&nom_article=<?= $article ["intitule_article"] ?>&prix_article=<?= $article ["prix_article"] ?>&ajouter">Ajouter au panier</a>
    </div>
    <?php } ?>
</div>
</div>



