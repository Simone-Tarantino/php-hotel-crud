<?php
  include "env.php";

  // facciamo una variabile che stabilisce la nostra connessione che, per funzionare, ha bisogno dei dati tra le parentesi (in questo caso li prende dall'include di env.php)
  $conn = new mysqli($servername, $username, $password, $dbname);

  // se la connessione avviene con successo ma ha un'errore mandiamo il messaggio se stoppiamo il resto (die())
  if ($conn && $conn->connect_error) {
    echo 'Errore di connessione ' . $conn->connect_error;
    die();
  }

  // dal db facciamo questa chiamata sql in cui vogliamo tutti i dati dalla tabella "stanze" e definiamo il risultato che è uguale alla query
  $sql = "SELECT * FROM `stanze`";
  $result = $conn->query($sql);

  // se le operazion in result avvengono correttamente e il numero di risultati (colonne, rows) sono maggiori di 0 allora
  if($result && $result->num_rows > 0) {
    // creiamo un array vuoto per contenere tutte le nostre stanze
    $rooms = [];
    // finché la row ha un risultato (un'array), prendiamo la row e la inseriamo nella nostro array vuoto Rooms
    while ($row = $result->fetch_assoc()) {
      $rooms[] = $row;
    }
  }
  // se la connessione con la query avviene correttamente ma non ci sono risultati
  elseif ($result) {
    echo 'No results';
  }
  // se ci sono errori con la query
  else {
    echo 'Query error';
  }
  // chiudiamo la connessione
  $conn->close();
