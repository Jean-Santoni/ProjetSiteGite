<!DOCTYPE html>
<html lang="en">
<header>
  <div class="banniere">
  <div class="logo">
    <img src="./img/LOGO-final-fond-transparent.png" alt="Logo du site">
  </div>
  <div class="title">
    <h1>Gîte Figuiès</h1>
  </div>
    <?php
    session_start();
    if(isset($_SESSION['user'])){
      echo "
        <div class=\"login-button\">
          <button onclick=\"window.location.href = './Logout.php'\">Logout</button>
        </div>";
    }else{
      echo "
        <div class=\"login-button\">
          <button onclick=\"window.location.href = 'Login.php'\">Login</button>
        </div>";
    }
    ?>
</div>
  <nav id="navlist">
    <ul>
      <li><a href="./index.php">Accueil</a></li>
      <li><a href="./PageCalendrier.php">Calendrier</a></li>
      <li><a href="./index.php#Service">Services</a></li>
      <li><a href="./PageTarifs.php">Tarifs</a></li>
      <?php
      if(isset($_SESSION['user'])){
        echo "<li><a href=\"./PageAdmin.php\">Admin</a></li>";
      }
      ?>
    </ul>
  </nav>
</header>
</html>
