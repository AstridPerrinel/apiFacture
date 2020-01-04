<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>

    <title>Détruire une facture</title>

</head>
<body>
<header>
<img class="logo" src="../image/logoSermeta.jpg"> 
<h1>Formulaire de supression de facture</h1>
<br>
</header>

<section>
<p> Cette section permet de supprimer une facture en rentrant l'identifiant de la facture: </p>
<br>

<form 
method="post"
action="http://localhost/apiFacture/facture/delete.php">
<table>
    <tr>
        <td>id:</td>
        <td><input name="idFact" type="text" id="idFact" /></td>
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
