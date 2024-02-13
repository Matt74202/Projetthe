<?php 
include("connexion.php");

function checkLogin($nom, $mdp, $type)
{
    $sql = "SELECT * FROM ".$type." WHERE nom=? AND mdp=?";
    $stmt = mysqli_prepare(dbconnect(), $sql);
    mysqli_stmt_bind_param($stmt, "ss", $nom, $mdp);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    return $row ? true : false;
}

function getAll($type)
{
    $sql = "SELECT * FROM ".$type;
    $res = mysqli_query(dbconnect(), $sql);
    $tab = array();
    while ($donnees = mysqli_fetch_assoc($res)) 
    {
        $tab[] = $donnees;
    }
    mysqli_free_result($res);
    return $tab;
}

function delete($id, $type)
{
    $sql = "DELETE FROM ".$type." WHERE id=?";
    $stmt = mysqli_prepare(dbconnect(), $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function insertParcelle($surface, $idThe)
{
    $sql = "INSERT INTO t_parcelle (surface, idThe) values (?, ?)";
    $stmt = mysqli_prepare(dbconnect(), $sql);
    mysqli_stmt_bind_param($stmt, "ii", $surface, $idThe);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function insertThe($nom, $occupation, $rendement)
{
    $sql = "INSERT INTO t_the (nom, occupation, rendement) values (?, ?, ?)";
    $stmt = mysqli_prepare(dbconnect(), $sql);
    mysqli_stmt_bind_param($stmt, "sdd", $nom, $occupation, $rendement);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function insertCueilleurs($nom, $genre, $dtn)
{
    $sql = "INSERT INTO t_cueilleur (nom, genre, dtn) values (?, ?, ?)";
    $stmt = mysqli_prepare(dbconnect(), $sql);
    mysqli_stmt_bind_param($stmt, "sss", $nom, $genre, $dtn);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function insertDepense($categorie)
{
    $sql = "INSERT INTO t_depense (categorie) values (?)";
    $stmt = mysqli_prepare(dbconnect(), $sql);
    mysqli_stmt_bind_param($stmt, "s", $categorie);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function insertSalaire($salaire)
{
    $sql = "INSERT INTO t_salaire (salaire) values (?)";
    $stmt = mysqli_prepare(dbconnect(), $sql);
    mysqli_stmt_bind_param($stmt, "d", $salaire);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function getParcelleThe($numero)
{
    $sql = "SELECT * FROM view_parcelle_the WHERE numero=?";
    $stmt = mysqli_prepare(dbconnect(), $sql);
    mysqli_stmt_bind_param($stmt, "i", $numero);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $tab = array();
    while ($donnees = mysqli_fetch_assoc($res)) 
    {
        $tab[] = $donnees;
    }
    mysqli_stmt_close($stmt);
    return $tab;
}

function calculRendementTotal($numero)
{
    $pt = getParcelleThe($numero);
    $pied = ($pt['surface'] * 10000) * $pt['occupation'];
    $rdm = $pied * $pt['rendement'];
    return $rdm;
}

function getDatesAvant($date)
{
    $sql = "SELECT * FROM t_saisieDepense WHERE MONTH(date) = MONTH(?) AND DATE(date) != CURDATE() ORDER BY date ASC";
    $stmt = mysqli_prepare(dbconnect(), $sql);
    mysqli_stmt_bind_param($stmt, "s", $date);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $tab = array();
    while ($donnees = mysqli_fetch_assoc($res)) 
    {
        $tab[] = $donnees;
    }
    mysqli_stmt_close($stmt);
    return $tab;
}

function calculResteRendement($date, $numero)
{
    $rdm = calculRendementTotal($numero);
    $depense = getDatesAvant($date);
    foreach ($depense as $d) {
        $rdm -= $d['montant'];
    }
    return $rdm;
}

function checkRendement($idParcelle, $date, $poids)
{
    $reste = calculResteRendement($date, $idParcelle);
    if ($poids >= $reste) {
        return true;
    }
    return false;
}

// Les autres fonctions sont similaires et ont également été corrigées. Assurez-vous de les vérifier pour vous assurer qu'elles fonctionnent correctement avec votre base de données.
function insertCueillette($date, $idCueilleur, $idParcelle, $poids)
{
    $sql = "INSERT INTO t_cueillette (date, idCueilleur, idParcelle, poids) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare(dbconnect(), $sql);
    mysqli_stmt_bind_param($stmt, "siii", $date, $idCueilleur, $idParcelle, $poids);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function insertSaisieDepense($date, $idCueilleur, $idParcelle, $poids)
{
    $sql = "INSERT INTO t_saisieDepense (date, idCueilleur, idParcelle, poids) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare(dbconnect(), $sql);
    mysqli_stmt_bind_param($stmt, "siii", $date, $idCueilleur, $idParcelle, $poids);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function getCueilletteBetween($date1, $date2)
{
    $sql = "SELECT * FROM t_cueillette WHERE date BETWEEN ? AND ?";
    $stmt = mysqli_prepare(dbconnect(), $sql);
    mysqli_stmt_bind_param($stmt, "ss", $date1, $date2);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $tab = array();
    while ($donnees = mysqli_fetch_assoc($res)) 
    {
        $tab[] = $donnees;
    }
    mysqli_stmt_close($stmt);
    return $tab;
}

function getPoidsTotalCueillette($date1, $date2)
{
    $poids = 0;
    $cueillettes = getCueilletteBetween($date1, $date2);
    foreach ($cueillettes as $c) {
        $poids += $c['poids'];
    }
    return $poids;
}

// Les autres fonctions (getCueilletteParBetween, poidsRestant, getPoidsRestant, getDepenseTotal) ont été corrigées de manière similaire. Assurez-vous de les vérifier pour vous assurer qu'elles fonctionnent correctement avec votre base de données.
function getCueilletteParBetween($date1, $date2)
{
    $sql = "SELECT * FROM v_parcelle_cueillette WHERE date BETWEEN ? AND ?";
    $stmt = mysqli_prepare(dbconnect(), $sql);
    mysqli_stmt_bind_param($stmt, "ss", $date1, $date2);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $tab = array();
    while ($donnees = mysqli_fetch_assoc($res)) 
    {
        $tab[] = $donnees;
    }
    mysqli_stmt_close($stmt);
    return $tab;
}

function poidsRestant($date1, $date2, $idParcelle)
{
    $cpar = getCueilletteBetween($date1, $date2);
    $total = calculRendementTotal($idParcelle);
    foreach ($cpar as $c) {
        $total -= $c['poids'];
    }
    return $total;
}

function getPoidsRestant($date1, $date2)
{
    $allPar = getAll("t_parcelle");
    $poids = 0;
    foreach ($allPar as $par) {
        $poids += $par['poids'];
    }
    return $poids;
}

function getDepenseTotal($date1, $date2)
{
    $sql = "SELECT * FROM t_saisieDepense WHERE date BETWEEN ? AND ?";
    $stmt = mysqli_prepare(dbconnect(), $sql);
    mysqli_stmt_bind_param($stmt, "ss", $date1, $date2);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $tab = array();
    while ($donnees = mysqli_fetch_assoc($res)) 
    {
        $tab[] = $donnees;
    }
    mysqli_stmt_close($stmt);
    $depense = 0;
    foreach ($tab as $d) {
        $depense += $d['montant'];
    }
    return $depense;
}

?>
