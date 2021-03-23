<?php
 include('header.php');
// include('navbar.php');

$result = -3;

// $delivery = $_POST['delivery'];

// echo $delivery;

// sesssion exist
if(!isset($_SESSION['prenom']) || empty($_SESSION['prenom'])){
    $result = 1;
    echo $result;  

 }else{
    //session exist and basket not empty
    if(isset($_SESSION['prenom']) || !empty($_SESSION['prenom']) || isset($_SESSION['panier'])){ 
        $result = 2;
        echo $result;
        
    }
    else{
        $result = 3;
        echo $result;
    } 

}


// //session exist but basket is empty  
// else if(isset($_SESSION['panier'])){
//     $result = 3;
//     echo $result;
//     }

?>
