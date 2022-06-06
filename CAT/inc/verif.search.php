<?php require_once ('init.inc.php');

if (isset($_GET["s"]) AND $_GET["s"] == "RECHERCHER")
{
    $_GET["terme"] = htmlspecialchars($_GET["terme"]); //pour sécuriser le formulaire contre les failles html
    $terme = $_GET["terme"];
    $terme = trim($terme); //pour supprimer les espaces dans la requête de l'internaute
    $terme = strip_tags($terme); //pour supprimer les balises html dans la requête
}
if (isset($terme)) {
    $terme = strtolower($terme);
    $donnees = executeRequete("SELECT idProduit, idCategorie, nom, prix, description, photo FROM `produit` WHERE description LIKE '%" . $terme . "%' ");
    if($donnees->num_rows <= 0)
    {
        $contenu = '<p>Aucun résultat</p>';
    }
    while ($produit = $donnees->fetch_assoc()) {
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
}
else
{
    $contenu = "Vous devez entrer votre requête dans la barre de recherche";
}
?>