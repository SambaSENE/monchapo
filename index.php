<?php
session_start();
include("header.php");
?>




<body>
<div>
<?php
if(isset($_GET["page"])){
    switch($_GET["page"]){

            case"inscription":
                include("form_inscription.php");
                break;

                case"connexion":
                    include("form_connection.php");
                    break;

                    case"compte":
                        include("compte.php");
                        break;

                        case"modification":
                            include("form_modif.php");
                            break;

                            case"boutique":
                                include("boutique.php");
                                break;

                                case"admin":
                                    include("admin.php");
                                    break;

                                    case"article":
                                        include("form_article.php");
                                        break;

                                        case"list_article":
                                            include("list_article.php");
                                            break;

                                            case"historique":
                                                include("historique.php");
                                                break;

                                                case"list_commande":
                                                    include("list_commande.php");
                                                    break;

                                        
}
}


?>
</div>
    
</body>
</html>