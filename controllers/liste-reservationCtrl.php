<?php
require_once 'models/Reservation.php';

require_once 'utils.php';

$reservation = new Reservation;
$errors = [];
$reservationList = $reservation->getReservationList();


