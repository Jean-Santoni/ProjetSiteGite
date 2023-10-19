<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $description = trim($_POST['description']);
  $descDetail = trim($_POST['descDetail']);

  $xml = new DOMDocument();
  $xml->load("./DonneesAffichees.xml");

  $elements = $xml->getElementsByTagName('DESCRIPTION');
  foreach ($elements as $element) {
    $element->parentNode->removeChild($element);
  }

  $elements = $xml->getElementsByTagName('DESCDETAIL');
  foreach ($elements as $element) {
    $element->parentNode->removeChild($element);
  }

  $root = $xml->documentElement;

  try {
    $root->appendChild($xml->createElement("DESCRIPTION", $description));
    $root->appendChild($xml->createElement("DESCDETAIL", $descDetail));

    $xml->save("./DonneesAffichees.xml");

    header('Location: index.php');
    exit;
  } catch (DOMException $e) {
    echo "Ca marche pas";
  }


}
?>
