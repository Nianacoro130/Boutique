<?php
session_start();
include('librairies/bdd.php');

// include('js/register.js');


$result = -300;
/*
100= succes
0= il faut remplir tous les champs
-1= email existant 
-2= mot de passe saisies ne sont pas identiques
-3= default
*/

//  var_dump($_REQUEST);

if(isset ($_POST['nom']) && !empty($_POST['nom'])&& 
isset ($_POST['prenom']) && !empty($_POST['prenom']) && isset ($_POST['adresse']) && !empty($_POST['adresse'])&& 
isset ($_POST['ville']) && !empty($_POST['ville']) && isset ($_POST['codePostal']) && !empty($_POST['codePostal'])&&
isset ($_POST['numero']) && !empty($_POST['numero']) && isset ($_POST['email']) && !empty($_POST['email'])&& 
isset ($_POST['motdepasse']) && !empty($_POST['motdepasse']) && isset ($_POST['mdpcomfirm']) && !empty($_POST['mdpcomfirm'])){
    
        $pdo =getPdo();

        $nom = htmlentities($_POST['nom']);
        $prenom = htmlentities($_POST['prenom']);
        $adresse = $_POST['adresse'];
        $ville = $_POST['ville'];
        $codePostal = $_POST['codePostal'];
        $numero = $_POST['numero'];
        $email =  filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $motdepasse = $_POST['motdepasse'];
        $mdpcomfirm = $_POST['mdpcomfirm'];
        //  $dateIns = $_POST['dateIns'];

        // if(empty($nom && $prenom && $adresse && $ville && $codePostal && $numero  && $email && $motdepasse && $mdpcomfirm)){
        //     $result = 000;
        //     echo $result;
        // }
        $motdepasse == $mdpcomfirm; 
      
        

            $reqmembre = $pdo->prepare('SELECT * FROM user WHERE email = ? ');
            $reqmembre->execute(array($email));
            $membreexist = $reqmembre->rowCount();

            $membreexist == 0;

        if ($membreexist != 0 ) {
        
            $membreinfo = $reqmembre->fetch();
            // echo "email deja exitant dans la bdd";
            $result = -1;
            echo $result;
        }
        else{
             
                
                if( $motdepasse != $mdpcomfirm){
                        // echo "les mot de passe sont pas identique";
                        $result = -2;
                        echo $result;
                }    
                
        

            else if( $membreexist == 0 && $motdepasse == $mdpcomfirm){
            
            
                // $pass =  password_hash($motdepasse,PASSWORD_DEFAULT);
                // $dateIns = date("Y-m-d");                   
                $enregistrer= $pdo->query("INSERT INTO user (nom,prenom,adresse,ville,codePostal,numero,email,motdepasse,dateIns) VALUES ('$nom', '$prenom', '$adresse','$ville','$codePostal','$numero','$email', '$motdepasse',NOW())")or die($pdo->error);
                // $membreinfo = $reqmembre->fetch();
                //     $_SESSION['id'] = $membreinfo['id'];
                //     $_SESSION['nom'] = $membreinfo['nom'];
                //     $_SESSION['prenom'] = $membreinfo['prenom'];
                //     $_SESSION['email'] = $membreinfo['email'];

                $result=1;
                echo $result;
            }
        }    
           
    }else{
        $result=0;
        echo $result;

    }
      

?>
