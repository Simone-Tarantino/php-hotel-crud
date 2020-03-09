<?php

  // funzione per prendere tutti i risultati di una tabella
  function getAll($conn, $table) {
    // dal db facciamo questa chiamata sql in cui vogliamo tutti i dati dalla tabella "stanze" e definiamo il risultato che è uguale alla query
    $sql = "SELECT * FROM $table";
    $result = $conn->query($sql);

    // se le operazion in result avvengono correttamente e il numero di risultati (colonne, rows) sono maggiori di 0 allora
    if($result && $result->num_rows > 0) {
      // creiamo un array vuoto per contenere tutti i nostri risultati
      $results = [];
      // finché la row ha un risultato (un'array), prendiamo la row e la inseriamo nella nostro array vuoto Rooms
      while ($row = $result->fetch_assoc()) {
        $results[] = $row;
      }
    }
    // se la connessione con la query avviene correttamente ma non ci sono risultati
    elseif ($result) {
      $results = [];
    }
    // se ci sono errori con la query
    else {
      $results = false;
    }
    // ritorniamo sempre la variabile $results come risultato della funzione
    return $results;
  }


  // funzione per prendere tutti i risultati dato un id specifico in una tabella

  function getById($conn, $table, $id) {

    $sql = "SELECT * FROM `$table` WHERE `id`='$id'";

    $resultQuery = $conn->query($sql);

    if ($resultQuery && $resultQuery->num_rows > 0) {
      $result = $resultQuery->fetch_assoc();
    } elseif ($result) {
      $result = [];
    } else {
      $result = false;
    }

    return $result;
  }
