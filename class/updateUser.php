<?php
session_start();
// error_reporting(E_ALL);
// ini_set("display_errors", 1);

include('./crudUser.php');
$user = new Users;

if(isset($_POST['btnUpdate'])) {
    $taille = $user->valid_donnees($_POST["newTaille"]);
    $poids = $user->valid_donnees($_POST["newPoids"]);
    $id = $_SESSION['id'];
    $_SESSION['taille'] = ($_POST["newTaille"]);
    $_SESSION['poids'] = ($_POST["newPoids"]);

    if( !empty($taille)
    && is_numeric($taille)
    && !empty($poids)
    && strlen($poids) <= 3 ){

         $user->update($taille, $poids, $id);
         echo'<script>alert("Changements enregistrés" );window.location.href = "../profil.php";</script>';
    }else{
        echo'<script>alert("Données non valides" );window.location.href = "../profil.php";</script>';
      }
   
}
    ?>