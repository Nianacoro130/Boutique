<?php
    $pdo = getPdo();
    $reponse = $pdo->query('SELECT * FROM produits' );
    $tout =  $pdo->query('SELECT * FROM produits' );
?>

<!-- Portfolio Section-->
<section class="page-section portfolio" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Articles</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">
                <?php while ($donnees = $reponse->fetch()){ ?>
                    <!-- Portfolio Item 1-->                
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#monModalA<?php echo  $donnees['id'];?>">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="<?php echo $donnees['image'] ; ?> " alt="" />
                        </div>
                    </div>
                    <?php    

}    
 $reponse->closeCursor(); // Termine le traitement de la requête
?> 
                </div>   
            </div>

</section>
<?php
 while ($donn = $tout->fetch()){ ?>
        <div class="portfolio-modal modal fade" id="monModalA<?php echo $donn['id'];?>" tabindex="-1" role="dialog"   aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
        <form id="formP" name="formP" method="POST">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0" ><?php echo $donn['titre'] ; ?></h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image-->
                                <img class="img-fluid rounded mb-5" src="<?php echo $donn['image'] ; ?>" alt="" />
                                <!-- Portfolio Modal - Text-->
                                <p class="mb-3"><?php echo $donn['description'] ; ?></p>
                                <p class="mb-5"><?php echo $donn['prix'];?>€</p>
                                <!-- <button type='submit' class="btn btn-primary">ajouter au panier</button>  -->
                                <a class="add addPanier" href="monpanier.php?id=<?= $donn['id']; ?>">AJOUTER PANIER</a>
                                <!-- <button  data-dismiss="modal">
                                    <i class="fas fa-times fa-fw"></i>
                                    Close Window
                                </button> -->  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
    <?php    

}    
 $tout->closeCursor(); // Termine le traitement de la requête
?> 
    
            