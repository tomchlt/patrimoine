<?php
require_once 'Model.php';

class ModelRecolte {
    private $producteur_id, $vin_id, $quantite;
    
    public function __construct($producteur_id = NULL, $vin_id = NULL, $quantite = NULL) {
        if (!is_null($producteur_id) && !is_null($vin_id)) {
            $this->producteur_id = $producteur_id;
            $this->vin_id = $vin_id;
            $this->quantite = $quantite;
        }
    }
    
    public function getProducteur_id() {
        return $this->producteur_id;
    }
    
    public function getVin_id() {
        return $this->vin_id;
    }
    
    public function getQuantite() {
        return $this->quantite;
    }
    
    public function setProducteur_id($producteur_id) {
        $this->producteur_id = $producteur_id;
    }
    
    public function setVin_id($vin_id) {
        $this->vin_id = $vin_id;
    }
    
    public function setQuantite($quantite) {
        $this->quantite = $quantite;
    }
    
    public static function getAll() {
        try {
            $database = Model::getInstance();
            // requête 1
            $query = "select region, cru, annee, degre, nom, prenom, quantite from vin, producteur, recolte where recolte.vin_id = vin.id and recolte.producteur_id = producteur.id order by region";
            $statement = $database->prepare($query);
            $statement->execute();
            $nbColumns = $statement->columnCount();
            for ($i=0; $i<$nbColumns; $i++) {
                $cols[$i] = $statement->getColumnMeta($i)['name'];
            }
            $datas = $statement->fetchAll();
            $results = array($cols, $datas);
            // requête 2
            $query = "select vin.id, producteur.id, region, cru, nom, prenom, quantite from vin, producteur, recolte where recolte.vin_id = vin.id and recolte.producteur_id = producteur.id order by vin.id, producteur_id";
            $statement = $database->prepare($query);
            $statement->execute();
            $nbColumns = $statement->columnCount();
            for ($i=0; $i<$nbColumns; $i++) {
                $cols[$i] = $statement->getColumnMeta($i)['name'];
            }
            $datas = $statement->fetchAll();
            array_push($results, $cols, $datas);
            
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    public static function getAllId() {
        try {
            $database = Model::getInstance();
            $query = "select * from vin";
            $statement = $database->prepare($query);
            $statement->execute();
            $vins = $statement->fetchAll(PDO::FETCH_CLASS, "ModelVin");
            
            $query = "select * from producteur";
            $statement = $database->prepare($query);
            $statement->execute();
            $producteurs = $statement->fetchAll(PDO::FETCH_CLASS, "ModelProducteur");
            
            return array($vins, $producteurs);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    public static function doesRecolteExist($vin_id, $producteur_id) {
        try {
            $database = Model::getInstance();
            $query = "select * from recolte where vin_id = :vin_id and producteur_id = :producteur_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'vin_id' => $vin_id,
                'producteur_id' => $producteur_id,
            ]);
            $results = $statement->fetchAll();
            // On vérifie si la requête a renvoyé un résultat non vide
            print_r($results);
            if (empty($results)) {
                return 0;
            } else {
                return 1;
            }
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
    
    public static function update($vin_id, $producteur_id, $quantite) {
        try {
            $database = Model::getInstance();
            $query = "update recolte set quantite = :quantite where vin_id = :vin_id and producteur_id = :producteur_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'vin_id' => $vin_id,
                'producteur_id' => $producteur_id,
                'quantite' => $quantite,
            ]);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        }
    }
    
    public static function insert($vin_id, $producteur_id, $quantite) {
        try {
            $database = Model::getInstance();
            $query = "insert into recolte value (:vin_id, :producteur_id, :quantite)";
            $statement = $database->prepare($query);
            $statement->execute([
                'vin_id' => $vin_id,
                'producteur_id' => $producteur_id,
                'quantite' => $quantite,
            ]);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        }
    }
}
