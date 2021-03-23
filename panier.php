<?php include('navbar.php');?>
<br><br><br>
<!--?php var_dump($_SESSION) ;?-->

  <main>
    <div class="basket">
      <!--div class="basket-module">
        <label for="promo-code">Enter a promotional code</label>
        <input id="promo-code" type="text" name="promo-code" maxlength="5" class="promo-code-field">
        <button class="promo-code-cta">Apply</button>
      </div--->
      <div class="basket-labels">
        <ul>
          <li class="item item-heading">ARTICLES</li>
          <li class="price">PRIX</li>
          <li class="quantity">QUANTITE</li> 
          <li class="subtotal">TOTAL</li>
        </ul>
      </div>
      <?php 
      $db = new DB();
      $ids = array_keys($_SESSION['panier']);
      if(empty($ids)){
          $prod = array();
      }else{
      $prod = $db->query('SELECT * FROM produits WHERE id IN ('.implode(',',$ids).')');
      }
      foreach($prod as $pro):
      ?>
      <div class="basket-product">
        <div class="item">
          <div class="product-image">
            <img src="<?= $pro->image ;?>"  alt="Placholder Image 2" class="product-frame">
          </div>
          <div class="product-details">
            <h4><strong><span class="item-quantity"><?= $_SESSION['panier'][$pro->id]; ?></span> x </strong><?= $pro->titre ;?></h4>
            <p><?= $pro->description;?></p>
          </div>
        </div>
        <div class="price"><?= $pro->prix ;?></div>
        <div class="quantity">
          <input type="number" value="<?= $_SESSION['panier'][$pro->id]; ?>" min="1" class="quantity-field">
        </div>
        <div class="subtotal"><?= $pro->prix ;?></div>
        <div class="remove">
          <a href="panier.php?delPanier=<?= $pro->id ;?>" class="del" >Supprimer</a>
        </div>
      </div>
       <?php endforeach; ?>
    </div>
    <aside><br><br>
    <form action="recapitulatif.php" method="POST">
      <div class="summary">
        <div class="summary-total-items" name="summary"><span class="total-items"><br></span> Article(s) dans mon panier</div>
        <div class="summary-subtotal">
          <div class="subtotal-title">Total net HT</div>
          <div class="subtotal-value final-value" id="basket-subtotal"><?=$panier->total();?></div>
        </div>
        <div class="summary-delivery">
          <select name="delivery" id="delivery" class="summary-delivery-selection">
             <option value="0" selected="selected">Mode de Livraison</option>
             <option value="Gratuit">Livraison Gratuit</option>
             <option value="Relais">Livraison Relais</option>
             <option value="Express">Livraison Express</option>
          </select>
        </div>
        </form>
        <div class="summary-total">
          <div class="total-title">Total TTC</div>
          <div class="total-value final-value" name="paniertotal" id="basket-total"><?= $panier->total();?></div>
        </div>
        <div class="summary-checkout">
          <button type="submit" name="validerC" class="checkout-cta">COMMANDE</button>
        </div>
      </div>
      </form>
    </aside>
  </main>
<br><br>

<div class="modal fade"  id="ErreurMOrder"  tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="ErrorOrder">
        Vous devez être connecté pour finaliser la commande ! 
      </div>
    </div>
  </div>
</div>

<div class="modal fade "  id="ErreurBasket"  tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="ErrorOrder">
        Une Erreur c'est produite ! 
      </div>
    </div>
  </div>
</div> 
 
<?php include('footer.php'); ?>