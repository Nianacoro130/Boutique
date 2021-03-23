<?php
 
Class Panier {
    public function __construct()
    {
        if(!isset($_SESSION)){
            session_start();
        }
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array();
        }

        if(isset($_GET['delPanier'])){
            $this->del($_GET['delPanier']);
        }

        
    }


    public function count(){
        return array_sum($_SESSION['panier']);
    }

    public function Livraison(){
    //     $type= 0;


     }
    
   
    public function total(){
        $total = 0;
        $db = new DB();
        $ids = array_keys($_SESSION['panier']);
        if(empty($ids)){
            $prod = array();
        }else{
        $prod = $db->query('SELECT id , prix FROM produits WHERE id IN ('.implode(',',$ids).')');
        }
        foreach ($prod as  $pro) {
            $total += $pro->prix* $_SESSION['panier'][$pro->id];
        }
        return $total;
    }


    public function add($prod_id){
        if(isset( $_SESSION['panier'][$prod_id])){
            $_SESSION['panier'][$prod_id]++;  
        }else{
            $_SESSION['panier'][$prod_id] = 1;
        }
       
    }

    public function del($prod_id){
        unset($_SESSION['panier'][$prod_id]);
    }
}

?>