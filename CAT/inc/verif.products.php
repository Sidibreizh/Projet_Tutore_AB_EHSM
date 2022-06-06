<?php require_once("init.inc.php");

if (isset($_GET['idProduit']))
{
    $resultat = executeRequete("SELECT idProduit, idCategorie, nom, prix, description, photo FROM `produit` WHERE idProduit = '$_GET[idProduit]'");
    $resultat2 = executeRequete("SELECT imgSsCat FROM souscategorie_produit JOIN  produit USING (idSsCategorie) WHERE idProduit = '$_GET[idProduit]'");
    $resultat3 = executeRequete("SELECT quantite FROM stocks WHERE idProduit='$_GET[idProduit]'");
}
if ($resultat->num_rows <= 0)
{
    header("location:products.php");
    exit();
}

$produit = $resultat->fetch_assoc();
$contenu = "<img src=\"$produit[photo]\" height=\"400\" width=\"400\">";
$contenu1 = "<input type='hidden' name='idProduit' value='$produit[idProduit]'>";
$contenu1 .= "<p>$produit[description]</p>";
$contenu2 = "<h2>$produit[prix]<em><sup>€</sup></em></h2>";
$contenu2 .= "<p>$produit[nom]</p>";
$image = $resultat2->fetch_assoc();
$contenu3 = "<section class=\"section section-bg\" id=\"call-to-action\" style=\"background-image: url($image[imgSsCat])\">";

$stock = $resultat3->fetch_assoc();
if($stock['quantite'] == 0)
{
    $contenu4 = '<span><input type="number" placeholder="0" disabled><p>Ce produit n\'est plus disponible pour le moment :(</p></span>';
    $contenu5 = '<p></p>';
}
else
{
    $contenu4 = '<span><input type="number" id="nombre" name="nombre" value="1" required><p>'.$stock['quantite'].' en stock</p></span>';
    $contenu5 = "<input type=\"submit\" id='form-submit' name=\"ajout_panier\" class=\"main-button\" value='+Ajouter' style=\"padding-bottom: 17%; width: 45%\">";
}
?>