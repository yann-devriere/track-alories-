<?php
session_start();
include "./crudRepas.php";

$repas = new Repas;
$email = $_SESSION['email'];
$repas->getLastDays($email);
