<?php

require_once 'DbConnector.php';

/** Classe stockant les informations relatives à une réservation
 * 
 * Reservation est stockée dans la base de données de KantoLocation
 * pour les nominations futures.
 * 
 * @access public
 * */
class Reservation extends DbConnector
{

  public ?int $id;
  public ?string $lastname;
  public ?string $firstname;
  public ?string $phoneNumber;
  public ?string $email;
  public ?string $shelterName;
  public ?string $startDate;
  public ?string $endDate;

  /** Requête pour créer une nouvelle réservation dans la BDD
   * 
   * @access public 
   * */
  public function create(): void
  {
    $query = "INSERT INTO `reservation` (`lastname`, `firstname`,`phoneNumber`, `email`, `shelterName`, `startDate`, `endDate`) 
                  VALUES (:lastname, :firstname, :phoneNumber, :email, :shelterName, :startDate, :endDate)";
    // PDO prépare cette requête
    $stmt = $this->pdo->prepare($query);

    $stmt->bindParam(":firstname", $this->firstname, PDO::PARAM_STR);
    $stmt->bindParam(":lastname", $this->lastname, PDO::PARAM_STR);
    $stmt->bindParam(":phoneNumber", $this->phoneNumber, PDO::PARAM_STR);
    $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
    $stmt->bindParam(":shelterName", $this->shelterName, PDO::PARAM_STR);
    $stmt->bindParam(":startDate", $this->startDate, PDO::PARAM_STR);
    $stmt->bindParam(":endDate", $this->endDate, PDO::PARAM_STR);

    // et l'exécute
    $stmt->execute();
  }

  /** Requête pour vérifier si une réservation avec le même nom du gîte, la même date d'entrée et de sortie existe déjà
   * 
   * @return bool true si une autre réservation est trouvée, false sinon
   * @access public 
   * */
  public function exists(): bool
  {
    $query = "SELECT id FROM reservation WHERE shelterName = :shelterName AND startDate = :startDate AND endDate = :endDate";

    // PDO prépare cette requête
    $stmt = $this->pdo->prepare($query);

    $stmt->bindParam(":shelterName", $this->shelterName, PDO::PARAM_STR);
    $stmt->bindParam(":startDate", $this->startDate, PDO::PARAM_STR);
    $stmt->bindParam(":endDate", $this->endDate, PDO::PARAM_STR);

    // et l'exécute
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Reservation');
    $result = $stmt->fetch();

    if ($result == false) {
      return false;
    }
    return true;
  }

  /** Requête pour récupérer toutes les réservations existantes dans la base de       *données et les afficher
   * 
   * @return array tableau de reservations
   * @access public 
   * @static
   * */
  public function getReservationList(): array
  {
    $query = "SELECT * FROM `reservation`  ORDER BY `startDate` ASC";

    return $this->getQueryResult($query);
  }

  //fonction pour afficher une réservation et les informations de cette réservation
  public function getOneReservation(int $id): ?Reservation
  {
    $query = 'SELECT * FROM `reservation` WHERE `id` = :id ';
    $row = $this->pdo->prepare($query);
    $row->bindParam(':id', $id, PDO::PARAM_INT);
    $row->execute();
    $row->setFetchMode(PDO::FETCH_CLASS, 'Reservation');
    $result = $row->fetch();

    if ($result == false) {
      return null;
    }
    return $result;
  }

  //Fonction pour modifier les informations d'une reservation
  public function updateOneReservation(int $id)
  {
    $query = 'UPDATE `reservation` SET `lastname` = :lastname, `firstname` = :firstname, `phoneNumber` = :phoneNumber, `email` = :email, `shelterName` = :shelterName,  `startDate` = :startDate, `endDate` = :endDate   WHERE `id` = :id';
    $stmt = $this->pdo->prepare($query);
    $stmt->bindParam(':lastname', $this->lastname, PDO::PARAM_STR);
    $stmt->bindParam(':firstname', $this->firstname, PDO::PARAM_STR);
    $stmt->bindParam(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
    $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
    $stmt->bindParam(':shelterName', $this->shelterName, PDO::PARAM_STR);
    $stmt->bindParam(':startDate', $this->startDate, PDO::PARAM_STR);
    $stmt->bindParam(':endDate', $this->endDate, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    return $result;
  }

  /**
   * Méthode qui permet de supprimer une réservation.
   */
  public function deleteOneReservation(int $id): void
  { //Requête pour supprimer un RDV
    $query = 'DELETE FROM `reservation` 
    WHERE `id` = :id';
    $stmt = $this->pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
  }
}
