<?php

require_once '../datasource/PostgreSQL.php';

$sql = new PostgreSQL();

$estudiantes = $sql->consultar(
  "SELECT * FROM users"
);

$profesores = $sql->consultar(
  "SELECT * FROM users"
);

$computadoras = $sql->consultar(
  "SELECT * FROM computadora"
);

if(isset($_POST['id_prof'])) {
  $sql->insert('prestamo', $_POST);
}
   
?>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>
<body>
  <div class="card mx-auto mt-5" style="width: 35rem;">
    <div class="card-body">
  <h1 class="mb-4">Prestamo computadora</h1>
  <form method="POST">
    <select name="id_prof" class="form-control mb-4">
      <option selected="selected" disabled>Profesor</option>
      <?php 
        foreach($profesores as $profesore) {
          $name = $profesore['name'];
          $id = $profesore['id'];

          echo "<option value=\"$id\">$name</option>";
        }
      ?>
    </select>
    <select name="id_est" class="form-control mb-4">
      <option selected="selected" disabled>Estudiante</option>
      <?php 
        foreach($estudiantes as $estudiante) {
          $name = $estudiante['name'];
          $id = $estudiante['id'];

          echo "<option value=\"$id\">$name</option>";
        }
      ?>
    </select>
    <select name="id_comp" class="form-control mb-4">
      <option selected="selected" disabled>Computadora</option>
      <?php 
        foreach($computadoras as $computadora) {
          $name = $computadora['nombrecomp'];
          $id = $computadora['id'];

          echo "<option value=\"$id\">$name</option>";
        }
      ?>
    </select>
    <input
      class="form-control mb-4"
      type="date"
      name="FECHAPREST"
      min="2018-01-01"
      max="2018-12-31"
    >
    <button
      type="submit"
      class="btn btn-primary"
    >Prestar</button>
      </div>
    </div>
  </form>
</body>
