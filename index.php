<?php
  include 'database.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="dist/app.css">
    <title>php-hotel-crud</title>
  </head>
  <body>
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
              <td><a href="#">UPDATE</a></td>
              <td>ELIMINA</td>
            </tr>
        <?php
          }
        }
        ?>
      </tbody>
    </table>
  </body>
</html>
