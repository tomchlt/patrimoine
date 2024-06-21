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

  public static function getAllByLogin($login) {
    try {
      $database = Model::getInstance();
      $query = "
        SELECT compte.id AS compte_id, compte.label, compte.montant FROM compte
        JOIN 
            personne ON personne.id = personne_id
        WHERE 
            personne.login = :login";
      $statement = $database->prepare($query);
      $statement->execute([
        'login' => $login,
      ]);
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

  public static function insert($label, $montant, $banque_id, $personne_id)
  {
      try {
          $database = Model::getInstance();
  
          // Recherche de la valeur de la clé = max(id) + 1
          $query = "SELECT MAX(id) FROM compte";
          $statement = $database->query($query);
          $id = $statement->fetchColumn();
          $id++;
  
          // Ajout d'un nouveau tuple
          $query = "INSERT INTO compte (id, label, montant, banque_id, personne_id) VALUES (:id, :label, :montant, :banque_id, :personne_id)";
          $statement = $database->prepare($query);
          $statement->bindParam(':id', $id);
          $statement->bindParam(':label', $label);
          $statement->bindParam(':montant', $montant);
          $statement->bindParam(':banque_id', $banque_id);
          $statement->bindParam(':personne_id', $personne_id);
          $statement->execute();
  
          return $id; // Retourne l'identifiant du nouveau compte
      } catch (PDOException $e) {
          printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
          return NULL; // Retourne NULL en cas d'erreur
      }
  }

  public static function transfer($compteDebiteId, $compteCrediteId, $montantTransfere) {
    try {
      $database = Model::getInstance();

      // Début de la transaction
      $database->beginTransaction();

      // On récupère le montant de départ du compte débité
      $query = "SELECT montant FROM compte WHERE id = :id";
      $statement = $database->prepare($query);
      $statement->execute([
        'id' => $compteDebiteId,
      ]);
      $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
      $montantDepart = $results[0];
      // On calcule le montant d'arrivée du compte débité
      $montantArrivee = $montantDepart - abs($montantTransfere);
      // On met à jour le montant du compte débité
      $query = "UPDATE compte SET montant = :montant WHERE id = :id";
      $statement = $database->prepare($query);
      $statement->execute([
        'montant' => $montantArrivee,
        'id' => $compteDebiteId,
      ]);

      // On récupère le montant de départ du compte crédité
      $query = "SELECT montant FROM compte WHERE id = :id";
      $statement = $database->prepare($query);
      $statement->execute([
        'id' => $compteCrediteId,
      ]);
      $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
      $montantDepart = $results[0];
      // On calcule le montant d'arrivée du compte crédité
      $montantArrivee = $montantDepart + abs($montantTransfere);
      // On met à jour le montant du compte crédité
      $query = "UPDATE compte SET montant = :montant WHERE id = :id";
      $statement = $database->prepare($query);
      $statement->execute([
        'montant' => $montantArrivee,
        'id' => $compteCrediteId,
      ]);

      // Fin de la transaction
      $database->commit();

      return [$compteDebiteId, $compteCrediteId]; // Retourne les id des comptes concernés par la transaction
    } catch (PDOException $e) {
      $database->rollback();
      printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      return NULL; // Retourne NULL en cas d'erreur
    }
  }
}
