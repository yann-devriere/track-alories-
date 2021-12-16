<?php 
class Bdd {
  private $servername = 'localhost:3307';
  private $username = 'calories';
  private $password = '10082001';
  private $dbname= 'calories';


  public function connect () {
    $dsn = 'mysql:host=' . $this->servername . ';dbname=' . $this->dbname;
    $connexion = new PDO($dsn, $this->username, $this->password);
    $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $connexion;
  }
}