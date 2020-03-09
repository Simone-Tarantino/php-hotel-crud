<?php
  include __DIR__ . '/server.php';
  include __DIR__ . '/partials/header.php';
?>


    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Stanza</th>
          <th>Piano</th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (!empty($rooms)){
          foreach ($rooms as $room) {
        ?>
            <tr>
              <td><?php echo $room["id"];  ?></td>
              <td><?php echo $room["room_number"] ?></td>
              <td><?php echo $room["floor"] ?></td>
              <td><a href="info/info.php?id=<?php echo $room['id'] ?>">INFO STANZA</a></td>
              <td><a href="#">UPDATE INFO STANZA</a></td>
              <td>
                <!-- con il form facciamo la chiamata post per il delete e mettiamo come action la pagina che deve essere raggiunta con il form e il metodo, POST (per questioni di sicurezza).
                Tramite l'input, di tipo hidden dato che non vogliamo mostrare nulla all'utente a parte la nostra scritta DELETE (simile ad un bottone), passiamo il valore id (name) e l'id stesso della camera (value) alla pagina delete.php che tramite il GET elimina il nostro elemento-->
                <form action="delete/delete.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $room['id'] ?>">
                  <input class="btn-danger" type="submit" value="DELETE">
                </form>
              </td>
            </tr>
        <?php
          }
        }
        ?>
      </tbody>
    </table>
<?php include __DIR__ . "/partials/footer"; ?>
