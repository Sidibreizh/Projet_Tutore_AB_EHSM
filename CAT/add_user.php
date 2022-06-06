<?php require_once ('inc/verif.add.php'); ?>

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
                    <h2>Créez votre <em>Compte</em></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** subcribe ***** -->

    <!-- ***** Features Item Start ***** -->
    <section class="section" id="features">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>S'<em>enregistrer</em></h2>
                        <img src="assets/images/line-dec.png" alt="waves">
                        <?php echo $contenu ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Item End ***** -->
<section class="section" id="contact-us" style="margin-top: 0">
    <div class="container-fluid">
        <div id="container">
            <form class="box" action="" method="post">
                <input type="text" class="box-input" name="nomClient" maxlength="20"
               placeholder="Nom" required />

                <input type="text" class="box-input" name="prenomClient" maxlength="20"
               placeholder="Prénom" required />

                <input type="text" class="box-input" name="adresseClient" maxlength="50"
                       placeholder="Adresse" required />

                <input type="number" class="box-input" name="CodePostalClient" maxlength="5"
               placeholder="Code postal" pattern="[0-9]{5}" title="5 chiffres requis : 0-9" required />

                <input type="text" class="box-input" name="villeClient"
               placeholder="Ville" pattern="[a-zA-Z0-9-_.]{3,15}" title="Caractères acceptés : a-z A-Z 0-9-_." required />

                <input type="text" class="box-input" name="paysClient" maxlength="20"
               placeholder="Pays" required />

                <input type="email" class="box-input" name="emailClient" maxlength="30"
               placeholder="Email" required />

                <input type="number" class="box-input" name="telClient" maxlength="12"
               placeholder="Numéro de téléphone" required />

                <input type="text" class="box-input" name="pseudoCompte" maxlength="20"
               placeholder="Nom d'utilisateur" pattern="[a-zA-Z0-9-_.]{1,20}" title="Caractères acceptés : a-z A-Z 0-9-_." required />

                <input type="password" class="box-input" name="mdpCompte" maxlength="20"
               placeholder="Mot de passe" required />

                <input type="submit" name="submit" value="+ Ajouter" class="box-button" />
            </form>
        </div>
    </div>
</section>

<!-- ***** Footer Start ***** -->
<?php include('inc/footer.php'); ?>

</body>
</html>
