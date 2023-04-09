<?php

require_once 'src/datasource/PostgreSQL.php';

session_start();

if(!isset($_SESSION['session_id'])) {
   $url = 'src/login.php';
   header('Location: ' . $url, true);

   exit();
}

$interfaces = [
 1 => ['prestamo.php', 'Prestamo'],
 2 => ['catalogo.php', 'Catalogo'],
 3 => ['prestamo.php', 'Prestamo'],
 4 => ['prestamo.php', 'Prestamo'],
 5 => ['estudiantes.php', 'Estudiantes'],
];

$losQueTiene = [2,5];

?>

<nav>
  <ul>
    <?php
      foreach($losQueTiene as $value) {
        $ruta = $interfaces[$value][0];
        $label = $interfaces[$value][1];

        echo "<li><a href=\"$ruta\">$label</a></li>";
      }
    ?>
  </ul>
</nav>
