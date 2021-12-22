<?php

// error_reporting(E_ALL);
// ini_set("display_errors", 1);
include('crudRepas.php');

if($_SESSION['id'] != 0){


$repas = new Repas;
$email = $_SESSION['email'];
$date = date('Y-m-d');
// echo $date;
$repas->showTodaysCalories($email, $date);
// header("Location: ../profil.php"); 
}else{ echo "bug";
 }
