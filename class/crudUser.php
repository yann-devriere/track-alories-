<?php

include('DbConnect.php');

class Users extends Bdd {

    public function createUser($email, $password, $prenom,  $age, $sexe, $taille, $poids) {
        $sql = "INSERT INTO `users`(`email`, `password`, `prenom`, `age`, `sexe`, `taille`, `poids`) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $req = $this->connect()->prepare($sql);
        $req->execute([$email, $password, $prenom, $age, $sexe, $taille, $poids]);
        echo "success";
    }

    public function read($id) {
        $sql = "SELECT * FROM users WHERE id='$id'";
        $req = $this->connect()->prepare($sql);
        $req->execute();
        $res = $req->fetch();
        $prenom = $res['prenom'];
        $age = $res['age'];
        return "Bonjour $prenom  tu as $age ans ";
        
    }

    public function update($taille, $poids, $id){
        $sql = "UPDATE users SET taille='$taille', poids='$poids' WHERE id='$id'";
        $req = $this->connect()->prepare($sql);
        $req -> execute();
        return "changement validé ";
     }      

    public function delete($id){
        $sql = "DELETE FROM users WHERE id='$id'";
        $req = $this->connect()->prepare($sql);
        $req -> execute();
        return "utilisateur supprimé";
    }


    // public function verifMDP($emailconnect ,$mdpconnect){
    //     if(isset($_POST['formconnexion'])) {
    //         $emailconnect = ($_POST['emailconnect']);
    //         $mdpconnect = $_POST['mdpconnect']);
    //           $requser = $this->connect()->prepare("SELECT password FROM users WHERE email = ?");
    //           $requser->execute(array($emailconnect));
    //           $userexist = $requser->rowCount();
        
    //           if($userexist == 1) {
    //               $userinfo = $requser->fetch();
    //              $verifmdp = $userinfo['password'];
        
    //              }
    //         if(password_verify($mdpconnect, $verifmdp) == TRUE) {
    //            $requser = $this->connect()->prepare("SELECT * FROM users WHERE email = ?");
    //            $requser->execute(array($emailconnect));
    //            $userexist = $requser->rowCount();
        
    //            if($userexist == 1) {
    //               $userinfo = $requser->fetch();
    //               $_SESSION['id'] = $userinfo['id'];
    //               $_SESSION['email'] = $userinfo['email'];
    //               $_SESSION['prenom'] = $userinfo['prenom'];
    //               $_SESSION['age'] = $userinfo['age'];
    //               $_SESSION['sexe'] = $userinfo['sexe'];
    //               $_SESSION['taille'] = $userinfo['taill'];
    //               $_SESSION['poids'] = $userinfo['poids'];
        
    //               header("Location: profil.php");
                  
    //              } else {
    //                 $erreur = "Tous les champs doivent être complétés !";
    //                 echo"$erreur";
    //              }
    //           } else {
    //              $erreur = '<script>alert("Adresse ou mot de passe érroné");</script>';
    //              echo"$erreur";
    //           }
    // }

}