<?php
if(isset($_POST['parcelle']) && isset($_POST['date']) && isset($_POST['cueilleur']) && isset($_POST['poids'])){ //saisieDepense
            //$restePoids = calculRestePoids($_POST['date'],$_GET['idParcelle']);
            
            if(checkPoids($_POST['parcelle'],$_POST['date'],$_POST['poids']){
                insertCueillette($_POST['date'],$_POST['cueilleur'],$_POST['parcelle'],$_POST['poids']);
            }
            else {
                $erreur = "erreur";
                echo json_encode($erreur);
            }
}
    // elseif($_GET['choix']==1){ //saisieDepense
    //     if(isset($_GET['date']) && isset($_GET['user']) && isset($_GET['depense']) && isset($_GET['montant']) ){
    //           $date=$_GET['date'];
    //        $user=$_GET['user'];
    //         $depense = $_GET['depense'];
    //         $montant = $_GET['montant'];
    //        insertSaisieDepense($date,$user,$depense,$montant);
    //       header('location:indexUser.php');
    //     }
?>