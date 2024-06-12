<?php
require_once 'Model.php';

class ModelCompte
{
  private $id;
  private $label;
  private $montant;
  private $banque_id;
  private $banque_nom;
  private $personne_id;
  private $personne_nom;
  private $personne_prenom;

  // Constructeur
  public function __construct($id = NULL, $label = NULL, $montant = NULL, $banque_id = NULL, $personne_id = NULL)
  {
    if (!is_null($id)) {
      $this->id = $id;
      $this->label = $label;
      $this->montant = $montant;
      $this->banque_id = $banque_id;
      $this->personne_id = $personne_id;
    }
  }

  // Getters
  public function getId()
  {
    return $this->id;
  }

  public function getLabel()
  {
    return $this->label;
  }

  public function getMontant()
  {
    return $this->montant;
  }

  public function getBanqueId()
  {
    return $this->banque_id;
  }

  public function getPersonneId()
  {
    return $this->personne_id;
  }

  public function getBanqueNom()
  {
    return $this->banque_nom;
  }

  public function getPersonneNom()
  {
    return $this->personne_nom;
  }

  public function getPersonnePrenom()
  {
    return $this->personne_prenom;
  }

  // Méthode pour récupérer les comptes par banque
  public static function getByBanque($banque_id)
  {
    try {
      $database = Model::getInstance();
      // Requête SQL avec jointures
      $query = "
        SELECT 
            compte.id AS id, 
            compte.label AS label, 
            compte.montant AS montant, 
            compte.banque_id AS banque_id, 
            compte.personne_id AS personne_id, 
            personne.nom AS personne_nom, 
            personne.prenom AS personne_prenom, 
            banque.label AS banque_nom
        FROM 
            compte
        JOIN 
            personne ON compte.personne_id = personne.id
        JOIN 
            banque ON compte.banque_id = banque.id
        WHERE 
            compte.banque_id = :banque_id";
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

  public static function getAll()
  {
    try {
      $database = Model::getInstance();
      $query = "select * from compte";
      $statement = $database->prepare($query);
      $statement->execute();
      $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCompte");
      return $results;
    } catch (PDOException $e) {
      printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      return NULL;
    }
  }

  public static function getAllWithDetails()
  {
    try {
      $database = Model::getInstance();
      $query = "SELECT compte.label AS compte_label, compte.montant, personne.nom, personne.prenom, banque.label AS banque_label, banque.pays 
                  FROM compte 
                  JOIN personne ON compte.personne_id = personne.id 
                  JOIN banque ON compte.banque_id = banque.id";
      $statement = $database->prepare($query);
      $statement->execute();
      $results = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $results;
    } catch (PDOException $e) {
      printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      return NULL;
    }
  }

  public static function getByLogin($login)
  {
    try {
      $database = Model::getInstance();
      $query = "
        SELECT compte.label AS compte_label, compte.montant, banque.label AS banque_nom FROM personne
        JOIN 
            compte ON compte.personne_id = personne.id
        JOIN 
            banque ON compte.banque_id = banque.id
        WHERE 
            personne.login = :login";
      $statement = $database->prepare($query);
      $statement->bindParam(':login', $login);
      $statement->execute();
      $results = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $results;
    } catch (PDOException $e) {
      printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      return NULL;
    }
  }

}