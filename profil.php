<?php
session_start();
if($_SESSION['email'] == null){
    header("Location: index.php");
  }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tools/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Profil de <?php echo$_SESSION['prenom']?> </title>

</head>


<body >
    <!-- navbar -->
<nav class="navbar navbar-expand-sm bg-success" >
    <div class="container-xxl">
        <a href="profil.php" class="navbar-brand">
            <span class="fw-bold text-light">Track'alories</span>
        </a>
<!-- bouton toggle pour les mobiles-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav"
        aria-controls="main-nav" aria-expanded="false" aria-label="Toggle-navigation">
        <span class="navbar-toggler-icon"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/></svg>
        </span>
    </button>
<!-- les liens qui sont dans le menu burger de la navbar-->
<div class="collapse navbar-collapse justify-content-end align-center" id="main-nav">
    <ul class="navbar-nav"> 
        <li class="nav-item">
        <a href="#pied" class=" btn btn-sm btn-outline-light m-2">Contacts</a>
        </li>

        <li class="nav-item">
        <a href="verifications/deconnexion.php" class=" btn btn-sm btn-light m-2">Se déconnecter</a>
        </li>
        
       
    </ul>
</div>
</div>
</nav>

<!-- affichage de l'imc et d'un message de conseil-->
<div class="m-2">
 <span class="prenom lead fw-bold">Salut   
<span class="text-success muted">
<?php 
echo  $_SESSION['prenom'];?>,</span></span>
<br>
<div class= "message">
ton IMC est de <?php include ('tools/calculator.php');?>
</div>


<!-- formulaire d'insertion de repas dans la base de données-->
        <br>
<div class="container  mb-2 mt-sm-5 mb-sm-0">
    <div class="row  justify-content-center content-align-center  "> 
     

      <div class=" col-4 p-1 ">
        <form class="formRepas" method="POST" action="class/updateRepas.php"> <h3>Qu'as tu mangé ?</h3>
            <div class="innerMenu">
             <p>Quand ?</p>
             <input type="date" name="date" required placeholder="" max="<?= date('Y-m-d'); ?>"></input>
             <p class="mt-3">Combien de calories ?</p>
                <input type="number" name="calories" class="mt-1 " required placeholder="290"></input>
                <div class="btnSpot">
                <button type="submit" name="btnRepas" class="btnRepas btn btn-success mt-3">Ajouter</button>
                </div>
            </div>
        </form> 
        </div>
 <img src="./images/breakfast.svg" alt="breakfast.svg" class="img-fluid w-50 ms-5 ms-lg-3 d-block col-8">
</div>
</div>
        <br>

<!-- affichage du nombre de calories consommées aujourd'hui -->

        <div class= "today mb-5 h5 ">
<?php include('class/showTodaysCalories.php');?>
</div>
<br>



<!--appel du graphique -->
<div class= "graph">
<?php  include('tools/graph.php');?>
</div>

<!-- btn modal de changement corporel-->
<button class="btn-sm btn-success shadow-lg mb-2 mt-5 mt-sm-5 rounded-pill d-block" data-bs-toggle="modal" data-bs-target="#changementCorporel">Ta taille ou ton poids a changé ? (les mettres à jour)</button> 
<!-- btn de deconnexion-->
<a href="verifications/deconnexion.php" class=" btn btn-sm btn-outline-success m-2">Se déconnecter</a>

<br>



<!-- Modal changement corporel -->
<div class="modal fade" id="changementCorporel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <div class="h4">
        Tu mesures : <?php echo $_SESSION['taille']?> pour <?php echo $_SESSION['poids']?> kg.
      </div>

      <form class="formUpdate" method="POST" action="./class/updateUser.php"> <h3>Un changement physique ?</h3>
            <div class="innerMenu">
             <p>Nouveau poids</p>
                <input type="number" name="newPoids" required placeholder="Nouveau poids en kg"></input>
             <p class="mt-5">Nouvelle taille</p>
                <input type="decimal" name="newTaille"  required placeholder="Nouvelle taille en m"></input>
                <div class="btnSpot">
                <button type="submit" name="btnUpdate" class=" btn btn-success mt-1 btnUpdate">Modifier</button>
                </div>
            </div>
        </form> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
      </div>
    </div>
  </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


<!--footer-->

<footer id="pied" class="container-fluid m-0  bg-success bg-gradient text-light mt-5"> 

  <div class=" row pt-2">
    <div class="d-flex content-align-center justify-content-center col-12 ">
      <div class="me-2 ">
        <p style="font-size:10px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
  <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
</svg> yann.devriere@gmail.com</p> 
      </div>
      <div class="ms-2 me-2">
        <p style="font-size:10px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
</svg> tél : xxxxxxxxxx</p>
      </div>
      <div class="ms-2">
      <p class="" style="font-size:10px;"> <a href="https://www.linkedin.com/in/yann-devriere-a3327b222?originalSubdomain=fr"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
  <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
</svg></a></p>
      </div>
    </div>
  </div>

        
    <div class="d-flex content-align-center justify-content-center  ">
      <div class="">
      <p class="" style="font-size:8px;">Copyright &copy; Yann Devriere. All rights reserved</p>
  
    </div>
   </div>
</footer>

</body>
</html>
