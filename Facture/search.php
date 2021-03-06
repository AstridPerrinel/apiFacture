<?php
session_start();
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
 
// get keywords
$keywords=isset($_GET["s"]) ? $_GET["s"] : "";
 
// query factures
$stmt = $facture->search($keywords);

 
// check if more than 0 record found

 
    // factures array
    $factures_arr=array();
    $factures_arr["Enregistrements"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
 
        $facture_item=array(
            "identifiant" => $idFact,
            "Date" => $dateFact,
            "Fournisseur" => $idFournisseur
        );
 
        array_push($factures_arr["Enregistrements"], $facture_item);
    }
 if (count($factures_arr["Enregistrements"])>0){
    // set response code - 200 OK
    http_response_code(200);
    //echo json_encode($factures_arr);
    $_SESSION["fournisseur"]=json_encode($factures_arr);
    header("Location: http://localhost/apiFacture/facture/affichageS.php");
    exit();
    // show factures data
    //echo json_encode($factures_arr);

}
 else{

    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no factures found
    echo json_encode(
        array("message" => "pas de facture trouvé.")
    );
 }
?>