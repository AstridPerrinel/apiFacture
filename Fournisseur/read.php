<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" media="screen" type="text/css" href="css/style.css"/>
    
    <title>Les fournisseurs</title>
    <h1>Voici l'ensemble des fournisseurs</h1>
</head>
<body>
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
 
    // products array
    $fournisseurs_arr=array();
    $fournisseurs_arr["Enregistrements"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $fournisseur_item=array(
            "Identifiant du Fournisseur" => $idFournisseur,
            "Nom du fournisseur" => $nomFournisseur,
            "Adresse du fournisseur" =>$adresseFournisseur
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
 
    // tell the user no categories found
    echo json_encode(
        array("message" => "No categories found.")
    );


}
?>
</body>
</html>