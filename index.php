<?php

require_once 'src/datasource/PostgreSQL.php';

session_start();

if(!isset($_SESSION['session_id'])) {
   $url = 'src/login.php';
   header('Location: ' . $url, true);

   exit();
}
$interfaces = [
  1 => ['src/view/prestamo.php','Prestamo'],
  2 => ['src/view/registro.php','registro'],
  3 => ['lista-estudiantes.php','lista-estudiantes'],
  4 => ['devolucion.php','devolucion'],
  5 => ['asignar-computadoras.php','asiganar'], 
];  
   $valor = $_SESSION['iu_ax'];
?>
  <nav>
    <ul>
      <?php  
        foreach($valor as $value){
          $key = $value['o_id_iu'];
          $ruta = $interfaces[$key][0];
          $label = $interfaces[$key][1];
          echo "<li><a href=\"$ruta\">$label</a></li>";
        }
      ?>
    </ul>
  </nav>
  <button id="salir">Cerrar Session</button>

  <script>
    const button = document.getElementById('salir');
    button.onclick = () => {
      document.cookie = 'PHPSESSID=; path=/; expires=Monday, 10 May 1914 00:00:01 GMT';
      window.location = 'src/login.php'
    }
  </script>