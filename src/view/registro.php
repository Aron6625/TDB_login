<?php

session_start();

require_once '../datasource/PostgreSQL.php';

$sql = new PostgreSQL();

$estatos = $sql->consultar(
  "SELECT * FROM estado"
);

if(isset($_POST['nombre_comp'])) {
  $sql->insert('computadora', $_POST);
}

?>

<head>
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
      name="nombre_comp"
      required
      placeholder="Nombre"
    >
    <input
      class="form-control mb-3"
      name="marca"
      required
      placeholder="Marca"
    >
    <input
      class="form-control mb-3"
      name="modelo"
      required
      placeholder="Modelo"
      
    >
    <select name="id_estado" class="form-control mb-4">
      <option selected="selected" disabled>Estado</option>
      <?php 
        foreach($estatos as $estado) {
          $name = $estado['estado'];
          $id = $estado['id_estado'];

          echo "<option value=\"$id\">$name</option>";
        }
      ?>
    </select>

    <button
      type="submit"
      class="btn btn-primary"
    >Submit</button>
      </div>
    </div>
  </form>
</body>