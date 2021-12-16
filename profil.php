<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil de <?php echo$_SESSION['prenom']?> </title>
</head>
<body>
<form class="formUpdate" method="POST" action="./class/updateUser.php"> <h3>Un changement corporel ?</h3>
            <div class="innerMenu">
             <p>Nouveau poids</p>
                <input type="number" name="newPoids" required placeholder="Nouveau poids en kg"></input>
             <p>Nouvelle taille</p>
                <input type="decimal" name="newTaille"  required placeholder="Nouvelle taille en m"></input>
                <div class="btnSpot">
                <button type="submit" name="btnUpdate" class="btnUpdate">Modifier</button>
                </div>
            </div>
        </form>
<?php    
echo $_SESSION['prenom'];
echo"</br>";
include ('./tools/calculator.php');
?>
<footer>

<a href="./verifications/deconnexion.php"><input type="button" name="deco" class="deco" value="Se déconnecter"></a>
</footer>
</body>
</html>

