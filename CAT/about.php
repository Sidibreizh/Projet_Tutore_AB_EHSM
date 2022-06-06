<!DOCTYPE html>
<!-- ***** Header Area Start ***** -->
<?php include('inc/header.php'); ?>
<!-- ***** Header Area End ***** -->
<section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/chat-endormi-bureau-clavier.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2>A <em>Propos</em></h2>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ***** Our Classes Start ***** -->
<section class="section" id="our-classes">
    <div class="container">
        <br>
        <br>
        <br>
        <div class="row" id="tabs">
            <div class="col-lg-4">
                <ul>
                    <li><a href='#tabs-1'><i class="far fa-question-circle"></i> Qui sommes-nous ?</a></li>
                    <li><a href='#tabs-2'><i class="far fa-file-alt"></i> Contexte</a></a></li>
                    <li><a href='#tabs-3'><i class="fas fa-code"></i> Portail Web</a></a></li>
                    <li><a href='#tabs-4'><i class="far fa-file-alt"></i> Application de Gestion</a></a></li>
                </ul>
            </div>
            <div class="col-lg-8">
                <section class='tabs-content'>
                    <article id='tabs-1'>
                        <img src="assets/images/fondateurs.png" alt="">
                        <section>
                            <h4>Qui sommes nous ?</h4>
                            <div class="entreprise">
                                <p>Convaincu qu’avec un chat, la vie est plus belle, c’est en 2018, année du Tigre, qu'Alix Bernardo et Elyes Hadj Salah Magré créent Croquettes à temps (CAT, pour les intimes).
                                    <br>CAT est une entreprise spécialisée dans l'animalerie féline. Cette dernière compte aujourd'hui 20 salariés et un bac d'herbe à chat.<p>
                            </div>
                        </section>
                        <section>
                            <h4>Les fondateurs</h4>
                            <div>
                                <p>Alix Bernardo, ancienne danseuse classique, elle a pris très tôt des cours de souplesse, grâce et évacuation de boules de poils avec des maîtres Chats qu'elle a fini par adopter. Par la suite, afin d'assurer sa sécurité, elle s'est entourée d'une meute de chats aux griffes acérées et pâticurées.
                                    <br>Quant à Elyes Hadj Salah Magré, il a toujours eu un lien fort avec les chats. En effet, dès 2006, il s'est entouré de chats de traîneaux pour son périple de 9 ans dans le Labrador (Canada) afin de finaliser ses études sur la symbiose du chiendent et du châtaignier en temps de chien.
                            </div>

                        </section>

                    </article>
                    <article id='tabs-2'>
                        <img src="assets/images/lyon1.png" alt="">
                        <h4>Contexte</h4>
                        <div class="descriptif">
                            <p>Le projet CAT est un travail universitaire effectué par Alix BERNARDO et Elyes HADJ SALAH MAGRE en 2022.</p>
                            <p>Le but était de réaliser 2 interfaces : <br>- Un portail web pour un site e-commerce<br>- Une application bureautique pour la gestion de sock<br>- Un dossier d'analyse et de conception UML</p>
                        </div>
                    </article>
                    <article id='tabs-3'>
                        <img src="assets/images/php.png" alt="php">
                        <h4>Portail Web</h4>
                        <p>La base du portail web a été réalisée en HTML5, CSS3, JavaScript et Bootstrap pour obtenir un site fonctionnel mais statique.</p>
                        <p>Une base de données a été créée puis c'est l'utilisation de PHP5.4 qui a permis l'affichage dynamique des pages ainsi que la création d'un compte utilisateur et le maintien de sa session.</p>
                        <p>Initialement, le portail web devait correspondre à un site de e-commerce fonctionnel et le plus ergonomique possible permettant au client de parcourir le catalogue des produits classés en catégories et sous-catégories, de consulter la fiche d’un produit, de créer un compte, de donner son avis sur un produit (bonus), d’ajouter un produit au panier, de payer une commande (bonus). En-dehors d’HTML et CSS qui devait gérer la partie statique du site, il était demandé que la partie dynamique soit développée avec PHP. L’utilisation de Frameworks connus était autorisée.</p>
                        <p>A la fin de la période donnée, le portail web correspond bien à un site e-commerce suffisamment simple pour être agréable dans sa navigation. Il est possible d’afficher dynamiquement les produits présents dans la base de données, que ce soit par catégorie, sous-catégorie ou la totalité du catalogue. Chaque produit dispose d’une fiche produit affichée dynamiquement également, en fonction de son identifiant et de sa présence en stock. L’utilisateur, ou futur client, peut créer un compte, voir son tableau de bord (dynamique), le modifier, se connecter, se déconnecter et voir son panier maintenu le temps de la connexion. Il n’est actuellement pas possible de laisser un avis sur le site même si tout est prêt pour ce faire d’un point de vue statique. Il est possible d’ajouter un ou plusieurs produits dans le panier ainsi que de le vider. Un module de paiement est présent et fonctionnel.</p>
                    </article>
                    <article id='tabs-4'>
                        <img src="assets/images/java.png" alt="java">
                        <h4>Application de Gestion</h4>
                        <p>Initialement, l’application de gestion devait permettre à l’administrateur de gérer (créer, modifier, supprimer) les catalogues, les sous-catalogues, les produits, les comptes clients, les promotions, les stocks et la modération des avis (bonus). Il était demandé que cette application soit développée en Java et qu’elle puisse se connecter à la base de données.</p>
                        <p>A la fin de la période donnée, l’application de gestion permet en grande partie de gérer ce qui est demandé dans les consignes. Il est possible de rechercher un produit et d’obtenir toutes les caractéristiques de ce dernier. Il est possible de le modifier ou de le supprimer. Ces actions sont ensuite enregistrées dans la base de données. Il est aussi possible d’ajouter un nouveau produit. Même chose avec les catégories, les sous-catégories et les promotions. Il est possible de chercher un client et de supprimer son compte utilisateur. En revanche, il n’est pas possible de donner des dates de promotions et de modérer les avis.</p>
                    </article>
                </section>
            </div>
        </div>
    </div>
</section>
<!-- ***** Our Classes End ***** -->

<!-- ***** Footer Start ***** -->
<?php include ('inc/footer.php'); ?>

</body>
</html>

