<?php
// Il faut inclure le fichier de connexion dans le fichier insert 
include 'connexion.php';
//Ce fichier insert.php va recevoir ce que l'utilisateur va saisir dans le formulaire html
if (isset($_POST['valider'])) {
    if (
        !empty($_POST['lastname'])
        && !empty($_POST['firstname'])
        && !empty($_POST['phoneNumber'])
        && !empty($_POST['mailAdress'])
        && !empty($_POST['gender'])
    ) {
        $sexe = htmlspecialchars($_POST['gender']);
        $nom = htmlspecialchars($_POST['lastname']);
        $prenom = htmlspecialchars($_POST['firstname']);
        $phone = htmlspecialchars($_POST['phoneNumber']);
        $mail = htmlspecialchars($_POST['mailAdress']);
    }
}
//Il faut exécuter la requête SQL qui permet d'insérer un utilisateur au niveau de notre BDD qui contient la table user
$req = mysqli_query($link, "insert into user(gender,lastname,firstname,phoneNumber,mailAdress) values('$sexe','$nom','$prenom','$phone','$mail')");
//On test si l'ajout est effectué avec succès ou non
if ($req) {
    echo 'insertion réussie';
} else {
    echo 'erreur d\'insertion';
}
