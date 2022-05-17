<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'croquetteatemps';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
    or die('could not connect to database');

    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username']));
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));

    if($username !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM compte_utilisateur where 
              pseudoCompte = '".$username."' and mdpCompte = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // pseudo et mot de passe corrects
        {
            $_SESSION['username'] = $username;
            header('Location: tableau_de_bord.php');
        }
        else
        {
            header('Location: loginerror1.php'); // pseudo ou mot de passe incorrect
        }
    }
}
else
{
    header('Location: login.php');
}
//mysqli_close($db); // fermer la connexion
?>