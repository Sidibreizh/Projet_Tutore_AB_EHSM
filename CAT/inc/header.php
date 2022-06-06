<?php require_once ('init.inc.php');
if(internauteEstConnecte())
{
    $menu = '<li><a href="tableau_de_bord.php"><i class="fas fa-user" title="Tableau de bord"></i></a></li>';
    $menu .= '<li><a href="login.php"><i class="fas fa-sign-out-alt" title="Se déconnecter"></i></a></li>';
}
if(!internauteEstConnecte())
{
    $menu = '<li><a href="inc/logout.inc.php"><i class="fas fa-sign-in-alt" title="Se connecter"></i></a></li>';
}
?>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>CAT - Croquettes à temps</title>

    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/EssaiLogo3.png">

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
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->

                    <a href="index.php" class="logo"><img src="assets/images/EssaiLogo3.png" /> CROQUETTES A <em> TEMPS</em></a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li classe="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-search"></i></a>
                            <div class="dropdown-menu">
                                <form class="dropdown-item" action = "search.php" method = "get">
                                    <input class="dropdown-item" type = "search" name = "terme" placeholder="Entrez votre recherche" required>
                                    <input class="dropdown-item" type = "submit" name = "s" value = "RECHERCHER">
                                </form>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="products.html" role="button" aria-haspopup="true" aria-expanded="false">Produits</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="products.php">Tous les produits</a>
                                <a class="dropdown-item" href="alimentation.php">Alimentation</a>
                                <a class="dropdown-item" href="litiere.php">Litière</a>
                                <a class="dropdown-item" href="soin.php">Soin</a>
                                <a class="dropdown-item" href="arbres_a_chats.php">Arbre à chats</a>
                                <a class="dropdown-item" href="jouets.php">Jouets</a>
                            </div>
                        </li>
                        <li><a href="about.php">A propos</a></li>
                        <li><a href="mailto:alix.bernardo@etu.univ-lyon1.fr"><i class="fas fa-envelope" title="Contact"></i></a></li>
                        <li><a href="cart.php"><i class="fas fa-shopping-cart" title="Panier"></i></a></li>
                        <?php
                        if(internauteEstConnecte())
                        {
                            echo '<li><a href="tableau_de_bord.php"><i class="fas fa-user" title="Tableau de bord"></i></a></li>';
                            echo '<li><a href="inc/logout.inc.php"><i class="fas fa-sign-out-alt" title="Se déconnecter"></i></a></li>';
                        }
                        if(!internauteEstConnecte())
                        {
                            echo '<li><a href="login.php"><i class="fas fa-sign-in-alt" title="Se connecter"></i></a></li>';
                        }
                        ?>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->