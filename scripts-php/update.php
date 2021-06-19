<?php
require("connexion_bdd.php");


if(isset($_GET["action"])){
    switch($_GET["action"]){
        case "article":


            if(isset($_FILES["file"]) && isset($_POST["intitule"]) && isset($_POST["description"]) && isset($_POST["prix"]) && isset($_POST["couleur"])){
if(!empty($_POST["intitule"]) && !empty($_POST["description"]) && !empty($_POST["prix"]) && !empty($_POST["couleur"]) ){
    if(isset($_FILES["file"]) &&!empty($_FILES["file"]["name"])){
        $file=$_FILES["file"]["name"];

        $dossier='../images/';
        $fichier=basename($_FILES['file']['name']);
        $taille_max=2000000;
        $taille=filesize($_FILES['file']['tmp_name']);
        $extensions=array('.png','.jpg','.jpeg','.gif');
        $extension=strtolower(strchr($_FILES['file']['name'],'.'));


        if(in_array($extension,$extensions)){
            if ($taille<$taille_max){
          
            $fichier=preg_replace('/([^.a-z0-9]+)/i','-',$fichier);
            move_uploaded_file($_FILES['file']['tmp_name'], $dossier.$fichier);
            }
        }

    } else {
        $file=$_POST["name_file"];
    }

    $update=$bdd->prepare("UPDATE article SET intitule_article=?, description_article=?, photo_article=?, prix_article=?, id_couleur=? WHERE id_article=?");
    $update->execute(array(strip_tags($_POST["intitule"]), strip_tags($_POST["description"]), $file,  strip_tags($_POST["prix"]), strip_tags($_POST["couleur"]),
    $_GET["id"]));
    if($update){
        header("Location:../index.php?page=admin");
        exit;
        }
    }
}
break ;

case "commande":

    if(isset($_POST['exp_commande'])){
        $update=$bdd->prepare("UPDATE commande
                                SET exp_commande=?,
                                    statut_commande=?
                                WHERE id_commande=?");

        $update->execute(array(strip_tags($_POST["exp_commande"]),
                              strip_tags ($_POST["statut_commande"]),
                                $_GET["id"]));

        header("Location:../index.php?page=admin");
        exit;
    }

    break;
    }
}


    