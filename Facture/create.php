<?php
session_start();
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
 
// instantiate facture object
include_once '../objects/facture.php';
 
$database = new Database();
$db = $database->getConnection();
 
$facture = new Facture($db);
 
// get posted data
//$data = json_decode(file_get_contents("php://input")); //si besoin pour Postman
$data = new stdClass();
$data->dateFact=$_POST['dateFact'];
$data->idFournisseur=$_POST['idFournisseur'];

// make sure data is not empty
if(

    !empty($data->dateFact) &&
    !empty($data->idFournisseur)
    
)
{
 
    // set facture property values
    $facture->dateFact = $data->dateFact;
    $facture->idFournisseur = $data->idFournisseur;
    
 
    // creer la facture
    if($facture->create()){
 
        // set response code - 201 created
        //http_response_code(201);
        
        // tell the user
        //echo json_encode(array("message" => "La facture a ete cree")); //Pour postman
       $code = 201;
       $data = "La facture a ete cree";
    }
 
    // if unable to create the product, tell the user
    else{
 
        // set response code - 503 service unavailable
        //http_response_code(503);
 
        // tell the user
        //echo json_encode(array("message" => "Nous n'avons pas réussi à créer la facture"));
        $code = 503;
        $data = "Nous n'avons pas réussi à créer la facture";
    }
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    //http_response_code(400);
 
    // tell the user
    //echo json_encode(array("message" => "Nous ne pouvons créer la facture car il manque des données"));
    $code = 400;
    $data = "Nous ne pouvons créer la facture car il manque des données";
}

$_SESSION["create"]=$data;
$_SESSION["code"]=$code;
header("Location: http://localhost/apiFacture/facture/resultatCreate.php");
exit();

?>