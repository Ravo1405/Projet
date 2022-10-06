<?php

require_once 'DbConnector.php';

/** Classe stockant les informations relatives à une commentaire
 * 
 * @access public
 * */
class CostumerReview extends DbConnector
{

  public ?int $id;
  public ?string $lastname;
  public ?string $email;
  public ?string $comment;
  public ?string $datePost;
  public ?string $idReservation;
  
  /** Méthode pour stocker un nouveau commentaire dans la BDD
   * 
   * @access public 
   * */
  public function createComment()
  {
    $query = "INSERT INTO `costumerReview` (`lastname`, `email`, `comment`, `datePost`, `idReservation`) 
              VALUES (:lastname, :email, :comment, :datePost,  :idReservation)";
    // PDO prépare cette requête
    $stmt = $this->pdo->prepare($query);

    $stmt->bindParam(":lastname", $this->lastname, PDO::PARAM_STR);
    $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
    $stmt->bindParam(":comment", $this->comment, PDO::PARAM_STR);
    $stmt->bindParam(":datePost", $this->datePost, PDO::PARAM_STR);
    $stmt->bindParam(":idReservation", $this->idReservation, PDO::PARAM_STR);

    // et l'exécute
    $stmt->execute();
  }

  // Méthode pour vérifier si la réservation existe
  public function isReservationExist() : bool
  {
    $query = "SELECT `id` FROM `reservation` WHERE `lastname` = :lastname AND `email` = :email ";
    $stmt = $this->pdo->prepare($query);
    $stmt->bindParam(':lastname', $this->lastname, PDO::PARAM_STR);
    $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Reservation');
    $result = $stmt->fetch();

    if ($result == false) {
      return false;
    }
    return true;
  }

  // On récupère cette réservation par son id
   public function getReservation() 
   {
     $query = "SELECT `id` FROM `reservation` WHERE `lastname` = :lastname AND `email` = :email";
     $stmt = $this->pdo->prepare($query);
     $stmt->bindParam(':lastname', $this->lastname, PDO::PARAM_STR);
     $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
     $stmt->execute();
     $stmt->setFetchMode(PDO::FETCH_CLASS, 'Reservation');
     $result = $stmt->fetch(); 
     return $result->id;   
   }

//  Méthode pour vérifier si un commentaire existe déjà 
    public function isCommentExist()
    {
        $query = 'SELECT COUNT(*) AS `number` FROM `costumerReview` WHERE `comment` = :comment AND `idReservation` = :idReservation';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':comment', $this->comment, PDO::PARAM_STR);
        $stmt->bindParam(':idReservation', $this->idReservation, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'CostumerReview');
     $result = $stmt->fetch(); 
        return $result->number;
    }

    /**
     * Méthode qui permet de récupérer la liste des commentaires.
     * @return array
     */
    public function getCommentsList(): array
    {
        /**
         * Création de la requête SQL
         */
        $query = 'SELECT `costumerReview`.`lastname` AS `lastname`, `datePost`, `comment` FROM `costumerReview` 
        INNER JOIN `reservation` ON `reservation`.`id` = `costumerReview`.`idReservation`';
        return $this->getQueryResult($query);
    }

  /**
   * Méthode qui permet de supprimer un commentaire
   */
  // public function deleteComment(int $id): void
  // { //Requête pour supprimer un commentaire
  //   $query = 'DELETE FROM `costumerReview` 
  //   WHERE `id` = :id';
  //   $stmt = $this->pdo->prepare($query);
  //   $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  //   $stmt->execute();
  // }
}
