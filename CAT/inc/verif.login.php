<?php require_once ("init.inc.php");

if($_POST)
{
    //Contrôle injection SQL et XSS
    $username = mysqli_real_escape_string($mysqli,htmlspecialchars($_POST['pseudoCompte']));
    $password = mysqli_real_escape_string($mysqli,htmlspecialchars($_POST['mdpCompte']));

    //Traitement
    $resultat = executeRequete("SELECT * FROM compte_utilisateur WHERE pseudoCompte='$username'");

    if($resultat->num_rows != 0)
    {
        $membre = $resultat->fetch_assoc();


        if($membre['mdpCompte'] == $password)
        {
            $resultat2 = executeRequete("SELECT * FROM utilisateur WHERE idUtilisateur='$membre[idUtilisateur]'");
            $client = $resultat2->fetch_assoc();


            foreach ($membre as $indice => $element)
            {
                $_SESSION['compte_utilisateur'][$indice] = $element;
            }
            foreach ($client as $indice => $element)
            {
                $_SESSION['utilisateur'][$indice] = $element;
            }

            header("location:tableau_de_bord.php");
        }
        else
        {
            $contenu = '<p>Mot de passe incorrect</p>';
        }
    }
    else
    {
        $contenu = "<p>Nom d'utilisateur incorrect</p>";
    }
}
?>
