<?php

include('./connectBdd.php');

class Users extends Bdd {

    public function addUser($email, $prenom, $password, $age, $sexe, $taille, $poids) {
        $sql = "INSERT INTO `users`(`email`, `password`, `prenom`, `age`, `sexe`, `taille`, `poids`) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email, $prenom, $password, $age, $sexe, $taille, $poids]);
        echo "sucess";
    }

}