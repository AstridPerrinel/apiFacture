<?php
session_start();
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/facture.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare facture object
$facture = new Facture($db);
 
// get id of facture to be edited
//$data = json_decode(file_get_contents("php://input"));
 
// set ID property of facture to be edited
$facture->idFact = $data->idFact;
 
// set facture property values
$facture->idFact = $_POST['idFact'];
$facture->dateFact = $_POST['dateFact'];
$facture->idFournisseur = $_POST['idFournisseur'];
 
// update the facture

try {
    if($facture->update()) {
        // set response code - 200 ok
        //http_response_code(200);
        
        // tell the user
        //echo json_encode(array("message" => "facture a ete modifie"));
        $code = 200;
        $data = "La facture a ete modifie.";
    } else {
        //http_response_code(404);

        //echo json_encode(array("message" => "facture non trouvée"));
        $code = 404;
        $data = "facture non trouvée";
    }
 
 }
 
// if unable to update the facture, tell the user
catch (PDOException $e) {
 
    // set response code - 503 service unavailable
    //http_response_code(503);
 
    // tell the user
    //echo json_encode(array("message" => "Il n'a pas ete possible de modifier la facture."));
    $code = 503;
    $data = "il n a pas ete possible de modifier la facture";
}

$_SESSION["update"]=$data;
$_SESSION["code"]=$code;
header("Location: http://localhost/apiFacture/facture/resultatUpdate.php");
exit();
?>