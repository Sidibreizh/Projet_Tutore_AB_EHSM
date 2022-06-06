<?php  require_once ("inc/init.inc.php");

$donnees = executeRequete("SELECT idSsCategorie, nomSsCategorie, imgSsCat, descriptionSsCat FROM `souscategorie_produit` where idCategorie = 3");
while($ss_cat = $donnees->fetch_assoc())
{
    $contenu .= '<div class="col-lg-4">';
    $contenu .= "<a href=\"products_ssCat.php?idSsCategorie=$ss_cat[idSsCategorie]\">";
    $contenu .= '<div class="trainer-item">';
    $contenu .= '<div class="image-thumb">';
    $contenu .= "<img src=\"$ss_cat[imgSsCat]\">";
    $contenu .= '</div>';
    $contenu .= '<div class="down-content">';
    $contenu .= '<br>';
    $contenu .= "<h4>$ss_cat[nomSsCategorie]</h4>";
    $contenu .= "<p>$ss_cat[descriptionSsCat]</p>";
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
<section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/Photo_soin.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2>So<em>in</em></h2>
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
