<?php
  include "env.php";

  // facciamo una variabile che stabilisce la nostra connessione che, per funzionare, ha bisogno dei dati tra le parentesi (in questo caso li prende dall'include di env.php)
  $conn = new mysqli($servername, $username, $password, $dbname);

  // se la connessione avviene con successo ma ha un'errore mandiamo il messaggio se stoppiamo il resto (die())
  if ($conn && $conn->connect_error) {
    echo 'Errore di connessione ' . $conn->connect_error;
    die();
  }
