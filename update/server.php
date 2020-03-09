<?php
  include __DIR__ . '/../database.php';
  include __DIR__ . '/../functions.php';

  $idRoom = $_POST['id'];
  $beds = $_POST['beds'];
  $floor = $_POST['floor'];
  $roomNumber = $_POST['room_number'];

  // facciamo delle verifiche per vedere se l'utente ha compilato tutti i campi
  if (empty($idRoom)) {
    die('ID non inserito');
  }
  if (empty($beds)) {
    die('Numero letti non inserito');
  }
  if (empty($floor)) {
    die('Numero piano non inserito');
  }
  if (empty($roomNumber)) {
    die('Numero stanza non inserito');
  }
  // eseguiamo un foreach su tutti i post per verificare che i valori inseriti siano dei numeri (considerato che ogni campo deve essere necessariamente compilato con un numero)
  foreach ($_POST as $key => $value) {
    if (intval($value) == 0) {
      die("$key non è un numero");
    }
  }

  $result = getById($conn, 'stanze', $idRoom);

  // se i valori del risultato sono più di 0 (ovvero la l'id che ci viene passato esiste ed è assegnato ad una stanza)(utilizziamo count perché il return della funzione sopra ci darà un array)
  if (count($result) > 0) {
    // dato che stiamo facendo un injection utilizziamo i punti interrogativi come segnaposto nei campi dove ci saranno i nuovi valori che verranno aggiunti per evitare che il form venga rotto dall'inserimento di valori non autorizzati
    $sql = "UPDATE `stanze` SET `room_number` = ?, `beds` = ?, `floor` = ?, `updated_at` = NOW() WHERE id = ?";
    // prepariamo la statement sql
    $stmt = $conn->prepare($sql);
    // definiamo che i parametri che andremo a passare sono tutti integer (iiii = integer x 4), e sono, rispettivamente in ordine, le variabili dichiarate
    $stmt->bind_param("iiii", $roomNumber, $beds, $floor, $idRoom);
    // eseguiamo la statemenet
    $stmt->execute();
    // chiudiamo la chiamata
    $conn->close();

    // se la statement ottiene un risultato positivo
    if ($stmt->affected_rows > 0) {
      // veniamo reindirizzati alla pagina della nuova stanza
      header("Location: $basePath/info/info.php?id=$idRoom");
    } else {
      echo 'KO';
    }
  }
  // altrimenti la stanza non esiste
  else {
    die('La stanza non esiste');
  }
