<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trackalories</title>
</head>
<body>


<h1> ACCUEIL</h1>


<a href="inscription.php"><h2>S'inscrire </h2></a>


<form class="connexion" method="POST" action="verifications/session.php"> <h3>Connexion</h3>
            <div class="innerMenu">
             <p>Adresse email*</p>
                <input type="email" name="emailconnect" required placeholder="Email"></input>
             <p>Mot de passe*</p>
                <input type="password" name="mdpconnect"  required placeholder="Mot de passe"></input>
                <div class="btnSpot">
                <button type="submit" name="formconnexion" class="btnConnexion">Connexion</button>
                </div>
            </div>
        </form> 
</body>
</html>