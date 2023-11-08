<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $xml = new DOMDocument();
  $xml->load("./DonneesAffichees.xml");

  $root = $xml->documentElement;

  if(isset($_POST['description'])){
    $description = trim($_POST['description']);
    $descDetail = trim($_POST['descDetail']);
    $nbPersonne = trim($_POST['nombrePersonne']);
    $nbChambre = trim($_POST['nombreChambre']);
    $nbPersonneMax = trim($_POST['nombrePersonneMax']);
    $prixNuitMoy = trim($_POST['prixNuitMoy']);
    $prixNuitHaut = trim($_POST['prixNuitHaut']);
    $prixSemMoy = trim($_POST['prixSemMoy']);
    $prixSemHaut = trim($_POST['prixSemHaut']);
    $prixAnimaux = trim($_POST['prixAnimaux']);
    $prixMenage = trim($_POST['prixMenage']);
    $prixLocation = trim($_POST['prixLocation']);

    $elements = $xml->getElementsByTagName('DESCRIPTION');
    foreach ($elements as $element) {
      $element->parentNode->removeChild($element);
    }
    $elements = $xml->getElementsByTagName('DESCDETAIL');
    foreach ($elements as $element) {
      $element->parentNode->removeChild($element);
    }
    $elements = $xml->getElementsByTagName('NBPERS');
    foreach ($elements as $element) {
      $element->parentNode->removeChild($element);
    }
    $elements = $xml->getElementsByTagName('NBCHAMB');
    foreach ($elements as $element) {
      $element->parentNode->removeChild($element);
    }
    $elements = $xml->getElementsByTagName('NBPERSMAX');
    foreach ($elements as $element) {
      $element->parentNode->removeChild($element);
    }
    $elements = $xml->getElementsByTagName('PNM');
    foreach ($elements as $element) {
      $element->parentNode->removeChild($element);
    }
    $elements = $xml->getElementsByTagName('PNH');
    foreach ($elements as $element) {
      $element->parentNode->removeChild($element);
    }
    $elements = $xml->getElementsByTagName('PSM');
    foreach ($elements as $element) {
      $element->parentNode->removeChild($element);
    }
    $elements = $xml->getElementsByTagName('PSH');
    foreach ($elements as $element) {
      $element->parentNode->removeChild($element);
    }
    $elements = $xml->getElementsByTagName('PXA');
    foreach ($elements as $element) {
      $element->parentNode->removeChild($element);
    }
    $elements = $xml->getElementsByTagName('PXM');
    foreach ($elements as $element) {
      $element->parentNode->removeChild($element);
    }
    $elements = $xml->getElementsByTagName('PXL');
    foreach ($elements as $element) {
      $element->parentNode->removeChild($element);
    }

    try {
      $root->appendChild($xml->createElement("DESCRIPTION", $description));
      $root->appendChild($xml->createElement("DESCDETAIL", $descDetail));
      $root->appendChild($xml->createElement("NBPERS", $nbPersonne));
      $root->appendChild($xml->createElement("NBCHAMB", $nbChambre));
      $root->appendChild($xml->createElement("NBPERSMAX", $nbPersonneMax));
      $root->appendChild($xml->createElement("PNM", $prixNuitMoy));
      $root->appendChild($xml->createElement("PNH", $prixNuitHaut));
      $root->appendChild($xml->createElement("PSM", $prixSemMoy));
      $root->appendChild($xml->createElement("PSH", $prixSemHaut));
      $root->appendChild($xml->createElement("PXA", $prixAnimaux));
      $root->appendChild($xml->createElement("PXM", $prixMenage));
      $root->appendChild($xml->createElement("PXL", $prixLocation));
    } catch (DOMException $e) {
      echo "<script>alert('Indentifiant ou mot de passe incorrect ')</script>";
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
      echo "<script>alert('Indentifiant ou mot de passe incorrect ')</script>";
      exit;
    }
  }
  $xml->save("./DonneesAffichees.xml");

  header('Location: PageAdmin.php');
  exit;
}
?>
