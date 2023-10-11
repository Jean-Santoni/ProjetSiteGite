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
    $_SESSION['username'] = $username;

    // Rediriger vers la page de données
    header('Location: index.php');
    exit;
  } else {
    $error_message = "Nom d'utilisateur ou mot de passe incorrect";
    echo "C'est dla meeeeerrde";
  }
}
?>
