<?php
session_start();

$poids=$_SESSION['poids'];
$taille=$_SESSION['taille'];
$tailleCarre=$taille*$taille;
$IMC = $poids/$tailleCarre;
echo round($IMC,2);

if(round($IMC,2) < 16.5){
    echo". DANGER ! Il faut manger!";
}else if(round($IMC,2) >= 16.5 && round($IMC,2)<18.5 ){
    echo". Attention, même les instagrameuses sont plus épaisses que toi";
}else if(round($IMC,2) >= 18.5 && round($IMC,2)<25 ){
    echo ". Au top, tu as atteint ton poids de forme!";
}else if(round($IMC,2) >= 25 && round($IMC,2)<30 ){ 
    echo ". Rien de grave, mais évite de reprendre une part de gâteau lors du prochain repas chez mamie.";
}else if(round($IMC,2) >= 30 && round($IMC,2)<35 ){
    echo ". Là tu le sais, tu as abusé dernièrement, il faut éliminer un peu tout ça.";
}else if(round($IMC,2) >= 35 && round($IMC,2)<40 ){
    echo ". Attention, il faut que tu fasses du sport, ta santé est en jeu.";
}else if(round($IMC,2) >=40 ){ 
    echo ". DANGER ! Il faut faire le nécéssaire car ta santé risque de se dégrader !";
}

?>