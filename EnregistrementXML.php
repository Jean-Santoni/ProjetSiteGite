<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $xml = new DOMDocument();
  $xml->load("./DonneesAffichees.xml");

  $root = $xml->documentElement;

  if(isset($_POST['description'])){
    $description = trim($_POST['description']);
    $descDetail = trim($_POST['descDetail']);

    $elements = $xml->getElementsByTagName('DESCRIPTION');
    foreach ($elements as $element) {
      $element->parentNode->removeChild($element);
    }
    $elements = $xml->getElementsByTagName('DESCDETAIL');
    foreach ($elements as $element) {
      $element->parentNode->removeChild($element);
    }

    try {
      $root->appendChild($xml->createElement("DESCRIPTION", $description));
      $root->appendChild($xml->createElement("DESCDETAIL", $descDetail));
    } catch (DOMException $e) {
      echo "Ca marche pas";
      exit;
    }
  }

  if(isset($_POST['EventsCalendar'])){
    $eventCalendar = trim($_POST['EventsCalendar']);

    $elements = $xml->getElementsByTagName('CALENDAR');
    foreach ($elements as $element) {
      $element->parentNode->removeChild($element);
    }

    try {
      $root->appendChild($xml->createElement("CALENDAR", $eventCalendar));
    } catch (DOMException $e) {
      echo "Ca marche pas";
      exit;
    }
  }
  $xml->save("./DonneesAffichees.xml");

  header('Location: PageAdmin.php');
  exit;
}
?>
