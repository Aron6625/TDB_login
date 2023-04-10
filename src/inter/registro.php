<?php
require_once '../Action/PostgreSQL.php';

if(isset($_POST['nombrecomp'])) {
  $sql = new PostgreSQL();
  
  $datas = sprintf(
    "'%s', '%s', '%s'",
    $_POST['nombrecomp'],
    $_POST['memoria'],
    $_POST['so'],
  );

  var_dump($datas);
  
  $sentencia = "INSERT INTO computadora(nombrecomp, memoria, so) VALUES($datas)";

  $sql->consultar($sentencia);

  var_dump($sentencia);
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="card mx-auto mt-5" style="width: 28rem;">
      <div class="card-body">
    <h1 class="mb-4">Registro computadora</h1>
    <form method="POST">
    <input
      class="form-control mb-3"
      name="nombrecomp"
      placeholder="Nombre"
    >
    <input
      class="form-control mb-3"
      name="memoria"
      placeholder="Memoria"
    >
    <input
      class="form-control mb-3"
      name="so"
      placeholder="Sistema Operativo"
    >

    <button
      type="submit"
      class="btn btn-primary"
    >Submit</button>
      </div>
    </div>
</form>
  </body>
</html>
