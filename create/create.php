<?php
  include __DIR__ . '/../partials/header.php';
?>

<div class="container">
  <div class="row">
    <div class="col-4 mx-auto">
      <form action="server.php" method="POST">
        <div class="form-group">
          <label for="room_number">Numero di Stanza</label>
          <input class="form-control" type="text" name="room_number" placeholder="Inserisci il numero della stanza" value="">
        </div>
        <div class="form-group">
          <label for="floor">Piano</label>
          <input class="form-control" type="text" name="floor" placeholder="Inserisci il numero del piano" value="">
        </div>
        <div class="form-group">
          <label for="beds">Numero di letti</label>
          <input class="form-control" type="text" name="beds" placeholder="inserisci il numero dei letti" value="">
        </div>
        <div class="form-group">
          <input class="form-control" class="btn btn-submit" type="submit" value="Salva">
        </div>
      </form>
    </div>
  </div>
</div>

<?php
  include __DIR__ . '/../partials/footer.php'
?>
