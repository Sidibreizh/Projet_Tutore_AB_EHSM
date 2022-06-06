<?php require_once ('init.inc.php');

if($_POST)
{
    $verif_caractere = preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['pseudoCompte']);

    if($verif_caractere && (strlen($_POST['pseudoCompte']) < 1 || strlen($_POST['pseudoCompte']) > 20))
    {
        $contenu = "<p>Votre nom d'utilisateur doit contenir entre 1 et 20 caractères. <br>Caractères acceptés : Lettres de A à Z en majuscule ou minuscule et chiffres entre 0 et 9</p>";
    }
    else
    {
        $membre = executeRequete("SELECT * FROM compte_utilisateur WHERE pseudoCompte='$_POST[pseudoCompte]'");
        $mail = executeRequete("SELECT * FROM utilisateur WHERE emailClient='$_POST[emailClient]'");

        if($membre->num_rows > 0)
        {
            $contenu = "<p>Nom d'utilisateur indisponible, veuillez en choisir un autre.</p>";
        }
        elseif ($mail->num_rows > 0)
        {
            $contenu = "<p>Adresse mail déjà enregistrée</p>";
        }
        else
        {
            foreach ($_POST as $indice => $valeur)
            {
                $_POST[$indice] = htmlspecialchars(addslashes($valeur));
            }
            $query = "INSERT into utilisateur (idRole, nomClient, prenomClient, adresseClient, telClient, emailClient, CodePostalClient, villeClient, paysClient)
          VALUES ('2', '$_POST[nomClient]', '$_POST[prenomClient]', '$_POST[adresseClient]', '$_POST[telClient]', '$_POST[emailClient]', '$_POST[CodePostalClient]', '$_POST[villeClient]', '$_POST[paysClient]')";
            $res = mysqli_query($mysqli, $query);
            $select = mysqli_insert_id($mysqli);
            executeRequete("INSERT into compte_utilisateur (idUtilisateur, pseudoCompte, mdpCompte) VALUES ('$select', '$_POST[pseudoCompte]', '$_POST[mdpCompte]')");
            $contenu = "<p>Vous êtes bien inscrit ! <a href='login.php'>Vous connecter.</a></p>";
        }
    }
}
?>
