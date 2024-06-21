<?php
require_once 'Model.php';

class ModelResidence
{
    private $id, $label, $ville, $prix, $personne_id;

    // Constructor
    public function __construct($id = NULL, $label = NULL, $ville = NULL, $prix = NULL, $personne_id = NULL)
    {
        if (!is_null($id)) {
            $this->id = $id;
            $this->label = $label;
            $this->ville = $ville;
            $this->prix = $prix;
            $this->personne_id = $personne_id;
        }
    }

    // Setters
    function setId($id)
    {
        $this->id = $id;
    }
    function setLabel($label)
    {
        $this->label = $label;
    }
    function setVille($ville)
    {
        $this->ville = $ville;
    }
    function setPrix($prix)
    {
        $this->prix = $prix;
    }
    function setPersonneId($personne_id)
    {
        $this->personne_id = $personne_id;
    }

    // Getters
    function getId()
    {
        return $this->id;
    }
    function getLabel()
    {
        return $this->label;
    }
    function getVille()
    {
        return $this->ville;
    }
    function getPrix()
    {
        return $this->prix;
    }
    function getPersonneId()
    {
        return $this->personne_id;
    }

    // Récupère toutes les résidences ordonnées par prix
    public static function getAllOrderedByPrix()
    {
        try {
            $database = Model::getInstance();
            $query = "SELECT residence.id, residence.label, residence.ville, residence.prix, personne.nom, personne.prenom 
                      FROM residence 
                      JOIN personne ON residence.personne_id = personne.id 
                      ORDER BY residence.prix ASC";
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
              SELECT residence.label AS residence_label, residence.ville, residence.prix 
              FROM residence
              JOIN personne ON residence.personne_id = personne.id
              WHERE personne.login = :login";
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
    
    public static function getResidencesNotOwnedByUser($login) {
        try {
            $database = Model::getInstance();
            $query = "
              SELECT residence.id, residence.label, residence.ville
              FROM residence
              JOIN personne ON residence.personne_id = personne.id
              WHERE personne.login != :login";
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

    public static function getOwnerLogin($id) {
        try {
            $database = Model::getInstance();
            $query = "
              SELECT personne.login
              FROM residence
              JOIN personne ON residence.personne_id = personne.id
              WHERE residence.id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
            ]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results[0];
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getInfoById($id) {
        try {
            $database = Model::getInstance();
            $query = "
              SELECT residence.label, residence.prix
              FROM residence
              WHERE residence.id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
            ]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results[0];
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function achat($residenceId, $compteAcheteurId, $compteVendeurId, $prix) {
        try {
            $database = Model::getInstance();
      
            // ------ Début de la transaction ------
            $database->beginTransaction();
      
            // --- On retire le prix de la résidence au solde du compte de l'acheteur ---
            // On récupère le montant de départ du compte de l'acheteur
            $query = "SELECT montant FROM compte WHERE id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
              'id' => $compteAcheteurId,
            ]);
            $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
            $montantDepart = $results[0];
            // On calcule le montant d'arrivée du compte de l'acheteur
            $montantArrivee = $montantDepart - abs($prix);
            // On met à jour le montant du compte de l'acheteur
            $query = "UPDATE compte SET montant = :montant WHERE id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
              'montant' => $montantArrivee,
              'id' => $compteAcheteurId,
            ]);
      
            // --- On ajoute le prix de la résidence au solde du compte du vendeur ---
            // On récupère le montant de départ du compte du vendeur
            $query = "SELECT montant FROM compte WHERE id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
              'id' => $compteVendeurId,
            ]);
            $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
            $montantDepart = $results[0];
            // On calcule le montant d'arrivée du compte du vendeur
            $montantArrivee = $montantDepart + abs($prix);
            // On met à jour le montant du compte du vendeur
            $query = "UPDATE compte SET montant = :montant WHERE id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
              'montant' => $montantArrivee,
              'id' => $compteVendeurId,
            ]);
      
            // --- On transfère la résidence du vendeur à l'acheteur ---
            // On récupère l'id de l'acheteur à partir de l'id de son compte
            $query = "SELECT personne_id FROM compte WHERE id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $compteAcheteurId
            ]);
            $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
            $acheteurId = $results[0];
            // On met à jour le propriétaire de la résidence
            $query = "UPDATE residence SET personne_id = :personne_id WHERE id = :residence_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'personne_id' => $acheteurId,
                'residence_id' => $residenceId,
            ]);

            // ------ Fin de la transaction ------
            $database->commit();
      
            return [$residenceId, $compteAcheteurId, $compteVendeurId]; // Retourne l'id de la résidence et les id des comptes concernés par la transaction
          } catch (PDOException $e) {
            $database->rollback();
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL; // Retourne NULL en cas d'erreur
          }
    }
}
