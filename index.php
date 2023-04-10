<?php

  require_once 'src/Action/PostgreSQL.php';

session_start();

if(!isset($_SESSION['session_id'])) {
   $url = 'src/login.php';
   header('Location: ' . $url, true);

   exit();
}

$usern_windows = [
 1 => ['src/vistas/prestamos.php', 'prestamos'         ],
 2 => ['src/vistas/registro.php', 'computadora'],
 3 => ['src/vistas/devolucion.php', 'devolucion'],
 4 => ['src/vistas/solicitar_prestamo.php', 'solicitar prestamo'],
 5 => ['src/vistas/lista_estudiante.php', 'estudiante'         ],
];

$windows = $_SESSION['ventana'];

?>

<nav>
  <ul>
    <?php
      foreach($windows as $value) {
        $key = $value['iu_id'];
        $ruta = $usern_windows[$key][0];
        $label = $usern_windows[$key][1];

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