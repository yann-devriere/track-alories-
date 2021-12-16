<?php 
class Bdd {
  private $servername = 'localhost';
  private $username = 'chant';
  private $password = '01021991';
  private $dbname= 'trackalories';


  public function connect () {
    $dsn = 'mysql:host=' . $this->servername . ';dbname=' . $this->dbname;
    $connexion = new PDO($dsn, $this->username, $this->password);
    $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $connexion;
  }
}