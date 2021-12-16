<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track'alories</title>
</head>
<body>
    <h1> INDEX </h1>

<form class="connexion" method="POST" action="verifications/session.php"> <h3>Connexion</h3>
            <div class="innerMenu">
             <p>Adresse email</p>
                <input type="email" name="emailconnect" required placeholder="Adresse mail"></input>
             <p>Mot de passe</p>
                <input type="password" name="mdpconnect"  required placeholder="Mot de passe"></input>
                <div class="btnSpot">
                <button type="submit" name="formconnexion" class="btnConnexion">Connexion</button>
                </div>
            </div>
        </form> 
</body>

<a href="inscription.php"><h2>S'inscrire</h2></a>

</html>
    