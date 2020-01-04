<?php
session_start();

$code = $_SESSION["code"];

http_response_code($code);
?>
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

<br>
</header>

<section>


<?php
    $data = $_SESSION["create"];
    echo $data;
?>

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
