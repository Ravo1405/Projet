<?php
require_once 'models/Reservation.php';
require_once 'utils.php';

$regexphoneNumber = "/^0[1-79][0-9]{8}$/";
$errors = [];
$reservation = new Reservation;

$id = htmlspecialchars($_GET['id']);

if (!isset($_GET['id'])) {
    $errors[] = "L'id de la réservation n'est pas renseigné";
} else if (!is_numeric($_GET['id'])) {
    $errors[] = "L'id de la réservation doit être un entier numérique";
} else {
    $oneReservation = $reservation->getOneReservation($_GET['id']);

    if ($oneReservation == null) {
        $errors[] = "Aucun réservation avec l'id " . $_GET['id'] . " n'a été trouvé";
    }
}

// Modification d'une réservation
if (isset($_POST['update'])) {
    if ($id) {
        $id = htmlspecialchars($_POST['hidden']);
        $reservation->id = $_POST['hidden'];
        // Vérification du nom de famille
        if (empty($_POST['lastname'])) {
            $errors[] = "Merci de renseigner un nom";
        } else if (strlen($_POST['lastname']) > 25) {
            $errors[] = "Le prénom doit contenir moins de 25 caractères";
        } else {
            $reservation->lastname = htmlspecialchars($_POST['lastname']);
        }

        // Vérification du prénom
        if (empty($_POST['firstname'])) {
            $errors[] = "Merci de renseigner un nom";
        } else if (strlen($_POST['firstname']) > 25) {
            $errors[] = "Le nom doit contenir moins de 25 caractères";
        } else {
            $reservation->firstname = htmlspecialchars($_POST['firstname']);
        }
        // Vérification du numéro de téléphone
        if (empty($_POST['phoneNumber'])) {
            $errors[] = "Merci de renseigner un numéro de téléphone";
        } else if (!preg_match($regexphoneNumber, $_POST['phoneNumber'])) {
            $errors[] = "Format de numéro de téléphoneNumber incorrect";
        } else {
            $reservation->phoneNumber = $_POST['phoneNumber'];
        }

        // Vérification de l'adresse email
        if (empty($_POST['email'])) {
            $errors[] = "Merci de renseigner une adresse email";
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Format d'adresse email incorrect";
        } else {
            $reservation->email = $_POST['email'];
        }

        // Vérification du nom du gîte
        if (empty($_POST['shelterName'])) {
            $errors[] = "Merci de renseigner un nom";
        } else if (strlen($_POST['shelterName']) > 10) {
            $errors[] = "Le nom doit contenir maximum 9 caractères";
        } else {
            $reservation->shelterName = htmlspecialchars($_POST['shelterName']);
        }

        // Vérification de la date d'arrivée
        if (empty($_POST['startDate'])) {
            $errors[] = "Merci de renseigner votre date d'arrivée";
        } else if (!validateDate($_POST['startDate'], 'Y-m-d')) {
            $errors[] = "Format de date incorrect";
        } else {
            $reservation->startDate = $_POST['startDate'];
        }

        // Vérification de la date de sortie
        if (empty($_POST['endDate'])) {
            $errors[] = "Merci de renseigner votre date de départ";
        } else if (!validateDate($_POST['endDate'], 'Y-m-d')) {
            $errors[] = "Format de date incorrect";
        } else {
            $reservation->endDate = $_POST['endDate'];
        }

        if (empty($errors)) {
            // Appel de la méthode d'insertion du reservation
            $reservation->updateOneReservation($id);
            $success = true;
            header('location: liste-reservation.php');
        }
    }
}

//suppression d'une reservation
if (isset($_POST['delete'])) {
    $id = $_POST['hidden'];
    if (isset($id)) {
        $reservation->id = $id;
        $reservation->deleteOneReservation($_GET['id']);
        header('location: liste-reservation.php');
    }
}
