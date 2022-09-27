<?php 

require_once 'models/Reservation.php';

require_once 'utils.php';

$errors = [];
$reservation = new Reservation;

$id = htmlspecialchars($_GET['id']);

if(!isset($_GET['id'])) {
    $errors[] = "L'id de la réservation n'est pas renseigné";
}
else if(!is_numeric($_GET['id'])) {
    $errors[] = "L'id de la réservation doit être un entier numérique";
}
else {
    $oneReservation = $reservation->getOneReservation($_GET['id']);

    if($oneReservation == null) {
        $errors[] = "Aucun réservation avec l'id " . $_GET['id'] . " n'a été trouvé";
    }
}

//Modification d'une réservation
if (isset($_POST['update'])) {
    if (!empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['birthdate']) && !empty($_POST['phone']) && !empty($_POST['mail'])) {
        if ($id) {
            $id = htmlspecialchars($_GET['id']);
            $reservation->id = $_GET['id'];
            $reservation->lastname = htmlspecialchars($_POST['lastname']);
            $reservation->firstname = htmlspecialchars($_POST['firstname']);
            $reservation->phoneNumber = htmlspecialchars($_POST['phoneNumber']);
            $reservation->email = htmlspecialchars($_POST['email']);
            $reservation->shelterName = htmlspecialchars($_POST['shelterName']);
            $reservation->startDate = htmlspecialchars($_POST['startDate']);
            $reservation->endDate = htmlspecialchars($_POST['endDate']);

            $reservationProfil = $reservation->updateOneReservation($_GET['id']);
            $reservationProfil = $reservation->getOneReservation($_GET['id']);

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





