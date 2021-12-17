<?php
session_start();
include('DbConnect.php');

class Repas extends Bdd {

    public function createRepas($email, $date, $calories) {
        $sql = "INSERT INTO `repas`(`email`, `date`, `calories`) VALUES (?, ?, ?)";
        $req = $this->connect()->prepare($sql);
        $req->execute([$email, $date, $calories]);
        echo "success";
    }

    public function readRepas($email,$date) {
        $sql = "SELECT id FROM repas WHERE email='$email' AND date='$date'";
        $req = $this->connect()->prepare($sql);
        $req->execute();
        $res = $req->fetch();
        
        // $calories = $res['calories'];
        // $date = $res['date'];
        // return "tu as ingeré $calories calories le $date";
        
    }
// -----------------------new
    public function showTodaysCalories($email,$date) {
        $sql = "SELECT calories FROM repas WHERE email='$email' AND date='$date'";
        $req = $this->connect()->prepare($sql);
        $req->execute();
        $res = $req->fetch();
        echo $res();
    }
//  //---------------------------   




    public function updateRepas($email, $date, $calories){
// TEST
        $sql = "SELECT id FROM repas WHERE email='$email' AND date='$date'";
        $req = $this->connect()->prepare($sql);
        $req->execute();
        $res = $req->fetch();

        if($res == 0){
            $sql1 = "INSERT INTO `repas`(`email`, `date`, `calories`) VALUES (?, ?, ?)";
        $req1 = $this->connect()->prepare($sql1);
        $req1->execute([$email, $date, $calories]);
        echo "success";
    }else{
            // LE BON MORCEAU
        $sql2 = "UPDATE repas SET calories= calories + '$calories' WHERE email='$email' AND date='$date'";
        $req2 = $this->connect()->prepare($sql2);
        $req2 -> execute();
        return "Ajout validé ";
     }     
    } 

    public function deleteRepas($id){
        $sql = "DELETE FROM repas WHERE email='$email' AND date='$date'";
        $req = $this->connect()->prepare($sql);
        $req -> execute();
        return "Repas supprimé";
    }




}