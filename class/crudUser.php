<?php

include('class/DbConnect.php');

class Users extends Bdd {

    public function createUser($email, $prenom, $password, $age, $sexe, $taille, $poids) {
        $sql = "INSERT INTO `users`(`email`, `password`, `prenom`, `age`, `sexe`, `taille`, `poids`) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $req = $this->connect()->prepare($sql);
        $req->execute([$email, $prenom, $password, $age, $sexe, $taille, $poids]);
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




}