<?php
session_start();

// Déconnexion : Supprimez la variable de session
unset($_SESSION['user']);
session_destroy();

// Rediriger vers la page d'accueil (index.php) après la déconnexion
header('Location: index.php');
exit;
?>
