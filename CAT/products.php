<?php require_once ("inc/init.inc.php");

$donnees = executeRequete("SELECT idProduit, idCategorie, nom, prix, description, photo FROM `produit` order by prix");
while($produit = $donnees->fetch_assoc())
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
?>

<!DOCTYPE html>
<!-- ***** Header Area Start ***** -->
<?php include('inc/header.php'); ?>
<!-- ***** Header Area End ***** -->

<!-- ***** Call to Action Start ***** -->
<section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/tous_les_produits2.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2>Tous les <em>produits</em></h2>
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