<?php require_once ('inc/verif.cart.php'); ?>
<!DOCTYPE html>
<!-- ***** Header Area Start ***** -->
<?php include('inc/header.php'); ?>
<!-- ***** Header Area End ***** -->

<!-- ***** Call to Action Start ***** -->
<section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/chat-panier.jpg)"
         xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2>Votre<em> Panier</em></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Call to Action End ***** -->

<!-- ***** Fleet Starts ***** -->
<section class="section" id="trainers">
    <div class="container">
        <div class="Cart-Items">
            <br><br>
            <form class="box" action="" method="post">
                <table>
                    <tr>
                        <th style="text-align:left">Article</th>
                        <th></th>
                        <th style="text-align:left">Quantité</th>
                        <th style="text-align:left">Prix unitaire</th>
                        <th style="text-align:left">Prix</th>
                        <th></th>
                    </tr>
                    <?php echo $contenu?>
        </div>
    </div>
</section>

<!-- ***** Fleet Ends ***** -->

<!-- ***** Footer Start ***** -->
<?php include('inc/footer.php'); ?>

</body>
</html>
