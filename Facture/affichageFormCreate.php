<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>

    <title>Créer une facture</title>

</head>
<body>
<header>
<img class="logo" src="../image/logoSermeta.jpg"> 
<h1>Formulaire de création de facture</h1>
<br>
</header>

<section>
<p> Cette section permet de créer une facture en rentrant la date de facture et l'identifiant du fournisseur : </p>
<br>

<form 
method="post"
action="http://localhost/apiFacture/facture/create.php">
<table>
    <tr>
        <td>Date:</td>
        <td><input name="dateFact" type="text" id="dateFact" /></td>
    </tr>
    <tr>
        <td>Identifant du Fournisseur:</td>
        <td><input name="idFournisseur" type="text" id="idFournisseur" /></td>
    </tr>
    <tr>
        <td colspan="2">
            <div>
            <input type="submit" name="Submit" value="Envoyer" />
            </div>
        </td>
    </tr>
</table>
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
