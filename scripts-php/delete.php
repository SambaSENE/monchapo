<?php

require("connexion_bdd.php");
if(isset($_GET["action"])){
    if($_GET["action"]=="article"){
        $delete=$bdd->prepare("DELETE FROM article WHERE id_article=?");
        $delete->execute(array($_GET["id"]));

        header("Location:../index.php?page=admin");
        exit;
    }
}

require("connexion_bdd.php");
if(isset($_GET["action"])){
    if($_GET["action"]=="commande"){
        $delete=$bdd->prepare("DELETE FROM commande WHERE id_commande=?");
        $delete->execute(array($_GET["id"]));

        header("Location:../index.php?page=admin");
        exit;
    }
}
?>