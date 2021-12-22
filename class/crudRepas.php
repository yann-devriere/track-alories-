<?php

include('DbConnect.php');

class Repas extends Bdd {
//--------------------CREATE------------------------
    public function createRepas($email, $date, $calories) {
        $sql = "INSERT INTO `repas`(`email`, `date`, `calories`) VALUES (?, ?, ?)";
        $req = $this->connect()->prepare($sql);
        $req->execute([$email, $date, $calories]);
        echo "success";
    }
//----------------READ---------------------
    public function readRepas($email,$date) {
        $sql = "SELECT id FROM repas WHERE email='$email' AND date='$date'";
        $req = $this->connect()->prepare($sql);
        $req->execute();
        $res = $req->fetch();
    }
// ---------------- CALORIES DU JOUR--------------
    public function showTodaysCalories($email,$date) {
        $sql = "SELECT calories FROM repas WHERE email='$email' AND date='$date'";
        $req = $this->connect()->prepare($sql);
        $req->execute();
        $res = $req->fetch();
        $sexe = $_SESSION['sexe'];
// Verification nombre de calories journalières pour un homme
        if($sexe=='homme'){
        if($res['calories'] >= 2700 ){
            echo "Ajourd'hui, tu as mangé l'équivalent de "  . $res['calories'] .  " calories. Attention, tu as dépassé la limite journalière conseillée, (mais t'inquiètes c'est les fêtes, on peut)";
        }else{
        echo "Ajourd'hui, tu as mangé l'équivalent de "  . $res['calories'] . ' calories';
    }
}else{
    // Verification nombre de calories journalières pour une femme
    if($res['calories'] >= 2200 ){
            echo "Ajourd'hui, tu as mangé l'équivalent de "  . $res['calories'] .  " calories. Attention, tu as dépassé la limite journalière conseillée, (mais t'inquiètes c'est les fêtes, on peut)";
        }else{
        echo "Ajourd'hui, tu as mangé l'équivalent de "  . $res['calories'] . ' calories';
    }
}
}
  //-------------UPDATE--------------   
    public function updateRepas($email, $date, $calories){
        
        $sql = "SELECT id FROM repas WHERE email='$email' AND date='$date'";
        $req = $this->connect()->prepare($sql);
        $req->execute();
        $res = $req->fetch();

        if($res == 0){
            $sql = "INSERT INTO `repas`(`email`, `date`, `calories`) VALUES (?, ?, ?)";
        $req = $this->connect()->prepare($sql);
        $req->execute([$email, $date, $calories]);
        echo "success";
    }else{  
        $sql = "UPDATE repas SET calories= calories + '$calories' WHERE email='$email' AND date='$date'";
        $req = $this->connect()->prepare($sql);
        $req -> execute();
        return "Ajout validé ";
     }
   } 
// --------------------DELETE--------------------
    public function deleteRepas($email){
        $sql = "DELETE FROM repas WHERE email='$email' AND date='$date'";
        $req = $this->connect()->prepare($sql);
        $req -> execute();
        return "Repas supprimé";
    }
//-------------- LAST 10 DAYS ----------------------
    public function getlastdays($email){  
        $sql = "SELECT calories FROM repas WHERE email= '$email' AND date > current_date - interval 10 day ORDER BY date ASC";
        $req = $this->connect()->prepare($sql);
        $req -> execute();
        $res = $req->fetchAll();
       
        foreach($res as $key) {
            $insert[] = implode(', ', array_values($key));
            }
           
            $_SESSION['day9'] =(int)$insert[0];
            $_SESSION['day8'] =(int)$insert[1];
            $_SESSION['day7'] =(int)$insert[2];
            $_SESSION['day6']=(int)$insert[3];
            $_SESSION['day5'] =(int)$insert[4];
            $_SESSION['day4'] =(int)$insert[5];
            $_SESSION['day3'] =(int)$insert[6];
            $_SESSION['day2'] =(int)$insert[7];
            $_SESSION['day1'] =(int)$insert[8];
            $_SESSION['today'] =(int)$insert[9];
     }

// Calories Aujourd'hui sans messages
// public function todaysCalories($email,$date) {
//     $sql = "SELECT calories FROM repas WHERE email='$email' AND date='$date'";
//     $req = $this->connect()->prepare($sql);
//     $req->execute();
//     $res = $req->fetch();
//     $_SESSION['calories'] = $res['calories'];
// }
}