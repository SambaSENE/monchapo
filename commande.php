<?php
include("header.php");
require("scripts-php/connexion_bdd.php");
session_start();

$requete=$bdd->prepare("INSERT INTO commande (eff_commande, id_client, statut_commande) VALUES (?,?,?)");
$requete->execute(array(date("Y-m-d"),$_SESSION["id_client"],"en cours"));
$id_commande=$bdd->lastInsertId();

foreach($_SESSION['panier'] as $id_article=>$article_acheté){
$requete=$bdd->prepare("INSERT INTO de (id_article, id_commande, quant_article) VALUES (?,?,?)");
$requete->execute(array($id_article, $id_commande, $article_acheté["qte"]));

}
?>
<h1>Votre commande est effectué avec succès !</h1>