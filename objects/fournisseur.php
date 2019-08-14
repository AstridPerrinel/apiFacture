<?php
class Fournisseur{
 
    // database connection and table name
    private $conn;
    private $table_name = "fournisseurs";
 
    // object properties
    public $idFournisseur;
    public $nomFournisseur;
    public $adresseFournisseur;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // used by select drop-down list
    public function readAll(){
        //select all data
        $query = "SELECT
                    idFournisseur, nomFournisseur, adresseFournisseur
                FROM
                    " . $this->table_name . "
                ORDER BY
                    nomFournisseur";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }

    // used by select drop-down list
public function read(){
 
    //select all data
    $query = "SELECT
                idFournisseur, nomFournisseur, adresseFournisseur
            FROM
                " . $this->table_name . "
            ORDER BY
                nomFournisseur";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    return $stmt;
}
}
?>
