<?php
session_start();

// Déconnexion : Supprimez la variable de session
unset($_SESSION['username']);

// Rediriger vers la page d'accueil (index.php) après la déconnexion
header('Location: index.php');
exit;
?>
