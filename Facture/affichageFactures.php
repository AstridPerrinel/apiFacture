<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>

    <title>Factures</title>

</head>
<body>
<header>
<img class="logo" src="../image/logoSermeta.jpg"> 
<h1>Voici l'ensemble des factures</h1>
<br>
</header>

<section>


<?php
    session_start();
    $json=file_get_contents("http://localhost/apiFacture/Facture/read.php");
    $data =  json_decode($json);

    if (count($data->Enregistrements)) {
        // Open the table
        echo "<table>";
        
        echo "<tr>";
        echo "<th>Identifiant</th>";
        echo "<th>Date</th>";
        echo "<th>Fournisseur</th>";
        echo "</tr>";
        // Cycle through the array
        foreach ($data->Enregistrements as $idx => $Enregistrements) {

            // Output a row
            echo "<tr>";
            echo "<td>$Enregistrements->identifiant</td>";
            echo "<td>$Enregistrements->Date</td>";
            echo "<td>$Enregistrements->Fournisseur</td>";
            echo "</tr>";
        }

        // Close the table
        echo "</table>";
    }
?>
<br>
<div class="bouttons">
<a href="http://localhost/apiFacture/facture/rechercheFacture.php">
<button class="button"
        type="button">Rechercher Une Facture</button></a>

<a href="http://localhost/apiFacture/facture/affichageFormCreate.php">
<button class="button"
        type="button">Créer une facture</button></a>

<a href="http://localhost/apiFacture/facture/affichageFormUpdate.php">
<button class="button"
        type="button">Modifier une facture</button></a>

<a href="http://localhost/apiFacture/facture/affichageFormDelete.php">
<button class="button"
        type="button">Supprimer une facture</button></a>

<a href="http://127.0.0.1/apiFacture/accueil.php">
<button class="button"
        type="button">
    Retourner à l'accueil</button></a>
</div>
</section>

<footer>
    <p> © 2019 Copyright Perrinel Astrid - Outil de gestion de facture</p>
</footer>
</body>
</html>
