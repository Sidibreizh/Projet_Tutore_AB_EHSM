<?php
function executeRequete($req)
{
    global $mysqli;
    $resultat = $mysqli->query($req);
    if(!$resultat)
    {
        die("Erreur sur la requete sql.<br>Message : " . $mysqli->error . "<br>Code: " . $req);
    }
    return $resultat; //
}
//---------------------------------------------------
function debug($var, $mode = 1)
{
    echo '<div>';
    $trace = debug_backtrace();
    $trace = array_shift($trace);
    echo 'Debug demandé dans le fichier : $trace[file] à la ligne $trace[line].';

    if($mode === 1)
    {
        echo '<pre>'; print_r($var); echo '</pre>';
    }
    else
    {
        echo '<pre>'; var_dump($var); echo '</pre>';
    }
    echo '</div>';
}
//---------------------------------------------------
function internauteEstConnecte()
{
    if(!isset($_SESSION['compte_utilisateur']))
    {
        return false;
    }
    else
    {
        return true;
    }
}
//------------------------------------------------------------
function internauteEstConnecteEtEstAdmin()
{
if(internauteEstConnecte() && $_SESSION['compte_utilisateur']['idRole'] == 1)
{
    return true;
}
else
{
    return false;
}
}
//------------------------------------
function creationDuPanier()
{
    if(!isset($_SESSION['panier']))
    {
        $_SESSION['panier'] = array();
        $_SESSION['panier']['nom'] = array();
        //$_SESSION['panier']['idUtilisateur'] = array();
        $_SESSION['panier']['idProduit'] = array();
        $_SESSION['panier']['nombre'] = array();
        $_SESSION['panier']['prix'] = array();
        $_SESSION['panier']['photo'] = array();
    }
}
//------------------------------------
function ajouterProduitDansPanier($nom, $idProduit, $nombre, $prix, $photo)
{
    creationDuPanier();
    $position_produit = array_search($idProduit, $_SESSION['panier']['idProduit']);
    if($position_produit !== false)
    {
        $_SESSION['panier']['nombre'][$position_produit] += $nombre ;
    }
    else
    {
        $_SESSION['panier']['nom'][] = $nom;
        $_SESSION['panier']['idProduit'][] = $idProduit;
        $_SESSION['panier']['nombre'][] = $nombre;
        $_SESSION['panier']['prix'][] = $prix;
        $_SESSION['panier']['photo'][] = $photo;
    }
}
//------------------------------------
function montantTotal()
{
    $total=0;
    for($i = 0; $i < count($_SESSION['panier']['nom']); $i++)
    {
        $total += $_SESSION['panier']['nombre'][$i] * $_SESSION['panier']['prix'][$i];
    }
    return round($total,2);
}
//------------------------------------
function retirerProduitDuPanier($id_produit_a_supprimer)
{
    $position_produit = array_search($id_produit_a_supprimer,  $_SESSION['panier']['nom']);
    if ($position_produit !== false)
    {
        array_splice($_SESSION['panier']['nom'], $position_produit, 1);
        array_splice($_SESSION['panier']['idProduit'], $position_produit, 1);
        array_splice($_SESSION['panier']['nombre'], $position_produit, 1);
        array_splice($_SESSION['panier']['prix'], $position_produit, 1);
        array_splice($_SESSION['panier']['photo'], $position_produit, 1);
    }
}
//------------------------------------
?>