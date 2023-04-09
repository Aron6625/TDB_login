<?php

require_once '../datasource/PostgreSQL.php';

if(isset($_POST['nombre_comp'])) {
  $sql = new PostgreSQL();

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
      placeholder="Marca"
    >
    <input
      class="form-control mb-3"
      name="modelo"
      placeholder="Modelo"
    >

    <button
      type="submit"
      class="btn btn-primary"
    >Submit</button>
      </div>
    </div>
  </form>
</body>