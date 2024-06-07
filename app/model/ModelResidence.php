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
    function setId($id) { $this->id = $id; }
    function setLabel($label) { $this->label = $label; }
    function setVille($ville) { $this->ville = $ville; }
    function setPrix($prix) { $this->prix = $prix; }
    function setPersonneId($personne_id) { $this->personne_id = $personne_id; }

    // Getters
    function getId() { return $this->id; }
    function getLabel() { return $this->label; }
    function getVille() { return $this->ville; }
    function getPrix() { return $this->prix; }
    function getPersonneId() { return $this->personne_id; }

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
}
?>
