<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
<header>
  <div class="banniere">
    <div class="logo">
      <a href="./index.php"><img src="./img/Logo_x100.png" alt="Logo du site" loading="lazy"></a>
    </div>
    <div class="title">
      <h1>Gîte Figuiès</h1>
    </div>
    <?php
    if(isset($_SESSION['user'])){
      echo "
        <div class=\"login-button\">
          <button onclick=\"window.location.href = './Logout.php'\">Logout</button>
        </div>";
    }else{
      echo "
        <div class=\"login-button\">
        </div>";
    }
    ?>
  </div>
  <div class="navbar" id="navbar">
    <div class="burger-icon" id="burgerlist" onclick="toggleMenu()">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>
    <nav id="navlist">
      <ul>
        <li><a href="./index.php">Accueil</a></li>
        <li><a href="./index.php#Service">Services</a></li>
        <li><a href="./index.php#Tarifs">Tarifs</a></li>
        <li><a href="./PageCalendrier.php">Calendrier</a></li>
        <?php
        if(isset($_SESSION['user'])){
          echo "<li><a href=\"./PageAdmin.php\">Admin</a></li>";
        }
        ?>
      </ul>
    </nav>
  </div>
  <script src="./js/menuSticky.js"></script>
</header>
</html>
