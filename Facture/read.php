<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/facture.php';
 
// instantiate database and facture object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$facture = new Facture($db);
 
// query factures
$stmt = $facture->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){
 
    // factures array
    $factures_arr=array();
    $factures_arr["Enregistrements"]=array();
 
  
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
       
        extract($row);
 
        $facture_item=array(
            "Facture n°" => $idFact,
            "Date de la facture" => $dateFact,
            "Identifiant du fournisseur" => $idFournisseur
    
        );
 
        array_push($factures_arr["Enregistrements"], $facture_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show Facture data in json format
    echo json_encode($factures_arr);
    
}
 
// no Factures found will be here
else{
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no Factures found
    echo json_encode(
        array("message" => "Pas de factures trouvé.")
    );
}