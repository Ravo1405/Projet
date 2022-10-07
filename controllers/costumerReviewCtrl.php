<?php
require_once './utils.php';

require_once './models/CostumerReview.php';

require_once './models/Reservation.php';

$errorsReview = [];
$success = false;
$costumerReview = new CostumerReview();
$reservation = new Reservation;

$lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$datePost = isset($_POST["datePost"]) ? $_POST["datePost"] : "";
$comment = isset($_POST["comment"]) ? $_POST["comment"] : "";

// Vérification de l'envoi du formulaire
if(isset($_POST['send'])) {

    // Vérification du nom de famille
    if(empty($_POST['lastname'])) {
        $errorsReview[] = "Merci de renseigner un nom";
    }
    else if(strlen($_POST['lastname']) > 25) {
        $errorsReview[] = "Le prénom doit contenir moins de 25 caractères";
    }
    else {
        $costumerReview->lastname = htmlspecialchars($_POST['lastname']);
    }
    // Vérification de l'adresse email
    if(empty($_POST['email'])) {
        $errorsReview[] = "Merci de renseigner une adresse email";
    }
    else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errorsReview[] = "Format d'adresse email incorrect";
    }
    else {
        $costumerReview->email = $_POST['email'];
    }
     // Vérification si la date de publication est la date d'aujourd'hui
     if(empty($_POST['datePost'])) {
        $errorsReview[] = "Merci de marquer la date d'aujourd'hui!";
    }
    else if(!validateDate($_POST['datePost'], 'Y-m-d')) {
        $errorsReview[] = "Format de date incorrect";
    }
    else {
        $costumerReview->datePost = $_POST['datePost'];
    }
     // Vérification du commentaire
     if(empty($_POST['comment'])) {
        $errorsReview[] = "Merci de saisir un commentaire";
    }
    else {
        $costumerReview->comment = htmlspecialchars($_POST['comment']);
    }

     // Le reservation existe-t-il déjà ?
     if($costumerReview->isReservationExist()) {
        $costumerReview->idReservation =  $costumerReview->getReservation();
    } else {
        $errorsReview[] = "Vous pouvez mettre des commentaires après avoir séjourner chez nous";
    }
    // Le costumerReview existe-t-il déjà ?
    if($costumerReview->isCommentExist()) {
        $errorsReview[] = "Réservation non disponible, veuillez choisir une autre date";
    }
    if(empty($errorsReview)) {
        // Appel de la méthode d'insertion du commentaire
        $costumerReview->createComment();
        $success = true;
    }
}

// On appelle la méthode getReservationList pour afficher la liste des commentaires

$commentsList = $costumerReview->getCommentsList();

