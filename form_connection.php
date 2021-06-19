<form action="scripts-php/login.php" method="post">

<label for="mail">Mail :</label>
<input type="test" id="mail" name="mail_client">

<label for="mp">Mot de passe :</label>
<input type="password" id="mp" name="mdp_client">

<input class="btn btn-primary" type="submit" value="Valider">

</form>

<?php

if(isset($_GET["erreur"])){
    if($_GET["erreur"]=="mp"){
        echo "Mot de passe invalide";
    }else{
        echo "Mail invalide";
    }
}