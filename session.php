<?php
session_start();
// phpinfo();

 $db = new PDO('mysql:host=localhost;dbname=concoursChant;', 'chant' , '01021991');
//$db = new PDO('mysql:host=localhost:3307;dbname=concoursChant;', 'chant' , '01021991');


if(isset($_POST['formconnexion'])) {
    $pseudoconnect = /*htmlspecialchars */($_POST['pseudoconnect']);
    $mdpconnect = /*sha1*/($_POST['mdpconnect']);
      $requser = $db->prepare("SELECT password FROM users WHERE pseudo = ?");
      $requser->execute(array($pseudoconnect));
      $userexist = $requser->rowCount();

      if($userexist == 1) {
          $userinfo = $requser->fetch();
         $verifmdp = $userinfo['password'];

         }
    if(password_verify($mdpconnect, $verifmdp) == TRUE) {
       $requser = $db->prepare("SELECT * FROM users WHERE pseudo = ?");
       $requser->execute(array($pseudoconnect));
       $userexist = $requser->rowCount();

       if($userexist == 1) {
          $userinfo = $requser->fetch();
          $_SESSION['id'] = $userinfo['id'];
          $_SESSION['pseudo'] = $userinfo['pseudo'];
          $_SESSION['nom'] = $userinfo['nom'];
          $_SESSION['prenom'] = $userinfo['prenom'];
          $_SESSION['age'] = $userinfo['age'];
          $_SESSION['sexe'] = $userinfo['sexe'];
          $_SESSION['email'] = $userinfo['email'];
          $_SESSION['telephone'] = $userinfo['telephone'];
          $_SESSION['adresse'] = $userinfo['adresse'];
          $_SESSION['codepostal'] = $userinfo['codepostal'];
          $_SESSION['ville'] = $userinfo['ville'];
          header("Location: profil.php");
       }
         