<?php

require_once 'datasource/PostgreSQL.php';

if(isset($_POST['user']) && !empty($_POST['user'])) {
  $user = $_POST['user'];
  $password = $_POST['password'];

  $sql = new PostgreSQL();

  $user = $sql->consultar(
    'SELECT * FROM "users" '.
    "WHERE \"name\" = '$user'".
    " AND \"password\" = '$password'"
  );

  if(!empty($user)) {
    $processId = $sql->consultar('SELECT pg_backend_pid();');

    var_dump($user);
    var_dump($processId);
  }
}

$formla = <<<XML
  <link rel="stylesheet" href="/src/assets/login_style.css">

  <form
    method="POST"
    name="some-data"
  >
    <div class="form-element">
      <label>Username</label>
      <input type="text" name="user" pattern="[a-zA-Z0-9]+" required />
    </div>
    <div class="form-element">
      <label>Password</label>
      <input type="password" name="password" required />
    </div>
    <button type="submit">Log In</button>
  </form>
XML;

echo $formla;
