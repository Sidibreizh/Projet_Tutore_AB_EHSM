<?php require_once ('inc/verif.login.php'); ?>

<!DOCTYPE html>
<!-- ***** Header Area Start ***** -->
<?php include('inc/header.php'); ?>
<!-- ***** Header Area End ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/chatconnecte.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Accédez à votre <em>Compte</em></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- ***** Features Item Start ***** -->
<section class="section" id="features">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2>Se <em> Connecter</em></h2>
                    <img src="assets/images/line-dec.png" alt="waves">
                    <?php echo $contenu ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Features Item End ***** -->

<!-- ***** Contact Us Area Starts ***** -->

<section class="section" id="contact-us" style="margin-top: 0">
    <div class="container-fluid">
        <div id="container">
            <form action="" method="POST">
                <label><b>Nom d'utilisateur</b></label>
                    <input type="text" placeholder="Entrer le nom d'utilisateur" name="pseudoCompte" required>

                <label><b>Mot de passe</b></label>
                    <input type="password" placeholder="Entrer le mot de passe" name="mdpCompte" required>

                <input type="submit" id='form-submit' class="main-button" value='SE CONNECTER'>
                <p>Nouveau Client ? <a href="add_user.php"> Créez votre compte</a></p>
            </form>
        </div>
    </div>
</section>
<!-- ***** Contact Us Area Ends ***** -->

<!-- ***** Footer Start ***** -->
<?php include('inc/footer.php'); ?>

</body>
</html>