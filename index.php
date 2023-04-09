<?php

require_once 'src/datasource/PostgreSQL.php';

session_start();

if(!isset($_SESSION['session_id'])) {
   $url = 'src/login.php';
   header('Location: ' . $url, true);

   exit();
}

$interfaces = [
 1 => ['/src/views/registro.php', 'Registro'],
 2 => ['catalogo.php', 'Catalogo'],
 3 => ['prestamo.php', 'Prestamo'],
 4 => ['prestamo.php', 'Prestamo'],
 5 => ['estudiantes.php', 'Estudiantes'],
];

$losQueTiene = $_SESSION['interfaces'];

?>

<nav>
  <ul>
    <?php
      foreach($losQueTiene as $value) {
        $key = $value['o_id_iu'];
        $ruta = $interfaces[$key][0];
        $label = $interfaces[$key][1];

        echo "<li><a href=\"$ruta\">$label</a></li>";
      }
    ?>
  </ul>
</nav>

<button id="logout">Cerrar Session</button>

<script>
  const button = document.getElementById('logout');

  button.onclick = () => {
    document.cookie = `PHPSESSID=; path=/; expires=Thu, 01 Jan 1970 00:00:01 GMT`;

    window.location = '/src/login.php';
  }
</script>


