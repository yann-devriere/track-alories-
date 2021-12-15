<?php

include('./submitUser.php');

if(isset($_POST['submit'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $prenom = $_POST["prenom"];
    $age = $_POST["age"];
    $sexe = $_POST["sexe"];
    $taille = $_POST["taille"];
    $poids = $_POST["poids"];

        $user = new Users;
        $user->addUser($email, $prenom, $password, $age, $sexe, $taille, $poids);
}
