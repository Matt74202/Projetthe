<?php

include("../fonction/fonction (1).php");

if($_POST['type'] == 0){ //admin
    if(isset($_POST['nom']) && isset($_POST['mdp']) && !empty($_POST['nom']) && !empty($_POST['mdp'])){
        echo($_POST['nom']);
         $nom = $_POST['nom'];
        $mdp = $_POST['mdp'];
        $type = "t_admin";
         if(checkLogin($nom,$mdp,$type)){
            //echo("OUEEE");
            header('location:../page/indexAdmin.php');
             // Arrêt de l'exécution du script après la redirection
        } else {
            //echo("noooooo!!!");
            header('location:../page/loginAdmin.php?error=Veuillez réessayer');
            //exit(); // Arrêt de l'exécution du script après la redirection
        }
    }
} 
else { //user
     if(isset($_POST['nom']) && isset($_POST['mdp']) && !empty($_POST['nom']) && !empty($_POST['mdp'])){
        echo($_POST['nom']); 
        $nom = $_POST['nom'];
         $mdp = $_POST['mdp'];
         $type = "t_user";
         if(checkLogin($nom,$mdp,$type)){
            //echo("YEYYEEEEEEE");
              header('location:../page/indexUser.php');
//             exit(); // Arrêt de l'exécution du script après la redirection
        } else {
            //echo("NOOOOOOOOOOO!!!!!!!!!");
            header('location:../page/login.php?error=Veuillez réessayer');
            
        }
    
}}
?>
