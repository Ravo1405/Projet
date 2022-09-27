<?php
require_once 'utils.php';

require_once 'models/Reservation.php';

$regexphoneNumber = "/^0[1-79][0-9]{8}$/";

$errors = [];
$success = false;

$reservation = new Reservation();

$lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : "";
$firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : "";
$phoneNumber = isset($_POST["phoneNumber"]) ? $_POST["phoneNumber"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$shelterName = isset($_POST["shelterName"]) ? $_POST["shelterName"] : "";
$startDate = isset($_POST["startDate"]) ? $_POST["startDate"] : "";
$endDate = isset($_POST["endDate"]) ? $_POST["endDate"] : "";

// Vérification de l'envoi du formulaire
if(isset($_POST['validate'])) {

    // Vérification du nom de famille
    if(!isset($_POST['lastname'])) {
        $errors[] = "Merci de renseigner un nom";
    }
    else if(strlen($_POST['lastname']) > 25) {
        $errors[] = "Le prénom doit contenir moins de 25 caractères";
    }
    else {
        $reservation->lastname = htmlspecialchars($_POST['lastname']);
    }

    // Vérification du prénom
    if(!isset($_POST['firstname'])) {
        $errors[] = "Merci de renseigner un nom";
    }
    else if(strlen($_POST['firstname']) > 25) {
        $errors[] = "Le nom doit contenir moins de 25 caractères";
    }
    else {
        $reservation->firstname = htmlspecialchars($_POST['firstname']);
    }

    // Vérification du numéro de téléphone
    if(!isset($_POST['phoneNumber'])) {
        $errors[] = "Merci de renseigner un numéro de téléphone";
    }
    else if(!preg_match($regexphoneNumber, $_POST['phoneNumber'])) {
        $errors[] = "Format de numéro de téléphoneNumber incorrect";
    }
    else {
        $reservation->phoneNumber = $_POST['phoneNumber'];
    }

    // Vérification de l'adresse email
    if(!isset($_POST['email'])) {
        $errors[] = "Merci de renseigner une adresse email";
    }
    else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format d'adresse email incorrect";
    }
    else {
        $reservation->email = $_POST['email'];
    }

     // Vérification du nom du gîte
     if(!isset($_POST['shelterName'])) {
        $errors[] = "Merci de renseigner un nom";
    }
    else if(strlen($_POST['shelterName']) > 10) {
        $errors[] = "Le nom doit contenir maximum 9 caractères";
    }
    else {
        $reservation->shelterName = htmlspecialchars($_POST['shelterName']);
    }

     // Vérification de la date d'arrivée
     if(!isset($_POST['startDate'])) {
        $errors[] = "Merci de renseigner votre date d'arrivée";
    }
    else if(!validateDate($_POST['startDate'], 'Y-m-d')) {
        $errors[] = "Format de date incorrect";
    }
    else {
        $reservation->startDate = $_POST['startDate'];
    }
    
    // Vérification de la date de sortie
    if(!isset($_POST['endDate'])) {
        $errors[] = "Merci de renseigner votre date de départ";
    }
    else if(!validateDate($_POST['endDate'], 'Y-m-d')) {
        $errors[] = "Format de date incorrect";
    }
    else {
        $reservation->endDate = $_POST['endDate'];
    }  

    // Le reservation existe-t-il déjà ?
    if($reservation->exists()) {
        $errors[] = "Réservation non disponible, veuillez choisir une autre date";
    }

    if(empty($errors)) {
        // Appel de la méthode d'insertion du reservation
        $reservation->create();
        $success = true;
    }

}

?>