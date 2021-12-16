<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);


class Requete{

    public function create($nom,$prenom){
    $db = new PDO('mysql:host=localhost:3307;dbname=poo;', 'chant' , '01021991');
    $sql = "INSERT INTO users (nom,prenom) VALUES ('$nom','$prenom')";
    $req = $db->prepare($sql); 
    $req -> execute();
}

    public function read($id){
    $db = new PDO('mysql:host=localhost:3307;dbname=poo;', 'chant' , '01021991');
    $sql = "SELECT * FROM users WHERE id='$id'";
    $req = $db->prepare($sql); 
    $req -> execute();
    $res = $req->fetch();
    $nom = $res['nom'];
    $prenom = $res['prenom'];
    return "Bonjour $prenom  $nom ";
        }

    public function update($nom,$prenom,$id){
    $db = new PDO('mysql:host=localhost:3307;dbname=poo;', 'chant' , '01021991');
    $sql = "UPDATE users SET nom='$nom', prenom='$prenom' WHERE id='$id'";
    $req = $db->prepare($sql); 
    $req -> execute();
        }      

    public function delete($id){
    $db = new PDO('mysql:host=localhost:3307;dbname=poo;', 'chant' , '01021991');
    $sql = "DELETE FROM users WHERE id='$id'";
    $req = $db->prepare($sql); 
    $req -> execute();
    }

    


}

?>
