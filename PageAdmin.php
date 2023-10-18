<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
  <link rel="stylesheet" href="css/main.css">
</head>
<body>

<?php
include_once("./HTML/header.php");
if (!isset($_SESSION['user'])) {
  header('Location: Login.php');
  exit;
}
?>
<?php
include_once ("./HTML/footer.html");
?>
</body>
</html>
