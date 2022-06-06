<?php require_once ('init.inc.php');
if(session_destroy())
{
    // Redirection vers la page de connexion
    header("Location: ../login.php");
}
?>
