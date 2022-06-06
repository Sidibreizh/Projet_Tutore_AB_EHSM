<?php require_once("inc/init.inc.php");

if(isset($_GET['idSsCategorie']))
{
    $resultat = executeRequete("SELECT idProduit, idCategorie, nom, prix, description, photo FROM `produit` WHERE idSsCategorie = '$_GET[idSsCategorie]'");
    $resultat2 = executeRequete("SELECT nomSsCategorie, nomCategorie FROM souscategorie_produit JOIN  categorie_produit USING (idCategorie) WHERE idSsCategorie = '$_GET[idSsCategorie]'");
}
if($resultat->num_rows <= 0)
{
    header("location:products.php");
    exit();
}

while($produit = $resultat->fetch_assoc())
{
    $contenu .= '<div class="col-lg-4">';
    $contenu .= "<a href=\"products-detail.php?idProduit=$produit[idProduit]\">";
    $contenu .= '<div class="trainer-item">';
    $contenu .= '<div class="image-thumb">';
    $contenu .= "<img src=\"$produit[photo]\">";
    $contenu .= '</div>';
    $contenu .= '<div class="down-content">';
    $contenu .= '<br>';
    $contenu .= '<span>';
    $contenu .= "<sup>€</sup>$produit[prix]";
    $contenu .= '</span>';
    $contenu .= "<h4>$produit[nom]</h4>";
    $contenu .= "<p>$produit[description]</p>";
    $contenu .= '<ul class="social-icons">';
    $contenu .= '<li><a href="#">+ Voir</a></li>';
    $contenu .= '</ul>';
    $contenu .= '</div>';
    $contenu .= '</div>';
    $contenu .= '</a>';
    $contenu .= '</div>';
}
$titre = $resultat2->fetch_assoc();
$contenu2 = "<h2>$titre[nomCategorie] : <em>$titre[nomSsCategorie]</em></h2>";

if ($_GET['idSsCategorie'] == 1 || $_GET['idSsCategorie'] == 2)
{
    $contenu3 = '<section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/photo_alimentation.jpeg)">';
}
elseif ($_GET['idSsCategorie'] == 3 || $_GET['idSsCategorie'] == 4 || $_GET['idSsCategorie'] == 5)
{
    $contenu3 = '<section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/istockphoto-1164853312-170667a.jpg)">';
}
elseif ($_GET['idSsCategorie'] == 6 || $_GET['idSsCategorie'] == 7 || $_GET['idSsCategorie'] == 8)
{
    $contenu3 = '<section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/Photo_soin.jpg)">';
}
elseif ($_GET['idSsCategorie'] == 9 || $_GET['idSsCategorie'] == 10)
{
    $contenu3 = '<section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/Photo_arbre.jpg)">';
}
else
{
    $contenu3 = '<section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/Photo_jouets.jpg)">';
}

?>

<!DOCTYPE html>
<!-- ***** Header Area Start ***** -->
<?php include('inc/header.php'); ?>
<!-- ***** Header Area End ***** -->

<!-- ***** Call to Action Start ***** -->
<?php echo $contenu3 ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <?php echo $contenu2 ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Call to Action End ***** -->

<!-- ***** Fleet Starts ***** -->
<section class="section" id="trainers">
    <div class="container">
        <br>
        <br>

        <div class="row">

            <?php echo $contenu ?>

        </div>

    </div>
</section>
<!-- ***** Fleet Ends ***** -->

<!-- ***** Footer Start ***** -->
<?php include('inc/footer.php'); ?>

</body>
</html>