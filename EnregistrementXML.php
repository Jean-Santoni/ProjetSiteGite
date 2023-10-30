<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $description = trim($_POST['description']);
  $descDetail = trim($_POST['descDetail']);
  $eventCalendar = trim($_POST['EventsCalendar']);

  // Vérifiez s'il y a des erreurs lors de l'envoi du fichier
  if ($_FILES["imageCarousel"]["error"] == 0) {
    $uploadDir = "./img/Carousel/"; // Répertoire où vous souhaitez enregistrer les images

    // Le nom du fichier téléversé
    $uploadFile = $uploadDir . basename($_FILES["imageCarousel"]["name"]);

    // Déplacez le fichier téléversé vers l'emplacement souhaité
    if (move_uploaded_file($_FILES["imageCarousel"]["tmp_name"], $uploadFile)) {
      echo "L'image a été téléchargée avec succès.";
    } else {
      echo "Une erreur s'est produite lors du téléchargement de l'image.";
      exit;
    }
  } else {
    echo "Erreur lors du téléchargement du fichier.";
  }

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

  $elements = $xml->getElementsByTagName('CALENDAR');
  foreach ($elements as $element) {
    $element->parentNode->removeChild($element);
  }

  $root = $xml->documentElement;

  try {
    $root->appendChild($xml->createElement("DESCRIPTION", $description));
    $root->appendChild($xml->createElement("DESCDETAIL", $descDetail));
    $root->appendChild($xml->createElement("CALENDAR", $eventCalendar));

    $xml->save("./DonneesAffichees.xml");

    header('Location: index.php');
    exit;
  } catch (DOMException $e) {
    echo "Ca marche pas";
  }


}
?>
