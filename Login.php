<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page de Connexion</title>
  <link rel="stylesheet" href="././css/Login.css"> <!-- Vous pouvez ajouter un fichier CSS externe pour le style -->
</head>
<body>
<var></var>
<div class="container">
  <h2>Connexion</h2>
  <form  method="POST" id="login">
    <div class="form-group">
      <label for="username">Nom d'utilisateur :</label>
      <input type="text" id="username" name="username" required>
    </div>
    <div class="form-group">
      <label for="password">Mot de passe :</label>
      <input type="password" id="password" name="password" required>
    </div>
    <button type="submit">Se connecter</button>
  </form>
</div>
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Récupérer les données du formulaire
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  // Vérifier les informations d'authentification dans la base de données
  // (Vous devez vous connecter à votre base de données ici)
  $conn = new PDO("mysql:host=localhost;dbname=gitefiguies", 'root', '');
  $req = "SELECT * FROM utilisateur WHERE NomUtilisateur = :pLogin AND MotDePasse = :pPassword;";

  $stmt = $conn->prepare($req);
  $stmt->bindParam(':pLogin', $username, PDO::PARAM_STR);
  $stmt->bindParam(':pPassword', $password, PDO::PARAM_STR);
  $stmt->execute();

  $result = array();
  $result = $stmt->fetchAll();

  // Si l'authentification réussit
  if ($result != null) {
    // Stocker l'identifiant de l'utilisateur dans une session
    $_SESSION['user'] = $username;

    // Rediriger vers la page de données
    header('Location: index.php');
    exit;
  } else {
    $error_message = "Nom d'utilisateur ou mot de passe incorrect";
    echo "<script>alert('Indentifiant ou mot de passe incorrect ')</script>";
  }
}

?>

