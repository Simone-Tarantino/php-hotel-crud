<?php
  include __DIR__ . '/../database.php';
  include __DIR__ . '/../partials/header.php';

  // se l'id che viene passato con la chiamata get non è vuto
  if (!empty($_GET['id'])) {
    // allora lo mettiamo in una variabile
    $idRoom = $_GET['id'];
  }

  $sql = "SELECT * FROM `stanze` WHERE `id`='$idRoom'";

  $result = $conn->query($sql);

  if ($result && $result->num_rows > 0) {
    $room = $result->fetch_assoc();
  }
  else {
    die('ID non esistente');
  }
?>

<div class="container">
  <div class="row">
    <div class="col-4 mx-auto">
      <form action="server.php" method="POST">
        <div class="form-group">
          <label for="room_number">Numero di Stanza</label>
          <input class="form-control" type="text" name="room_number" value="<?php echo  $room['room_number'] ?>">
        </div>
        <div class="form-group">
          <label for="floor">Piano</label>
          <input class="form-control" type="text" name="floor" value="<?php echo  $room['floor'] ?>">
        </div>
        <div class="form-group">
          <label for="beds">Numero di letti</label>
          <input class="form-control" type="text" name="beds" value="<?php echo  $room['beds'] ?>">
        </div>
        <div class="form-group">
          <input type="hidden" name="id" value="<?php echo  $room['id'] ?>">
          <input class="form-control" class="btn btn-submit" type="submit" value="Salva">
        </div>
      </form>
    </div>
  </div>
</div>

<?php
include __DIR__ . '/../partials/footer.php'
?>
