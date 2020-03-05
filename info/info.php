<?php
  include __DIR__ . '/database.php';
  include __DIR__ . '/../partials/header.php';
?>

  <body>
    <ul class="list-group">
      <li class="list-group-item">Id: <?php echo $room['id'] ?></li>
      <li class="list-group-item">Piano: <?php echo $room['floor'] ?></li>
      <li class="list-group-item">Numero Stanza: <?php echo $room['room_number'] ?></li>
      <li class="list-group-item">Letti: <?php echo $room['beds'] ?></li>
    </ul>
  </body>
</html>
