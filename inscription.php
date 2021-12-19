<?php
// session_start();
// error_reporting(E_ALL);
ini_set("display_errors", 1);
require "class/crudUser.php";
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
</head>
<body>

<?php 
 ?> 

<form action="./class/addUser.php" method="POST">
<label for="prenom">Email</label> <input type="text" name="email" placeholder ="jean@gmail.com"> <br>
<label for="prenom">Mot de passe</label> <input type="password" name="password" placeholder ="Définir un mot de passe" > <br>
<label for="prenom">Confirmer le mot de passe</label> <input type="password" name="password2" placeholder ="Confirmer le mot de passe"> <br>
<label for="prenom">Prénom</label> <input type="text" name="prenom" placeholder ="Jean"> <br>
<label for="prenom">Age</label><input type="number" name="age" placeholder ="32"><br>
<label for="prenom">Sexe</label><select type="select" name="sexe"><br>
    <option value ="homme">Homme</option> 
    <option value = "femme">Femme</option> </select> <br>
<label for="prenom">Taille en m</label><input type="decimal" name="taille" placeholder ="1.75"><br>
<label for="prenom">Poids en kg</label><input type="number" name="poids" placeholder ="81"><br>

<button type="submit" name="submit" class="btnValider">S'inscrire</button>

    </form>
    
</body>
</html>