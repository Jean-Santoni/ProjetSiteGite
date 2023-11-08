<?php

if ($_SERVER["REQUEST_METHOD"] === "GET") {
  $directory = './img/Carousel';

  $files = scandir($directory);

  foreach ($files as $file) {
    if ($file != '.' && $file != '..') {
      echo "<div>$file <button type='button' class='delete-button' data-file='$file'>X</button></div>";
    }
  }
}
function compressImage($source, $destination, $quality) {
  $imgInfo = getimagesize($source);
  $mime = $imgInfo['mime'];

  switch ($mime) {
    case 'image/jpeg':
      $image = imagecreatefromjpeg($source);
      break;
    case 'image/png':
      $image = imagecreatefrompng($source);
      break;
    case 'image/gif':
      $image = imagecreatefromgif($source);
      break;
    default:
      $image = imagecreatefromjpeg($source);
  }

  imagejpeg($image, $destination, $quality);

  return $destination;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if(isset($_POST["file"])){
    $fileToDelete = $_POST["file"];
    $directory = './img/Carousel/';

    $filePath = $directory . $fileToDelete;

    if (file_exists($filePath) && unlink($filePath)) {
      echo "success";
    } else {
      echo "failed";
    }
    exit;
  }
  if ($_FILES["imageInput"]["error"] == 0) {
    $uploadDir = "./img/Carousel/";
    $imageUploadPath = $uploadDir . basename($_FILES["imageInput"]["name"]);
    $imageTemp = $_FILES["imageInput"]["tmp_name"];
    $compressedImage = compressImage($imageTemp, $imageUploadPath, 75);
    echo "success";
  } else {
    echo "failed";
  }
  exit;
}
