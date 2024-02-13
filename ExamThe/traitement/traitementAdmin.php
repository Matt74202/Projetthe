<?php 
    include '../fonction/fonction (1).php';
    if($_POST['link'] == 0){ //variete
        if(isset($_POST['nom']) && isset($_POST['occupation']) && isset($_POST['rendement'])){
            $nom=$_POST['nom'];
            $occupation=$_POST['occupation'];
            $rendement=$_POST['rendement'];
            insertThe($nom,$occupation,$rendement);
            header('location: ../page/indexAdmin.php');
        }
    } elseif ($_POST['link'] == 1){ //parcelle
        if(isset($_POST['surface']) && isset($_POST['variete'])){
            $surface=$_POST['surface'];
            $idThe=$_POST['variete'];
            insertParcelle($surface,$idThe);
            header('location: ../page/indexAdmin.php');
        }
    } elseif ($_POST['link'] == 2){ //cueilleurs
        if(isset($_POST['nom']) && isset($_POST['genre']) && isset($_POST['dtn'])){
            $nom=$_POST['nom'];
            $genre=$_POST['genre'];
            $dtn=$_POST['dtn'];
            insertCueilleurs($nom,$genre,$dtn);
            header('location: ../page/indexAdmin.php');
        }
    } elseif ($_POST['link'] == 3){ //depense
        if(isset($_POST['nomcat'])){
            $categorie=$_POST['nomcat'];
            insertDepense($categorie);
            header('location:../page/indexAdmin.php');
        }
    } elseif ($_POST['link'] == 4){ //salaire
        
       if(isset($_POST['salaire'])){
             
             $salaire=$_POST['salaire'];
             insertSalaire($salaire);
             header('location: ../page/indexAdmin.php');
         }
     }
