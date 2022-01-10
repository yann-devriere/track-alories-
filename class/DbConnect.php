<?php 
class Bdd {
  // private $servername = 'localhost:3307';
  // private $username = 'calories';
  // private $password = '10082001';
  // private $dbname= 'calories';

  private $servername = 'eu-cdbr-west-02.cleardb.net';
  private $username = 'b0206873bfe93e';
  private $password = '8f1ff1d3';
  private $dbname= 'heroku_cd5ccc3aa17fec6';


  public function connect () {
    $dsn = 'mysql:host=' . $this->servername . ';dbname=' . $this->dbname;
    $connexion = new PDO($dsn, $this->username, $this->password);
    $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $connexion;
  }

  public function valid_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}
}