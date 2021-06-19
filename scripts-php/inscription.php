<?php
session_start();
require("connexion_bdd.php");

if(isset($_POST["nom_client"])
&&isset($_POST["prenom_client"])
&&isset($_POST["mdp_client"])
&&isset($_POST["mdp_client_conf"])
&&isset($_POST["mail_client"])
&&isset($_POST["adresse_client"])){

if(!empty($_POST["nom_client"])
    &&!empty($_POST["prenom_client"])
    &&!empty($_POST["mdp_client"])
    &&!empty($_POST["mdp_client_conf"])
    &&!empty($_POST["mail_client"])
    &&isset($_POST["adresse_client"])){

        if($_POST["mdp_client"]==$_POST["mdp_client_conf"]){
           
$insert=$bdd->prepare("INSERT INTO client (nom_client, prenom_client, mdp_client, mail_client, adresse_client, type_client)
VALUES(:nom_client, :prenom_client, :mdp_client, :mail_client, :adresse_client, :type_client)");

$insert->execute(array(":nom_client"=>strip_tags($_POST["nom_client"]),
                        ":prenom_client"=>strip_tags($_POST["prenom_client"]),
                        ":mdp_client"=>password_hash(strip_tags($_POST["mdp_client"]), PASSWORD_BCRYPT),
                        ":mail_client"=>strip_tags($_POST["mail_client"]),
                        ":adresse_client"=>strip_tags($_POST["adresse_client"]),
                    ":type_client" => 2));

                        $_SESSION["id_client"]=$bdd->lastInsertId();
                        $_SESSION["type"]=2;

                        header("location:../index.php");  
                        
        }else{
            header("location:../form_inscription.php?erreur=pwd");
            exit;
        }    


    }else{
        header("location:../form_inscription.php?erreur=saisie1");
        exit;
    }

}else{
    header("location:../form_inscription.php?erreur=saisie2");
    exit;
}


?> 