<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object file
include_once '../config/database.php';
include_once '../objects/facture.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare facture object
$facture = new Facture($db);
 
// get facture id
$data = json_decode(file_get_contents("php://input"));
 
// set facture id to be deleted
$facture->idFact = $data->idFact;

try {
// delete the facture
    if($facture->delete()){
 
    // set response code - 200 ok
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("message" => "La facture a ete supprime."));
    }
    else {
        http_response_code(404);

        echo json_encode(array("message" => "facture non trouvée"));
    }
}
 
// if unable to delete the facture
catch (PDOException $e){
 
    // set response code - 503 service unavailable
    http_response_code(503);
 
    // tell the user
    echo json_encode(array("message" => "il n a pas ete possible de supprimer la facture"));
}
?>