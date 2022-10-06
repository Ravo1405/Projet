<?php
require_once './utils.php';

require_once './models/SatisfactionRating.php';

require_once './models/Reservation.php';

$errors = [];
$success = false;
$satisfactionRating = new SatisfactionRating();
$reservation = new Reservation;

$lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : "";
$valu = isset($_POST["valu"]) ? $_POST["valu"] : "";
$bad = "";
$poor = "";
$ok = "";
$good = "";
$excellent = "";

// Vérification du nom de famille
if(empty($_POST['lastname'])) {
    $errors[] = "Merci de renseigner un nom";
}
else if(strlen($_POST['lastname']) > 25) {
    $errors[] = "Le prénom doit contenir moins de 25 caractères";
}
else {
    $satisfactionRating->lastname = htmlspecialchars($_POST['lastname']);
}
// Vérification de l'adresse email
if(empty($_POST['email'])) {
    $errors[] = "Merci de renseigner une adresse email";
}
else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Format d'adresse email incorrect";
}
else {
    $satisfactionRating->email = $_POST['email'];
}

// Si la première étoile est cliquée, on affiche 1 étoile
if(isset($_POST['bad'])) {
    $bad = $_POST['bad'];
}
    
// Si la deuxième étoile est cliquée, on affiche 2 étoiles
if(isset($_POST['poor'])) {
    for ($i = 1; $poor < 3; $i++);
}
// Si la troisième étoile est cliquée, on affiche 3 étoile
// Si la quatrième étoile est cliquée, on affiche 4 étoile
// Si la cinquème étoile est cliquée, on affiche 5 étoile


$vote = $satisfactionRating->getVote();

    
    
    
    
    
    
     
     // Vérification du commentaire
     if(empty($_POST['comment'])) {
        $errors[] = "Merci de saisir un commentaire";
    }
    else {
        $costumerReview->comment = htmlspecialchars($_POST['comment']);
    }

     // Le reservation existe-t-il déjà ?
     if($costumerReview->isReservationExist()) {
        $costumerReview->idReservation =  $costumerReview->getReservation();
    } else {
        $errors[] = "Vous pouvez mettre des commentaires après avoir réserver chez nous";
    }
    // Le costumerReview existe-t-il déjà ?
    if($costumerReview->isCommentExist()) {
        $errors[] = "Réservation non disponible, veuillez choisir une autre date";
    }
    if(empty($errors)) {
        // Appel de la méthode d'insertion du commentaire
        $costumerReview->createComment();
        $success = true;
        var_dump($costumerReview);
    }
    var_dump($errors);
    var_dump($_POST);
}

// On appelle la méthode getReservationList pour afficher la liste des commentaires

$vote = $satisfactionRating->getVote();

// //On appelle la méthode deleteComment pour supprimer un commentaire
// if (isset($_POST['delete'])) {
//     $id = $_POST['hidden'];
//     if (isset($id)) {
//         $costumerReview->id = $id;
//         $costumerReview->deleteComment($_GET['id']);
//         header('location: liste-reservation.php');
//     }
// }
