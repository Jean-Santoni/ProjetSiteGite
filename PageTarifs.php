<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Page des tarifs</title>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
</head>
<body class="tarif">
    <?php
    include_once ("./HTML/header.html");
    ?>
  <h1 class=" titrePage" >Pages des tarifs</h1>
<div>
  <h2> Les différents type de tarifs </h2>
  <table border="1" class="center">
    <tr>
      <th></th>
      <th>Moyenne saison</th>
      <th>Haute saison</th>
    </tr>
    <tr>
      <td>Nuit</td>
      <td>85 €</td>
      <td>110 €</td>
    </tr>
    <tr>
      <td>Semaine</td>
      <td>550 €</td>
      <td>650 €</td>
    </tr>
    <tr>
      <td>Bonus 1</td>
      <td colspan="2" class="center">1000 €</td>
    </tr> <tr>
    <td>Bonus 2</td>
    <td colspan="2" class="center">560 €</td>
  </tr>
  </table>
</div>
    <?php
    include_once ("./HTML/footer.html");
    ?>
</body>
</html>
