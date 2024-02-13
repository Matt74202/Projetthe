<?php 
include("connexion.php");
    function checkLogin ($nom, $mdp, $type)
    {
        $sql="SELECT* FROM ".$type;
		$res= mysqli_query(dbconnect(), $sql);
		$result= array();
		while ($donnees=mysqli_fetch_assoc($res)) 
		{
			if ($nom==$donnees['nom'] && $mdp==$donnees['mdp']) 
			{
				return true;
			}
		}
        return false;
    }

    function getAll ($type)  //type= t_the, t_parcelle etc
    {
        $sql="SELECT* FROM ".$type;
		$res= mysqli_query(dbconnect(), $sql);
		while ($donnees=mysqli_fetch_array($res)) 
		{
			$tab[]=$donnees;
		}
		mysqli_free_result($res);
	    return $tab;
    }

    function delete ($id, $type)
    {
        $sql="DELETE* FROM ".$type." WHERE id=".$id;
        $res= mysqli_query(dbconnect(), $sql);
    }

    function insertParcelle ($surface, $idThe)
    {
        $sql="INSERT INTO t_parcelle values (null,%d, %d)";
		$SQL=sprintf($sql, $surface, $idThe);
		$res= mysqli_query(dbconnect(), $SQL);
    }

    function insertThe ($nom, $occupation, $rendement)
    {
        $sql="INSERT INTO t_the values (null, '%s', %d, %d)";
		$SQL=sprintf($sql, $nom, $occupation, $rendement);
		$res= mysqli_query(dbconnect(), $SQL);
    }

    function insertCueilleurs ($nom, $genre, $dtn)
    {
        $sql="INSERT INTO t_cueilleur values (null, '%s', '%s', '%s')";
		$SQL=sprintf($sql, $nom, $genre, $dtn);
		$res= mysqli_query(dbconnect(), $SQL);
    }

    function insertDepense ($categorie)
    {
        $sql="INSERT INTO t_depense values(null, '%s')";
		$SQL=sprintf($sql, $categorie);
		$res= mysqli_query(dbconnect(), $SQL);
    }

    function insertSalaire ($salaire)
    {
        $sql="INSERT INTO t_salaire values(%d)";
		$SQL=sprintf($sql, $salaire);
		$res= mysqli_query(dbconnect(), $SQL);
    }
    
    function getParcelleThe ($numero)
    {
        $sql="SELECT* FROM view_parcelle_the WHERE numero=".$numero;
		$res= mysqli_query(dbconnect(), $sql);
		while ($donnees=mysqli_fetch_array($res)) 
		{
			$tab[]=$donnees;
		}
		mysqli_free_result($res);
	    return $tab;
    }

    function calculRendementTotal ($numero)
    {
        $pt= getParcelleThe($numero);
        $pied= ($pt[0]['surface']*10000)/$pt[0]['occupation'];
        $rdm= $pied* $pt[0]['rendement'];
        return $rdm;
    }
   
//micheck an'ilay hoe superieur an'ilay kilos restants ve ilay alainy 
//ampiasaina amin'ilay mampiseho ny poids restant sur les parcelles a une date (resultat)

    function getDatesAvant ($date)
    { 
        $sql= "SELECT * FROM t_cueillette WHERE MONTH(date) = MONTH('".$date."') AND DATE(date) != '".$date."' ORDER BY date ASC";
        $res= mysqli_query(dbconnect(), $sql);
        $tab= array();
		while ($donnees=mysqli_fetch_array($res)) 
		{
			$tab[]=$donnees;
		}
		mysqli_free_result($res);
	    return $tab;
    }

    function calculRestePoids ($date, $numero)
    {
        $rdm= calculRendementTotal($numero);
        $cueillette= getDatesAvant($date);
        for ($i=0; $i<count($cueillette); $i++)
        {
            $rdm-= $cueillette[0]['poids'];
        }
        return $rdm;
    }

    function checkPoids ($idParcelle, $date, $poids)
    {
        $reste= calculRestePoids($date, $idParcelle);
        if ($poids>=$reste)
        { return true; }
        return false;
    }

    function insertCueillette ($date, $idCueilleur, $idParcelle, $poids)
    {
        $sql="INSERT INTO t_cueillette values(null, '%s', %d, %d, %d)";
		$SQL=sprintf($sql, $date, $idCueilleur, $idParcelle, $poids);
		$res= mysqli_query(dbconnect(), $SQL);
    }

///

    function insertSaisieDepense ($date,$iddepense,$montant)
    {
        $sql="INSERT INTO t_saisieDepense values(null, '%s', %d, %d)";
		$SQL=sprintf($sql, $date, $iddepense, $montant);
		$res= mysqli_query(dbconnect(), $SQL);
    }

