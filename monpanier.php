<?php include ('header.php'); 


$json = array('error'=> true);

if(isset($_GET['id'])) {
   $db = new DB();

    $prod = $db->query('SELECT id FROM produits WHERE id =:id', array('id'=> $_GET['id']));
 
    if(empty($prod)){
       $json['message']="Ce produit n'existe pas !";
    }

    // var_dump($prod);

    $panier->add($prod[0]->id);
    $json['error']= false;
    // $json['total']= $panier->total();

    $json['message']="L'article a bien été ajouté au panier";
    

}else{
   $json['message']="Aucun produit n'a été selectionné pour être ajouté au panier ! ";
}
 
echo json_encode($json);
    


?>

