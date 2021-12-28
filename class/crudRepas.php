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
        if($res == 0){
             echo "Vous n'avez encore rien mangé aujourd'hui.";
        }else{

        $sexe = $_SESSION['sexe'];
// Verification nombre de calories journalières pour un homme
        if($sexe=='homme'){
        if($res['calories'] >= 2700 ){
            echo "Ajourd'hui, tu as mangé l'équivalent de <span class='text-danger'>"  . $res['calories'] . "</span> calories. <span class='text-danger'> Attention </span>, tu as dépassé la limite journalière conseillée, (mais t'inquiètes c'est les fêtes, on peut)";
        }else{
            echo "Ajourd'hui, tu as mangé l'équivalent de <span class='text-success'>"  . $res['calories'] . '</span> calories';    }
}else{
    // Verification nombre de calories journalières pour une femme
    if($res['calories'] >= 2200 ){
        echo "Ajourd'hui, tu as mangé l'équivalent de <span class='text-danger'>"  . $res['calories'] . "</span> calories. <span class='text-danger'> Attention </span>, tu as dépassé la limite journalière conseillée, (mais t'inquiètes c'est les fêtes, on peut)";
        }else{
            echo "Ajourd'hui, tu as mangé l'équivalent de <span class='text-success'>"  . $res['calories'] . '</span> calories';    }
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
        $this->deleteRepas();
    }else{  
        $sql = "UPDATE repas SET calories= calories + '$calories' WHERE email='$email' AND date='$date'";
        $req = $this->connect()->prepare($sql);
        $req -> execute();
        return "Ajout validé ";
     }
   } 
// --------------------DELETE--------------------
    public function deleteRepas(){
        $sql = "DELETE FROM repas WHERE date <= current_date -11" ;
        $req = $this->connect()->prepare($sql);
        $req -> execute();
    }
//-------------- LAST 10 DAYS ----------------------

public function getlastdays($email){  
    $sql = "SELECT calories FROM repas WHERE email= '$email' AND date = current_date  ";
    $req = $this->connect()->prepare($sql);
    $req -> execute();
    $res = $req->fetch();

    if($res == 0){
   $_SESSION['today'] = 0;
    }else{
         $_SESSION['today'] = $res['calories'];
   }


   $sql1 = "SELECT calories FROM repas WHERE email= '$email' AND date = current_date -1  ";
    $req1 = $this->connect()->prepare($sql1);
    $req1 -> execute();
    $res1 = $req1->fetch();

    if($res1 == 0){
   $_SESSION['day1'] = 0;
    }else{
         $_SESSION['day1'] = $res1['calories'];
   }



   $sql2 = "SELECT calories FROM repas WHERE email= '$email' AND date = current_date -2  ";
   $req2 = $this->connect()->prepare($sql2);
   $req2 -> execute();
   $res2 = $req2->fetch();

   if($res2 == 0){
  $_SESSION['day2'] = 0;
   }else{
        $_SESSION['day2'] = $res2['calories'];
  }


  $sql3 = "SELECT calories FROM repas WHERE email= '$email' AND date = current_date -3  ";
  $req3 = $this->connect()->prepare($sql3);
  $req3 -> execute();
  $res3 = $req3->fetch();

  if($res3 == 0){
 $_SESSION['day3'] = 0;
  }else{
       $_SESSION['day3'] = $res3['calories'];
 }



 $sql4 = "SELECT calories FROM repas WHERE email= '$email' AND date = current_date -4  ";
 $req4 = $this->connect()->prepare($sql4);
 $req4 -> execute();
 $res4 = $req4->fetch();

 if($res4 == 0){
$_SESSION['day4'] = 0;
 }else{
      $_SESSION['day4'] = $res4['calories'];
}


$sql5 = "SELECT calories FROM repas WHERE email= '$email' AND date = current_date -5  ";
$req5 = $this->connect()->prepare($sql5);
$req5 -> execute();
$res5 = $req5->fetch();

if($res5 == 0){
$_SESSION['day5'] = 0;
}else{
     $_SESSION['day5'] = $res5['calories'];
}

$sql6 = "SELECT calories FROM repas WHERE email= '$email' AND date = current_date -6  ";
$req6 = $this->connect()->prepare($sql6);
$req6 -> execute();
$res6 = $req6->fetch();

if($res6 == 0){
$_SESSION['day6'] = 0;
}else{
    $_SESSION['day6'] = $res6['calories'];
}



$sql7 = "SELECT calories FROM repas WHERE email= '$email' AND date = current_date -7  ";
$req7 = $this->connect()->prepare($sql7);
$req7 -> execute();
$res7 = $req7->fetch();

if($res7 == 0){
$_SESSION['day7'] = 0;
}else{
   $_SESSION['day7'] = $res7['calories'];
}


$sql8 = "SELECT calories FROM repas WHERE email= '$email' AND date = current_date -8  ";
$req8 = $this->connect()->prepare($sql8);
$req8 -> execute();
$res8 = $req8->fetch();

if($res8 == 0){
$_SESSION['day8'] = 0;
}else{
  $_SESSION['day8'] = $res8['calories'];
}


$sql9 = "SELECT calories FROM repas WHERE email= '$email' AND date = current_date -9  ";
$req9 = $this->connect()->prepare($sql9);
$req9 -> execute();
$res9 = $req9->fetch();

if($res9 == 0){
$_SESSION['day9'] = 0;
}else{
 $_SESSION['day9'] = $res9['calories'];
}


}


    // public function getlastdays($email){  
    //     $sql = "SELECT calories FROM repas WHERE email= '$email' AND date > current_date - interval 10 day ORDER BY date ASC";
    //     $req = $this->connect()->prepare($sql);
    //     $req -> execute();
    //     $res = $req->fetchAll();
       
    //     foreach($res as $key) {
    //         $insert[] = implode(', ', array_values($key));
    //         }
           
    //         $_SESSION['day9'] =(int)$insert[0];
    //         $_SESSION['day8'] =(int)$insert[1];
    //         $_SESSION['day7'] =(int)$insert[2];
    //         $_SESSION['day6']=(int)$insert[3];
    //         $_SESSION['day5'] =(int)$insert[4];
    //         $_SESSION['day4'] =(int)$insert[5];
    //         $_SESSION['day3'] =(int)$insert[6];
    //         $_SESSION['day2'] =(int)$insert[7];
    //         $_SESSION['day1'] =(int)$insert[8];
    //         $_SESSION['today'] =(int)$insert[9];
    //  }


}