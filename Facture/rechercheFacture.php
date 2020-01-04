<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>

    <title>Rechercher une Facture</title>

</head>
<body>
<header>
<img class="logo" src="../image/logoSermeta.jpg"> 
<h1>Formulaire de recherche de Facture</h1>
<br>
</header>

<section>
<p> Cette section permet de rechercher une facture grâce a l'identifiant de la facture.</p>
<p> Vous pouvez aussi rechercher toute les factures d'un fournisseur</p>
<br>

<form 
method="get"
action="http://localhost/apiFacture/facture/read_one.php">
    <div>
        <label for="idFact">Identifiant de la facture :</label>
        <input type="text" id="idFact" name="idFact">
    </div>
    <div class="bouttons">
        <button type="submit">Rechercher la facture</button>
    </div>
</form>
<br>
<form
method="get"
action="http://localhost/apiFacture/facture/search.php">
    <div>
        <label for="nom">Nom du fournisseur :</label>
        <input type="text" id="nom" name="s">
    </div>
    <div class="bouttons">
        <button type="submit">Rechercher la ou les factures de ce fournisseur</button>
    </div>
</form>
<br>
<div class="bouttons">
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
