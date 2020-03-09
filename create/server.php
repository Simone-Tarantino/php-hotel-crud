<?php
  include __DIR__ . '/../database.php';

  if(empty($_POST['beds'])) {
    die('Non hai inserito il numero di letti');
  }
  if(empty($_POST['floor'])) {
    die('Non hai inserito il piano');
  }
  if(empty($_POST['room_number'])) {
    die('Non hai inserito il numero di stanza');
  }

  $beds = $_POST['beds'];
  $floor = $_POST['floor'];
  $roomNumber = $_POST['room_number'];

  // chiamata query per l'inserimeto dei valori, come valori mettiamo i ? per evitare l'inserimento di valori non concessi nel form (per il valore created e updated, dato che sappiamo già quale valore sarà per certo inseriamo la funzione NOW() per avere la data e ora corrente)
  $sql = "INSERT INTO `stanze` (`beds`, `floor`, `room_number`, `created_at`, `updated_at`) VALUES (?,?,?, NOW(), NOW())";

  $stmt = $conn->prepare($sql);
  // assegnamo i parametri: tre numeri interi ovvero il valore delle tre variabili
  $stmt->bind_param("iii", $beds, $floor, $roomNumber);
  $stmt->execute();

  if(isset($stmt->insert_id)) {
    header("Location: $basePath/info/info.php?id=$stmt->insert_id");
  } else {
    echo 'KO';
  }
