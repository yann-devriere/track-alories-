<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

include('./crudUser.php');

if(isset($_POST['btnUpdate'])) {
    $taille = $_POST["newTaille"];
    $poids = $_POST["newPoids"];
    $id = $_SESSION['id'];

    $_SESSION['taille'] = $_POST["newTaille"];
    $_SESSION['poids'] = $_POST["newPoids"];

    $user = new Users;
    $user->update($taille, $poids, $id);



    header("Location: ../profil.php");
}
    ?>