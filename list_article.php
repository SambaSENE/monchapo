<?php
require("scripts-php/connexion_bdd.php");
$requete=$bdd->prepare("SELECT * FROM article");
$requete->execute(array());

?>

<table>
<thead>
<tr>
<th>Title</th>
<th></th>
<th></th>
</tr>
</thead>

<tbody>
<?php
while($article=$requete->fetch()){ ?>
<tr>
<td><?= $article["intitule_article"] ?></td>
<td><button><a href="update_article.php?id=<?= $article["id_article"]?>">Modifier</a></button></td>
<td><button><a href="scripts-php/delete.php?action=article&id=<?= $article["id_article"]?>">Supprimer</a></button></td>

</tr>

<?php } ?>
</tbody>