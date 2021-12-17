<?php
session_start();
 error_reporting(E_ALL);
 ini_set("display_errors", 1);
?>


<!DOCTYPE html>
<html lang="us">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil de <?php echo$_SESSION['prenom']?> </title>

</head>
<body>
Salut   
<?php 
echo $_SESSION['prenom'];?>,
<br>
Ton IMC est de <?php include ('tools/calculator.php');
?>

<form class="formUpdate" method="POST" action="./class/updateUser.php"> <h3>Un changement physique ?</h3>
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
        <br><br><br><br>
        <form class="formRepas" method="POST" action="class/updateRepas.php"> <h3>Tu as mangé quelque chose?</h3>
            <div class="innerMenu">
             <p>Quand ?</p>
             <input type="date" name="date" required placeholder=""></input>
             <!-- <p>C'était quoi ?</p>
                <input type="text" name="aliment" required placeholder="omelette et jambon"></input> -->
             <p>Combien de calories ?</p>
                <input type="number" name="calories"  required placeholder="290"></input>
                <div class="btnSpot">
                <button type="submit" name="btnRepas" class="btnRepas">Ajouter</button>
                </div>
            </div>
        </form> 

<br><br><br>
<?php // include ("../class/showTodayscalories.php") ?>
Ajourd'hui, tu as mangé l'équivalent de 
<?php //showTodaysCalories() 
include('class/crudRepas.php');

// if($_SESSION['id'] != null){

 $email = $_SESSION['email'];
 $date = date('Y-m-d');
 $repas = new Repas;

 $repas->showTodaysCalories($email, $date);
// header("Location: ./profil.php"); 
// }
// else{ echo "bug"};


?>



<br><br><br><br>

<footer>
    <a href="verifications/deconnexion.php"><input type="button" name="deco" class="deco" value="Se deconnecter"></a>
</footer>
</body>
</html>