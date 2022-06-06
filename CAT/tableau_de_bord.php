<?php require_once ('inc/verif.tab.php'); ?>
<!DOCTYPE html>
<!-- ***** Header Area Start ***** -->
<?php include('inc/header.php'); ?>
<!-- ***** Header Area End ***** -->
<section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/chats-qui-se-comportent-comme-nous-au-travail.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2>Tableau de <em>bord</em></h2>
                    <?php echo $contenu; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ***** Features Item Start ***** -->
<section class="section" id="our-classes">
    <div class="container">
        <br>
        <br>
        <br>
        <div class="row" id="tabs">
            <div class="col-lg-4">
                <ul>
                    <li><a href='#tabs-1'><i class="fas fa-info-circle"></i>   Votre compte</a></li>
                    <li><a href='#tabs-2'><i class="fas fa-shopping-basket"></i>   Vos commandes</a></a></li>
                    <li><a href='#tabs-3'><i class="fas fa-gift"></i>   Recommandé pour vous</a></a></li>
                </ul>
            </div>
            <div class="col-lg-8">
                <section class='tabs-content'>
                    <article id='tabs-1'>
                        <img src="assets/images/chats-qui-se-comportent-comme-nous-au-travail.jpg" alt="">
                        <h4>Votre Compte</h4>
                        <div class="tab-user">
                            <?php echo $contenu2; ?>
                        </div>
                    </article>
                    <article id='tabs-2'>
                        <img src="assets/images/chat-shopping.jpg" alt="">
                        <h4>Vos Commandes</h4>
                        <p>Vous n'avez effectué aucune commande pour le moment</p>
                        </article>
                    <article id='tabs-3'>
                        <img src="assets/images/contenu-mioubox-cadeau-525x350.jpg" alt="">
                        <h4>Recommandé Pour Vous</h4>
                        <p>Aucune recommandation pour le moment</p>
                    </article>
                </section>
            </div>
        </div>
    </div>
</section>
                <a href="inc/logout.inc.php">Déconnexion</a>

<!-- ***** Features Item End ***** -->

<!-- ***** Footer Start ***** -->
<?php include('inc/footer.php'); ?>


</body>
</html>
