<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include('./crudUser.php');

if(isset($_POST['submit'])) {
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $prenom = $_POST["prenom"];
    $age = $_POST["age"];
    $sexe = $_POST["sexe"];
    $taille = $_POST["taille"];
    $poids = $_POST["poids"];

        $user = new Users;
        $user->createUser($email, $password, $prenom, $age, $sexe, $taille, $poids);

        header("Location: ../index.php");
      
}
