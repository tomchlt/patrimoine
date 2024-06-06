<?php
require_once 'Model.php';

class ModelCompte {
  private $id, $label, $montant, $banque_id, $personne_id;

  // Constructeur
  public function __construct($id = NULL, $label = NULL, $montant = NULL, $banque_id = NULL, $personne_id = NULL) {
    if (!is_null($id)) {
      $this->id = $id;
      $this->label = $label;
      $this->montant = $montant;
      $this->banque_id = $banque_id;
      $this->personne_id = $personne_id;
    }
  }

  // Getters
  function getId() {
    return $this->id;
  }

  function getLabel() {
    return $this->label;
  }

  function getMontant() {
    return $this->montant;
  }

  function getBanqueId() {
    return $this->banque_id;
  }

  function getPersonneId() {
    return $this->personne_id;
  }

  // Setters
  function setId($id) {
    $this->id = $id;
  }

  function setLabel($label) {
    $this->label = $label;
  }

  function setMontant($montant) {
    $this->montant = $montant;
  }

  function setBanqueId($banque_id) {
    $this->banque_id = $banque_id;
  }

  function setPersonneId($personne_id) {
    $this->personne_id = $personne_id;
  }

  // Méthode pour récupérer les comptes par banque
  public static function getByBanque($banque_id)
    {
        try {
            $database = Model::getInstance();
            $query = "SELECT * FROM compte WHERE banque_id = :banque_id";
            $statement = $database->prepare($query);
            $statement->bindParam(':banque_id', $banque_id);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCompte");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

}
?>
