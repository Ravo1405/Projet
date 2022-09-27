<?php
// Fonction pour  vérifier si la chaîne donnée est une date valide
function validateDate(string $date, string $format): bool
{
    $dateTime = DateTime::createFromFormat($format, $date);
    return $dateTime && $dateTime->format($format) == $date;
}

/** On affiche la date de début et la date de départ de la réservation en format européen
 * 
 * @return string startDate/endDate en format européen
 * @access public 
 * */
function displayDate(string $originalDate, string $formatEntree, string $formatSortie): string
{
    $newDate = DateTime::createFromFormat($formatEntree, $originalDate);
    return $newDate->format($formatSortie);
}