///maka an'ilay hoe poids total cueillette
    function getCueilletteBetween ($date1, $date2)
    {
        $sql= "SELECT * FROM t_cueillette WHERE date between '%s' AND '%s'";
        $SQL=sprintf($sql, $date1, $date2);
        $res= mysqli_query(dbconnect(), $SQL);
		while ($donnees=mysqli_fetch_array($res)) 
		{
			$tab[]=$donnees;
		}
		mysqli_free_result($res);
	    return $tab;
    }

    function getPoidsTotalCueillette ($date1, $date2)
    {
        $poids= 0;
        $cueillettes= getCueilletteBetween($date1, $date2);
        for ($i=0; $i<count($cueillettes); $i++)
        {
            $poids += $cueillettes[$i]['poids'];
        }
        return $poids;
    }
///


    // function getCueilletteParBetween ($date1, $date2)
    // {
    //     $sql= "SELECT * FROM v_parcelle_cueillette WHERE date between '%s' AND '%s'";
    //     $SQL=sprintf($sql, $date1, $date2);
    //     $res= mysqli_query(dbconnect(), $SQL);
	// 	while ($donnees=mysqli_fetch_array($res)) 
	// 	{
	// 		$tab[]=$donnees;
	// 	}
	// 	mysqli_free_result($res);
	//     return $tab;
    // }

    // function poidsRestant ($date1, $date2, $idParcelle)
    // {
    //     $cpar= getCueilletteBetween($date1, $date2);
    //     $total= calculRendementTotal($idParcelle);
    //     for ($i=0; $i<count($cpar); $i++)
    //     {
    //         $total-= $cpar[$i]['poids'];
    //     }
    //     return $total;
    // }

///maka an'ilay poids restant sur tous les parcelles a la date fin (tsy ilaina ngamba)
    function getPoidsRestant ($datefin)
    {
        $allPar= getAll("t_parcelle");
        $poids= 0;
        for ($i=0; $i<count($allPar); $i++)
        {
            $reste= calculRestePoids($datefin, $allPar[$i]['numero']);
            $poids+= $reste;
        }
        return $poids;
    }

    function getDepenseTotal ($date1, $date2)
    {
        $sql= "SELECT * FROM t_saisieDepense WHERE date between '%s' AND '%s'";
        $SQL=sprintf($sql, $date1, $date2);
        $res= mysqli_query(dbconnect(), $SQL);
		while ($donnees=mysqli_fetch_array($res)) 
		{
			$tab[]=$donnees;
		}
		mysqli_free_result($res);
	    $depense=0;
        for ($i= 0; $i<count($tab); $i++)
        {
            $depense+= $tab[$i]['montant'];
        }
        return $depense;
    }
    
    function getPoids()
    {
        $sql= "SELECT * FROM t_poids";
        $res= mysqli_query(dbconnect(), $sql);
		while ($donnees=mysqli_fetch_array($res)) 
		{
			$tab[]=$donnees;
		}
		mysqli_free_result($res);
	    return $tab;
    }
    
    function getBonusMalus ($poids)
    {
        $p= getPoids();
        $min= $p[0];
        $malus= ($poids*$min['malus'])/100;
        $bonus= ($poids*$min['bonus'])/100;
        if ($poids<$min['minimal'])
        {
            return -1*$malus;
        }
        return $bonus;
    }

    function insertPaiement ($date, $idCueilleur, $poids, $bonus, $malus, $montant)
    {
        $sql="INSERT INTO t_paiement values(null, '%s', %d, %d, %d, %d)";
		$SQL=sprintf($sql, $date, $idCueilleur, $poids, $bonus, $malus, $montant);  
		$res= mysqli_query(dbconnect(), $SQL);
    }

    function getPaiementBetween ($date1, $date2)
    {
        $sql= "SELECT * FROM t_paiement WHERE date between '%s' AND '%s'";
        $SQL=sprintf($sql, $date1, $date2);
        $res= mysqli_query(dbconnect(), $SQL);
		while ($donnees=mysqli_fetch_array($res)) 
		{
			$tab[]=$donnees;
		}
		mysqli_free_result($res);
	    return $tab;
    }

    function getDepenseBetween ($date1, $date2)
    {
        $sql= "SELECT * FROM t_saisieDepense WHERE date between '%s' AND '%s'";
        $SQL=sprintf($sql, $date1, $date2);
        $res= mysqli_query(dbconnect(), $SQL);
		while ($donnees=mysqli_fetch_array($res)) 
		{
			$tab[]=$donnees;
		}
		mysqli_free_result($res);
	    return $tab;
    }

    function getPrixThe ($idThe)
    {
        $sql= "SELECT * FROM t_prix WHERE idThe=".$idThe;
        $res= mysqli_query(dbconnect(), $sql);
		while ($donnees=mysqli_fetch_array($res)) 
		{
			$tab[]=$donnees;
		}
		mysqli_free_result($res);
	    return $tab;
    }

    function getSaisonByThe()
    {
        $sql= "SELECT * FROM t_saison";
        $res= mysqli_query(dbconnect(), $sql);
		while ($donnees=mysqli_fetch_array($res)) 
		{
			$tab[]=$donnees;
		}
		mysqli_free_result($res);
	    return $tab;
    }
  

    
?>
