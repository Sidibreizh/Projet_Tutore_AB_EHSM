<?php
require_once("inc/init.inc.php");
//--------------------------------- TRAITEMENTS PHP ---------------------------------//
//--- AJOUT PANIER ---//
if(isset($_POST['ajout_panier']))
{   // debug($_POST);
    $resultat = executeRequete("SELECT * FROM produit WHERE idProduit='$_POST[idProduit]'");
    $produit = $resultat->fetch_assoc();
    ajouterProduitDansPanier($produit['nom'], $_POST['idProduit'], $_POST['nombre'], $produit['prix'], $produit['photo']);
}
if(isset($_GET['action']) && $_GET['action'] == "vider")
{
    unset($_SESSION['panier']);
}

if(empty($_SESSION['panier']['idProduit'])) // panier vide
{
    $contenu = "<tr><td colspan='5'>Votre panier est vide</td></tr>";
    $contenu .= '</table>
                    </form>';
}
else
{
    for ($i = 0; $i < count($_SESSION['panier']['idProduit']); $i++)
    {
        //$contenu .= '<input type="hidden" name="idProduit" value="'.(int)$_SESSION['panier']['idProduit'].'">';
        $contenu .= '<tr><td>' . $_SESSION['panier']['nom'][$i].'</td>';
        $contenu .= '<td><img src="'.$_SESSION['panier']['photo'][$i].'" height="70"></td>';
        $contenu .= "<td>" . $_SESSION['panier']['nombre'][$i] . "</td>";
        $contenu .= "<td>" . $_SESSION['panier']['prix'][$i] . "€</td>";
        $contenu .= "<td>" . $_SESSION['panier']['prix'][$i]*$_SESSION['panier']['nombre'][$i] . "€</td>";
        //$contenu .= '<td style="text-align:center;"><a href="?action=retirer" class="btnRemoveAction"><i class="fas fa-trash-alt" ></i></a></td>';
        $contenu .= "</tr>";
    }
    $contenu .= '<tr>';
    $contenu .= '<td colspan="4"><strong>Total :</strong></td>';
    $contenu .= '<td colspan="1" style="text-align: left"><strong>'. montantTotal() .'€</strong></td>';
    $contenu .= '<td></td>';
    $contenu .= '</tr>';


    if(internauteEstConnecte())
    {
        $montant = montantTotal()*100;
        $contenu .= '<tr>';
        $contenu .= '<td colspan="4"></td>';
        $contenu .= "<td colspan=\"1\" style=\"text-align: \"><a href='?action=vider'><i class=\"fas fa-trash-alt\"></i></a></td>";
        $contenu .= '</tr>';
        $contenu .= '</table>
                    </form>';
        $contenu .= '<form action="traitement.php" method="POST">
                        <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="#pk_test_51L7HRGDH5EHXWRr8Ene8m0agWgwycYWY5qs8iNrEn1U5PzklJdhJbnDoxw1xNhxw93vNkGj22TCJgP8AFOS5OYxY0043h6hlvd"
                            data-amount="'.$montant.'"
                            data-name="CAT.FR"
                            data-description="Test CAT"
                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                            data-locale="auto"
                            data-currency="eur">
                        </script>
                    </form>';

    }
    else
    {
        $contenu .= '<tr><td colspan="3">Veuillez vous <a href="add_user.php">inscrire</a> ou vous <a href="login.php">connecter</a> afin de pouvoir procéder au règlement</td></tr>';
        $contenu .= '</table>
                    </form>';
    }
}
?>
