<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Récupérer les données du formulaire
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Vérifier les informations d'authentification dans la base de données
  // (Vous devez vous connecter à votre base de données ici)

  // Si l'authentification réussit
  if (true) {
    // Stocker l'identifiant de l'utilisateur dans une session
    $_SESSION['username'] = $username;

    // Rediriger vers la page de données
    header('Location: index.php');
    exit;
  } else {
    $error_message = "Nom d'utilisateur ou mot de passe incorrect";
  }
}
?>
