<?php include('navbar.php'); ?> 

<br><br><br><br>
<?php
$result = -3;
 
if(!isset($_SESSION['prenom']) || empty($_SESSION['prenom'])){
  ?><div class="alert alert-danger" role="alert">
  Vous devez être connecté pour finaliser la commande ! <a href="panier.php" data-toggle="modal" data-target="#myModal"  class="alert-link">voir Panier </a>
</div><?php
  exit();
  }else{
        if(empty($_SESSION['panier']) || empty($_POST['delivery'])){ 
          ?><div class="alert alert-danger" role="alert">
          Votre panier est vide et/ou vous n'avez pas choisie de mode de livraison ! <a href="panier.php" data-toggle="modal" data-target="#myModal"  class="alert-link">voir Panier </a>
          </div><?php
          exit();
        }else{
              if (isset($_POST['delivery'])){
                  $prixd = 0;
                  $choix = $_POST['delivery'];
                  if ($choix == "Gratuit"){
                    $prixd = 0;
                  }
                  if ($choix== "Relais"){
                    $prixd = 3;
                  }
                  if ($choix== "Express"){
                    $prixd = 7;
                  }
                }
              }
  }

 ?>
<?php   $db = new DB();
      $ids = array_keys($_SESSION['panier']);
      if(empty($ids)){
          $prod = array();
      }else{
      $prod = $db->query('SELECT * FROM produits WHERE id IN ('.implode(',',$ids).')');
      }
      ?>

<div class="container-recap" id="contrecap">
  <div class="card-header recapitulatif">
     <h4><center>Recapitulatif de la commande</center></h4>
  </div>
  <div class="card-body">
    <div class="card-header client"><h5><center>Informations personnelles</center></h5>
      <p class="card-text nom"><?= $_SESSION['nom']; ?></p>
      <p class="card-text prenom"><?= $_SESSION['prenom']; ?></p>
      <p class="card-text address"><?= $_SESSION['adresse']; ?></p>
      <p class="card-text addres"><?=$_SESSION['codePostal'].",  ".$_SESSION['ville']; ?>
      <p class="card-text mail"><?= $_SESSION['email'];?></p>
      <p class="card-text num"><?= $_SESSION['numero'];?></p>
    </div>
    <div class="card-header livraison"><h5><center>Adresse de livraison</center></h5>
      <p class="card-text adressL"><?=  $_SESSION['adresse'] ; ?></p>
      <p class="card-text addresL"><?=$_SESSION['codePostal'].",  ".$_SESSION['ville'];?></p>
    </div>
    <div class="card-header panier"><h5><center>Articles</center></h5>
      <?php  foreach($prod as $pro): ?>
      <p class="card-text titre ">produit :<?= $pro->titre.", prix à l'unité : ".$pro->prix ;?>€</p>
     
      <?php endforeach; ?>
    </div>
    <div class="card-header total"><h5><center>Total</center></h5>
      <p class="card-text total-article">Total TTC <?= $panier->total();?>€</p>
      <p class="card-text total-article">Methode de livraison : <?= $choix."  ,prix:  ".$prixd ;?>€</p> 
      <p class="card-text total-livraison"> Total à Payer <?= $panier->total()+$prixd;?>€</p>
    </div> 
    <div class="card-text total-paye">
       <button type="submit" name="paie">Payer</button>
    </div>
  </div>
  
</div>
  

<?php 
include('footer.php');


//   echo $_SESSION['prenom'] ;
//    print_r ($_SESSION['panier']) ;
//    echo  $panier->total();


//    if(isset($_POST['delivery'])){
//       echo "ta choisie:". $_POST['delivery'];
//    } 
   
//  $comma_separated = implode(",",$_SESSION['panier'][0]);



  // echo " TON PRENOM :". $_SESSION['prenom']."\n";
  //   // print_r ($_SESSION['panier']) ;

  //   echo "choice delivery:". $_POST['delivery']."\n";

  //   // echo "TOTAL:". $_POST['paniertotal'];
   

  //   //  echo "le prix ave delivery:". $panier->total()+$prixd;


?>