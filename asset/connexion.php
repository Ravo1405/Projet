<?php
/* On assure la connexion à la BDD kantolocation*/
$user='root';//utilisateur par défaut
$mdp='';//son mot de passe doit être vide
$bdd='kantolocation';//nom de la base de données
$server='localhost';//nom du serveur

/*Pour pouvoir aasurer la connexion avec la BDD, 
il faut utiliser la fonction PHP: */
$link=mysqli_connect($server, $user, $mdp, $bdd);
if($link){
    //echo'connexion établie';
}else{
    die(mysqli_connect_error());
    //voir dans: http://localhost/projet/asset/connexion.php
} 
?>