<?php
class Facture{
 
    // database connection and table name
    private $conn;
    private $table_name = "factures";
 
    // object properties
    public $idFact;
    public $dateFact;
    public $idFournisseur;
    
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // read factures
function read(){
 
    // select all query
    $query = "SELECT
                f.idFact, f.dateFact, f.idFournisseur
            FROM
                $this->table_name f
                LEFT JOIN
                    fournisseurs fo
                        ON f.idFournisseur = fo.idFournisseur";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
    }

    // Création de la facture
    function create(){
 
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                dateFact=:dateFact, idFournisseur=:idFournisseur";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->dateFact=htmlspecialchars(strip_tags($this->dateFact));
    $this->idFournisseur=htmlspecialchars(strip_tags($this->idFournisseur));
 
    // bind values
    $stmt->bindParam(":dateFact", $this->dateFact);
    $stmt->bindParam(":idFournisseur", $this->idFournisseur);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
    }
    // used when filling up the update facture form
    function readOne(){
 
    // query to read single record
    $query = "SELECT
                f.idFact, f.dateFact, f.idFournisseur
            FROM
                " . $this->table_name . " f
                LEFT JOIN
                    fournisseurs fo
                        ON f.idFournisseur = fo.idFournisseur
            WHERE
                f.idFact = ?
            LIMIT
                0,1";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind idFact de la facture to be updated
    $stmt->bindParam(1, $this->idFact);
 
    // execute query
    $stmt->execute();
 
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // set values to object properties
    $this->dateFact = $row['dateFact'];
    $this->idFournisseur = $row['idFournisseur'];
    }

    // update the facture
    function update(){
 
        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    dateFact = :dateFact,
                    idFournisseur = :idFournisseur
                WHERE
                    idFact = :idFact";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->dateFact=htmlspecialchars(strip_tags($this->dateFact));
        $this->idFournisseur=htmlspecialchars(strip_tags($this->idFournisseur));
        $this->idFact=htmlspecialchars(strip_tags($this->idFact));
    
        // bind new values
        $stmt->bindParam(':dateFact', $this->dateFact);
        $stmt->bindParam(':idFournisseur', $this->idFournisseur);
        $stmt->bindParam(':idFact', $this->idFact);
    
        $stmt->execute();

        if($stmt->rowCount()) {
            return true;
        }

        return false;

        // execute the query
        //if($stmt->execute()){
        //    return true;
        //}
        //
        //return false;
    }


    // delete facture
    function delete(){
 
    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE idFact = ?";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->idFact=htmlspecialchars(strip_tags($this->idFact));
 
    // bind id of record to delete
    $stmt->bindParam(1, $this->idFact);
 
    // execute query
    $stmt->execute();

        if($stmt->rowCount()) {
            return true;
        }

        return false;
}

// search products
function search($keywords){
 
    // select all query
    $query = "SELECT
                f.idFact, f.dateFact, f.idFournisseur
            FROM
                " . $this->table_name . " f
                LEFT JOIN
                    fournisseurs fo
                        ON f.idFournisseur = fo.idFournisseur
                        WHERE
                fo.nomFournisseur = ?";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $keywords=htmlspecialchars(strip_tags($keywords));

    // bind
    $stmt->bindParam(1, $keywords);
    
    // execute query
    $stmt->execute();
 
    return $stmt;
}
}