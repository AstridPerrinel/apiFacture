<?php
session_start();
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/facture.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare facture object
$facture = new Facture($db);
 
// set ID property of record to read
$facture->idFact = isset($_GET['idFact']) ? $_GET['idFact'] : die();
 
// read the details of facture to be edited
$facture->readOne();
 
if($facture->dateFact!=null){
    // create array
    $facture_arr["Enregistrements"]=array();
    $facture_item = array(
        "identifiant" =>  $facture->idFact,
        "Date" => $facture->dateFact,
        "Fournisseur" => $facture->idFournisseur
 
    );
    array_push($facture_arr["Enregistrements"], $facture_item);
    // set response code - 200 OK

    // make it json format
    //echo json_encode($facture_arr);

    $code = 200;
    $data = $facture_arr;
}
 
else{
    // set response code - 404 Not found
    $code = 404;
    $data = array("message" => "La facture n'existe pas");

}

http_response_code($code);
$_SESSION["facture"]=json_encode($data);
header("Location: http://localhost/apiFacture/facture/affichageRO.php");
exit();
?>
