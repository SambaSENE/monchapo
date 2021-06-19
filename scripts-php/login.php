<?php
session_start();
require("connexion_bdd.php");

$requete=$bdd->prepare("SELECT * FROM client WHERE mail_client=?");

$requete->execute(array($_POST["mail_client"]));
$nbcustomer = $requete->rowCount();

if($nbcustomer!=0){
$customer=$requete->fetch();


    if(password_verify($_POST["mdp_client"],$customer["mdp_client"])){

    $_SESSION["type"]=$customer["type_client"];
    $_SESSION["id_client"]=$customer["id_client"];

    header("Location:../index.php");
    exit;
    }else{
        header("Location:../index.php?page=connexion&erreur=mp");
        exit; 
}
}else{
    header("Location:../index.php?page=connexion&erreur=login");
    exit;
}





?>