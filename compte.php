<?php
require("scripts-php/connexion_bdd.php");

        $requete=$bdd->prepare("SELECT * FROM client WHERE id_client=?");
        $requete->execute(array($_SESSION["id_client"]));
        while($info=$requete->fetch()){ ?>

<h1>Voici vos information <?= $info["nom_client"]." ".$info["prenom_client"] ?></h1>
<br>
<h2>Votre nom : <?= $info["nom_client"]?></h2>
<h2>Votre prénom : <?= $info["prenom_client"] ?></h2>
<h2>Votre mail : <?= $info["mail_client"] ?></h2>
<h2>Votre adresse : <?= $info["adresse_client"] ?></h2>
<h2>Votre mot de passe : ********</h2>
<a class="btn btn-primary" href="index.php?page=modification" role="button">Modifier</a>
<a class="btn btn-primary" href="index.php?page=historique" role="button">Historique Commande</a>
<?php
        }
?>

