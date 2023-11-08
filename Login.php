<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Page de Connexion</title>
  <link rel="icon" href="./img/Logo_x32.png" type="image/png">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="././css/Login.css">
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
  $username = $_POST['username'];
  //$password = md5($_POST['password']); //Ancienne méthode de hashage
  $password = $_POST['password'];

  $conn = new PDO("mysql:host=localhost;dbname=gitefiguies", 'root', '');
  $req = "SELECT * FROM utilisateur WHERE NomUtilisateur = :pLogin;";

  $stmt = $conn->prepare($req);
  $stmt->bindParam(':pLogin', $username, PDO::PARAM_STR);
  $stmt->execute();

  $result = array();
  $result = $stmt->fetchAll();

  foreach ($result as $row) {
    $hashed_password = $row['MotDePasse'];
    $crypted_password = crypt($password, $hashed_password);
    if (hash_equals($hashed_password, $crypted_password)){
      $_SESSION['user'] = $username;

      header('Location: PageAdmin.php');
      exit;
    }
  }
  echo "<script>alert('Indentifiant ou mot de passe incorrect ')</script>";
}
?>

