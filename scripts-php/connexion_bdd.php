<?php
/* connexion Ã  la bdd en PDO */
try{
    $bdd = new PDO('mysql:host=localhost; dbname=monchapo; charset=utf8', 'root', '');
}
    // on attrape l'exception (l'erreur) et on l'affiche
    catch(exception $e)
{
    die('Erreur '.$e->getMessage());
}
?>