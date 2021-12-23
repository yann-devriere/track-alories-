<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include('./crudUser.php');

if(isset($_POST['submit'])) {

    $user = new Users;

    $email = $user->valid_donnees($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $prenom =  $user->valid_donnees($_POST["prenom"]);
    $age = $user->valid_donnees($_POST["age"]);
    $sexe = $user->valid_donnees($_POST["sexe"]);
    $taille = $user->valid_donnees($_POST["taille"]);
    $poids = $user->valid_donnees($_POST["poids"]);


    if (
        !empty($email)
        && filter_var($email, FILTER_VALIDATE_EMAIL)
        && !empty($password)
        && !empty($prenom)
        && strlen($prenom) <= 50
        && !empty($age)
        && strlen($age) <= 3
        && strlen($sexe) <= 5
        && !empty($sexe)
        && !empty($taille)
        && is_numeric($taille)
        && !empty($poids)
        && strlen($poids) <= 3
    
    ){
        $user->createUser($email, $password, $prenom, $age, $sexe, $taille, $poids);
        echo'<script>alert("Compte créé, vous pouvez déjà vous connecter." );window.location.href = "../index.php";</script>';
        
    }else{
        
        echo'<script>alert("Erreur dans le formulaire, données invalides." );window.location.href = "../index.php";</script>';
    }
        
        
}
