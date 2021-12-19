<?php
session_start();
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
include('./crudRepas.php');

if(isset($_POST['btnRepas'])) {
    $email = $_SESSION["email"];
    $date= $_POST["date"];
    $calories = $_POST["calories"];
    
        $repas = new Repas;

        $repas->updateRepas($email, $date, $calories,);
        header("Location: ../profil.php");
}
