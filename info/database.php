<?php
  include __DIR__ . "/../env.php";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn && $conn->connect_error) {
    echo 'Errore di connessione ' . $conn->connect_error;
    die();
  }

  $idRoom = $_GET['id'];

  $sql = "SELECT * FROM `stanze` WHERE `id` =  $idRoom";
  $result = $conn->query($sql);

  if ($result && $result->num_rows > 0) {
    $room = $result->fetch_assoc();
  } elseif ($result) {
    echo 'No results';
  } else {
    echo 'Query error';
  }

  $conn->close();
