<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>CAT - Croquettes à temps</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />

</head>

<body>

<!-- ***** Preloader Start ***** -->
<div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- ***** Preloader End ***** -->


<!-- ***** Header Area Start ***** -->
<?php include('header.php'); ?>
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
<?php
require('./config.php');

if (isset($_REQUEST['name'], $_REQUEST['first_name'], $_REQUEST['adress'], $_REQUEST['postal_code'], $_REQUEST['town'], $_REQUEST['country'], $_REQUEST['email'], $_REQUEST['phone_number'], $_REQUEST['username'], $_REQUEST['password'])){
    //récupérer le nom
    $nomClient = stripslashes($_REQUEST['name']);
    $nomClient = mysqli_real_escape_string($conn, $nomClient);
    //récupérer le prénom
    $prenomClient = stripslashes($_REQUEST['first_name']);
    $prenomClient = mysqli_real_escape_string($conn, $prenomClient);
    //récupérer adresse
    $adresseClient = stripslashes($_REQUEST['adress']);
    $adresseClient = mysqli_real_escape_string($conn, $adresseClient);
    //récupérer code postal
    $postalCode = stripslashes($_REQUEST['postal_code']);
    $postalCode = mysqli_real_escape_string($conn, $postalCode);
    //récupérer ville
    $villeClient = stripslashes($_REQUEST['town']);
    $villeClient = mysqli_real_escape_string($conn, $villeClient);
    //récupérer le pays
    $paysClient = stripslashes($_REQUEST['country']);
    $paysClient = mysqli_real_escape_string($conn, $paysClient);
    //récupérer adresse mail
    $emailClient = stripslashes($_REQUEST['email']);
    $emailClient = mysqli_real_escape_string($conn, $emailClient);
    //récupérer le numéro de téléphone
    $telClient = stripslashes($_REQUEST['phone_number']);
    $telClient = mysqli_real_escape_string($conn, $telClient);
    // récupérer le nom d'utilisateur
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($conn, $username);
    // récupérer le mot de passe
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn, $password);


    $query = "INSERT into `utilisateur` (idRole, nomClient, prenomClient, adresseClient, telClient, emailClient, CodePostalClient, villeClient, paysClient)
          VALUES ('2', '$nomClient', '$prenomClient', '$adresseClient', '$telClient', '$emailClient', '$postalCode', '$villeClient', '$paysClient')";
    $res = mysqli_query($conn, $query);
    $select = mysqli_insert_id($conn);
 // "SELECT idUtilisateur from `utilisateur` where nomClient='".$nomClient."' and prenomClient='".$prenomClient."' and emailClient = '".$emailClient."'";
    $query2 = "INSERT into `compte_utilisateur` (idUtilisateur, pseudoCompte, mdpCompte) VALUES ('$select', '$username', '".hash('sha256', $password)."')";
    $res2 = mysqli_query($conn, $query2);

    if($res && $res2){
        echo "<div class='sucess'>
             <h3>L'utilisateur a été créée avec succès.</h3>
             <p>Cliquez <a href='index.php'>ici</a> pour retourner à la page d'accueil</p>
       </div>";
    }
}else{
    ?>
    <!-- ***** Features Item Start ***** -->
    <section class="section" id="features">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>S'<em>enregistrer</em></h2>
                        <img src="assets/images/line-dec.png" alt="waves">
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
                <input type="text" class="box-input" name="name"
               placeholder="Nom" required />

                <input type="text" class="box-input" name="first_name"
               placeholder="Prénom" required />

                <input type="text" class="box-input" name="adress"
               placeholder="Adresse" required />

                <input type="text" class="box-input" name="postal_code"
               placeholder="Code postal" required />

                <input type="text" class="box-input" name="town"
               placeholder="Ville" required />

                <input type="text" class="box-input" name="country"
               placeholder="Pays" required />

                <input type="text" class="box-input" name="email"
               placeholder="Email" required />

                <input type="text" class="box-input" name="phone_number"
               placeholder="Numéro de téléphone" required />

                <input type="text" class="box-input" name="username"
               placeholder="Nom d'utilisateur" required />

                <input type="password" class="box-input" name="password"
               placeholder="Mot de passe" required />

                <input type="submit" name="submit" value="+ Ajouter" class="box-button" />
            </form>
        </div>
    </div>
</section>
<?php } ?>

<!-- ***** Footer Start ***** -->
<?php include('footer.php'); ?>

<!-- jQuery -->
<script src="assets/js/jquery-2.1.0.min.js"></script>

<!-- Bootstrap -->
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Plugins -->
<script src="assets/js/scrollreveal.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/imgfix.min.js"></script>
<script src="assets/js/mixitup.js"></script>
<script src="assets/js/accordions.js"></script>

<!-- Global Init -->
<script src="assets/js/custom.js"></script>

</body>
</html>
