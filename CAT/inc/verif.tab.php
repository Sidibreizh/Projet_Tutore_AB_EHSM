<?php require_once ('init.inc.php');

if(!internauteEstConnecte())
{
    header("location:login.php");
}
else
{
    $contenu = '<p>Bienvenue <em> '.$_SESSION['utilisateur']['prenomClient'].' !</em></p>';

    $contenu2 = '<form action = "" method = "get">';
    $contenu2 .= '<table>';
    $contenu2 .= '<tr>';
    $contenu2 .= '<th>NOM         </th>';
    $contenu2 .= '<td>'.$_SESSION['utilisateur']['nomClient'].'</td>';
    $contenu2 .= '</tr>';
    $contenu2 .= '<tr>';
    $contenu2 .= '<th>PRENOM      </th>';
    $contenu2 .= '<td>'.$_SESSION['utilisateur']['prenomClient'].'</td>';
    $contenu2 .= '</tr>';
    $contenu2 .= '<tr>';
    $contenu2 .= '<th>ADRESSE</th>';
    $contenu2 .= '<td>'.$_SESSION['utilisateur']['adresseClient'].'</td>';
    $contenu2 .= '</tr>';
    $contenu2 .= '<tr>';
    $contenu2 .= '<th></th>';
    $contenu2 .= '<td>'.$_SESSION['utilisateur']['CodePostalClient'].' '.$_SESSION['utilisateur']['villeClient'].'</td>';
    $contenu2 .= '<tr>';
    $contenu2 .= '<th>TELEPHONE</th>';
    $contenu2 .= '<td>'.$_SESSION['utilisateur']['telClient'].'</td>';
    $contenu2 .= '</tr>';
    $contenu2 .= '<tr>';
    $contenu2 .= '<th>MAIL</th>';
    $contenu2 .= '<td>'.$_SESSION['utilisateur']['emailClient'].'</td>';
    $contenu2 .= '</tr>';
    $contenu2 .= '</table><br>';
    $contenu2 .= '<input type="submit" name ="modif" value="MODIFIER" style="width:22%">';
    $contenu2 .= '</form>';



}
if (isset($_GET["modif"]) AND $_GET["modif"] == "MODIFIER")
{
    $contenu2 = '<form class="box" action="" method="post">';
    $contenu2 .= "<input type=\"text\" class=\"box-input\" name=\"nomClient\" maxlength=\"20\" value=\"".$_SESSION['utilisateur']['nomClient']."\" required />";
    $contenu2 .= "<input type=\"text\" class=\"box-input\" name=\"prenomClient\" maxlength=\"20\" value=\"".$_SESSION['utilisateur']['prenomClient']."\" required />";
    $contenu2 .= "<input type=\"text\" class=\"box-input\" name=\"adresseClient\" maxlength=\"50\" value=\"".$_SESSION['utilisateur']['adresseClient']."\" required />";
    $contenu2 .= "<input type=\"number\" class=\"box-input\" name=\"CodePostalClient\" pattern=\"[0-9]{5}\" value=\"".$_SESSION['utilisateur']['CodePostalClient']."\" title=\"5 chiffres requis : 0-9\" required />";
    $contenu2 .= "<input type=\"text\" class=\"box-input\" name=\"villeClient\" value=\"".$_SESSION['utilisateur']['villeClient']."\" pattern=\"[a-zA-Z0-9-_.]{3,15}\" title=\"Caractères acceptés : a-z A-Z 0-9-_.\" required />";
    $contenu2 .= "<input type=\"text\" class=\"box-input\" name=\"paysClient\" maxlength=\"20\" value=\"".$_SESSION['utilisateur']['paysClient']."\" pattern=\"[a-zA-Z0-9-_.]{3,15}\" title=\"Caractères acceptés : a-z A-Z 0-9-_.\" required />";
    $contenu2 .= "<input type=\"text\" class=\"box-input\" name=\"emailClient\" maxlength=\"30\" value=\"".$_SESSION['utilisateur']['emailClient']."\" required />";
    $contenu2 .= "<input type=\"text\" class=\"box-input\" name=\"telClient\" maxlength=\"12\" value=\"".$_SESSION['utilisateur']['telClient']."\" required />";
    $contenu2 .= '<input type="submit" name="valid-modif" value="MODIFIER" class="box-button" style="width:22%"/>';
    $contenu2 .= '</form>';

}
if ($_POST)
{
    foreach ($_POST as $indice => $valeur)
    {
        $_POST[$indice] = htmlspecialchars(addslashes($valeur));
    }
    executeRequete("UPDATE utilisateur SET nomClient = '$_POST[nomClient]', prenomClient = '$_POST[prenomClient]',
        adresseClient = '$_POST[adresseClient]', CodePostalClient = '$_POST[CodePostalClient]', villeClient = '$_POST[villeClient]',
        paysClient = '$_POST[paysClient]', emailClient = '$_POST[emailClient]', telClient = '$_POST[telClient]' WHERE idUtilisateur = '".$_SESSION['utilisateur']['idUtilisateur']."'");

    $resultat = executeRequete("SELECT * FROM utilisateur WHERE idUtilisateur='".$_SESSION['compte_utilisateur']['idUtilisateur']."'");
    $client = $resultat->fetch_assoc();
    foreach ($client as $indice => $element)
    {
        $_SESSION['utilisateur'][$indice] = $element;
    }
    header("location:tableau_de_bord.php");
}
?>
