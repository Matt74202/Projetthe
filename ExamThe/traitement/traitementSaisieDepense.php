<?php
include('../fonction/fonction (1).php');
if(isset($_POST['date']) && isset($_POST['categorie']) && isset($_POST['montant']) ){
            $date=$_POST['date'];
             $categorie = $_POST['categorie'];
             $montant = $_POST['montant'];
             insertSaisieDepense($date,$categorie,$montant);
           header('location:../page/indexUser.php');
}
?>