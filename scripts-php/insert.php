<?php
require("connexion_bdd.php");
if(isset($_GET["action"])){
    switch($_GET["action"]){
        
        case "article":

if(isset($_FILES["file"]) && isset($_POST["intitule"]) && isset($_POST["description"]) && isset($_POST["prix"]) && isset($_POST["couleur"])){

        $dossier='../images/';
        $fichier=basename($_FILES['file']['name']);
        $taille_max=2000000;
        $taille=filesize($_FILES['file']['tmp_name']);
        $extensions=array('.png','.jpg','.jpeg','.gif');
        $extension=strtolower(strchr($_FILES['file']['name'],'.'));


        if(!in_array($extension,$extensions)){
            $erreur="extension non autorisée !";
        }
        if ($taille>$taille_max){
            $erreur="fichier trop gros !";
        }

        if(!isset($erreur)){
            $fichier=preg_replace('/([^.a-z0-9]+)/i','-',$fichier);
            if(move_uploaded_file($_FILES['file']['tmp_name'], $dossier.$fichier)){
                
                $insert=$bdd->prepare("INSERT INTO article (photo_article, intitule_article, description_article, prix_article, id_couleur) VALUES (?,?,?,?,?)");
                $insert->execute(array($fichier,strip_tags($_POST["intitule"]),strip_tags($_POST["description"]),strip_tags($_POST["prix"]),strip_tags($_POST["couleur"])));

                if($insert){
                 header("Location:../index.php?page=admin");
                    exit;
                }else{
                    header("Location:../index.php?erreur=insert");
                    exit;
                }
            }
        }
    }
    break;
}
}