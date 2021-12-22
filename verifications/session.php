<?php
session_start();

include('../class/DbConnect.php');
$db = new bdd;


if(isset($_POST['formconnexion'])) {
    $emailconnect = ($_POST['emailconnect']);
    $mdpconnect = ($_POST['mdpconnect']);
      $requser = $db->connect()->prepare("SELECT password FROM users WHERE email = ?");
      $requser->execute(array($emailconnect));
      $userexist = $requser->rowCount();

      if($userexist == 1) {
          $userinfo = $requser->fetch();
         $verifmdp = $userinfo['password'];

         }
    if(password_verify($mdpconnect, $verifmdp) == TRUE) {
       $requser = $db->connect()->prepare("SELECT * FROM users WHERE email = ?");
       $requser->execute(array($emailconnect));
       $userexist = $requser->rowCount();

       if($userexist == 1) {
          $userinfo = $requser->fetch();
          $_SESSION['id'] = $userinfo['id'];
          $_SESSION['email'] = $userinfo['email'];
          $_SESSION['prenom'] = $userinfo['prenom'];
          $_SESSION['age'] = $userinfo['age'];
          $_SESSION['sexe'] = $userinfo['sexe'];
          $_SESSION['taille'] = $userinfo['taille'];
          $_SESSION['poids'] = $userinfo['poids'];       
          header("Location: ../profil.php");
         } else {
            $erreur = "Tous les champs doivent être complétés !";
            echo"$erreur";
         }
      } else {
         $erreur = '<script>alert("Adresse ou mot de passe érroné");window.location.href = "../index.php";</script>';
         echo"$erreur";
       
      }
   }
         ?>
