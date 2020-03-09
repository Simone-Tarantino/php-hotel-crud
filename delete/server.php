<?php
  include __DIR__ . '/../database.php';
  include __DIR__ . '/../functions.php';

  if(empty($_POST['id'])) {
    die('Nessun ID inserito');
  }

  // usiamo post per questioni di sicurezza
  // post va passata per forza con un form
  $idRoom = $_POST['id'];

  $result = getById($conn, 'stanze', $idRoom);

  // se l'id che viene passato non è corretto
  if (!$result) {
    die('Id non corretto');
  }
  // se è corretto facciamo la chiamata delete per sql
  $sql = "DELETE FROM `stanze` WHERE `id` =  '$idRoom'";

  $resultDelete = $conn->query($sql);
  // se la cancellazione va a buon fine
  if($resultDelete) {
    // veniamo reindirizzati alla homepage
    header("Location: $basePath?roomNumber=$idRoom");
  } else {
    echo 'KO';
  }

  $conn->close();
