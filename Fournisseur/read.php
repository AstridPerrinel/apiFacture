<?php
// required header
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/fournisseur.php';
 
// instantiate database and fournisseur object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$fournisseur = new Fournisseur($db);
 
// query fournisseurs
$stmt = $fournisseur->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){
 
    // fournisseurs array
    $fournisseurs_arr=array();
    $fournisseurs_arr["Enregistrements"]=array();
    // retrieve our table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
 
        $fournisseur_item=array(
            "identifiant" => $idFournisseur,
            "Fournisseur" => $nomFournisseur,
            "Adresse"=>$adresseFournisseur,
        );
        
        array_push($fournisseurs_arr["Enregistrements"], $fournisseur_item);
        
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show fournisseurs data in json format
    echo json_encode($fournisseurs_arr);
}
else{
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no fournisseur found
    echo json_encode(
        array("message" => "Il n'y a pas de fournisseur trouvé")
    );


}
?>
