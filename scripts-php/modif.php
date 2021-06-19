<?php
session_start();
require("connexion_bdd.php");

$requete=$bdd->prepare("SELECT * FROM client WHERE id_client=?");
$requete->execute(array($_SESSION["id_client"]));
$customer=$requete->fetch();


if(isset($_POST["ancien_mdp_client"])&& !empty($_POST["ancien_mdp_client"])){
 
if(password_verify($_POST["ancien_mdp_client"],$customer["mdp_client"])){ 
    if($_POST["mdp_client"]==$_POST["mdp_client_conf"]){

$update=$bdd->prepare("UPDATE client SET nom_client=?, prenom_client=?, mail_client=?, adresse_client=?, mdp_client=? WHERE id_client=?");
    $update->execute(array($_POST["nom_client"], $_POST["prenom_client"], $_POST["mail_client"], $_POST["adresse_client"], password_hash(strip_tags($_POST["mdp_client"]), PASSWORD_BCRYPT), $_SESSION["id_client"]));
}
}
}else{
    $update=$bdd->prepare("UPDATE client SET nom_client=?, prenom_client=?, mail_client=?, adresse_client=? WHERE id_client=?");
    $update->execute(array($_POST["nom_client"], $_POST["prenom_client"], $_POST["mail_client"], $_POST["adresse_client"], $_SESSION["id_client"]));  
}

header("Location:../index.php?page=compte");