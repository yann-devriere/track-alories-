<?php

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
    $sexe = $_SESSION['sexe'];

    if($sexe=='homme'){
    if($res['calories'] >= 2700 ){
        echo "Ajourd'hui, tu as mangé l'équivalent de "  . $res['calories'] .  " calories. Attention, tu as dépassé la limite journalière conseillée, (mais t'inquiètes c'est les fêtes, on peut)";
    }else{
    echo "Ajourd'hui, tu as mangé l'équivalent de "  . $res['calories'] . ' calories';
}
}else{

if($res['calories'] >= 2200 ){
        echo "Ajourd'hui, tu as mangé l'équivalent de "  . $res['calories'] .  " calories. Attention, tu as dépassé la limite journalière conseillée, (mais t'inquiètes c'est les fêtes, on peut)";
    }else{
    echo "Ajourd'hui, tu as mangé l'équivalent de "  . $res['calories'] . ' calories';
}
}
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

    public function getlastdays($email){
        $sql = "SELECT * FROM repas WHERE email= '$email' AND date > current_date - interval 7 day";
        $req = $this->connect()->prepare($sql);
        $req -> execute();
        $res = $req->fetchAll();
        // var_dump($res);
        foreach($res as $key) {
            $calories[] = $key['calories'];
            var_dump($calories);
            
        }


    }




}