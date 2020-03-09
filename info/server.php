<?php
  include __DIR__ . "/../database.php";
  include __DIR__ . "/../functions.php";

  if(empty($_GET['id'])) {
    die('ID non esistente');
  }

  // da questa chiamata get prendiamo l'id della relativa stanza
  $idRoom = $_GET['id'];

  $room = getById($conn, 'stanze', $idRoom);

  $conn->close();
