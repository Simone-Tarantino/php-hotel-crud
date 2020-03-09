<?php
  include __DIR__ . '/../database.php';

  if(empty($_POST['id'])) {
    die('Nessun ID inserito');
  }

  // usiamo post per questioni di sicurezza
  // post va passata per forza con un form
  $idRoom = $_POST['id'];

  $sql = "DELETE from `stanze` WHERE `id` = $idRoom";
  $result = $conn->query($sql);

  if($result) {
    echo 'OK';
  }
  else {
    echo 'KO';
  }

  $conn->close();
