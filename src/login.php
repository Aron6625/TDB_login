<?php

require_once 'datasource/PostgreSQL.php';

session_start();

if(isset($_SESSION['session_id']))
  header('Location: /', true);

$sql = new PostgreSQL();

$response = $sql->consultar('SELECT pg_backend_pid();');
$processId = $response[0]['pg_backend_pid'];

if(isset($_POST['user']) && !empty($_POST['user'])) {
  $user = $_POST['user'];
  $password = $_POST['password'];

  $user = $sql->consultar(
    'SELECT * FROM "users" '.
    "WHERE \"name\" = '$user'".
    " AND \"password\" = '$password'"
  );

  if(!empty($user)) {
    $userId = $user[0]['id'];
    $ipAddr = $_SERVER['REMOTE_ADDR']; 

    $userSession = [
      $processId,
      "'$ipAddr'",
      $userId,
    ];

    $sessionId = $sql->saveSession($userSession);

    $_SESSION['session_id'] = $sessionId;

    header('Location: /', true);
  }
}

$formla = <<<XML
  <h1>Process ID: $processId</h1>
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
