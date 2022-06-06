<?php require_once ('inc/verif.products.php'); ?>

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
<section class="section">
    <div class="container">
        <br>
        <br>

        <div class="row">
            <div class="col-md-8">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <?php echo $contenu?>
                        </div>
                        <div class="carousel-item">
                            <?php echo $contenu?>
                        </div>
                        <div class="carousel-item">
                            <?php echo $contenu?>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <br>
            </div>

            <div class="col-md-4">
                <div class="contact-form">
                    <form action="cart.php" method="POST" name="ajouter_panier">
                        <div class="form-group">
                            <?php echo $contenu1?>
                        </div>

                        <label>Options</label>

                        <select>
                            <option value="0">Extra A</option>
                            <option value="1">Extra B</option>
                            <option value="2">Extra C</option>
                        </select>

                        <div class="row">
                            <div class="col-md-6">
                                <label>Quantité</label>
                                <?php echo $contenu4 ?>
                            </div>
                        </div>
                        <div class="main-button">
                            <?php echo $contenu5 ?>
                        </div>
                    </form>
                </div>

                <br>
            </div>
        </div>
    </div>
</section>
<!-- ***** Fleet Ends ***** -->

<!-- ***** Footer Start ***** -->
<?php include('inc/footer.php'); ?>
</body>
</html>