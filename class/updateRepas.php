<?php
session_start();
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
include('./crudRepas.php');

$repas = new Repas;

if(isset($_POST['btnRepas'])) {
    $email = $_SESSION["email"];
    $date= $repas->valid_donnees($_POST["date"]);
    $calories = $repas->valid_donnees($_POST["calories"]);

    if($date > date('Y-m-d')){
    echo'<script>alert("Date future non autorisée;" );window.location.href = "../profil.php";</script>';
    }else{

        if(!empty($calories)
        && strlen($calories) <= 4
        && strlen($date) <= 12){

        $repas->updateRepas($email, $date, $calories,);
        echo'<script>alert("Repas ajouté" );window.location.href = "../profil.php";</script>';
        }else{
            echo'<script>alert("Données non-valides" );window.location.href = "../profil.php";</script>';
        }
    }
}
