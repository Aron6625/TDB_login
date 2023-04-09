<?php

require_once 'Action/PostgreSQL.php';

session_start();

if(isset($_SESSION['session_id']))
  header('Location: /', true);

$sql = new PostgreSQL();

$response = $sql->consultar('SELECT pg_backend_pid();');
$PID = $response[0]['pg_backend_pid'];

if(isset($_POST['user']) && !empty($_POST['user'])) {
  $user = $_POST['user'];
  $password = $_POST['password'];

  $user = $sql->consultar(
    'SELECT * FROM "usern" '.
    "WHERE \"usuario\" = '$user'".
    " AND \"password\" = '$password'"
  );

  var_dump($user);

  if(!empty($user)) {
    $id_usern = $user[0]['id_usern'];
     

    $userSession = [
      $id_usern,
      $PID,
      
    ];

    $sessionId = $sql->saveSession($userSession);

    $_SESSION['session_id'] = $sessionId;

    header('Location: /', true);
  }
}


?>
  <link rel="stylesheet" href="/src/assets/login_style.css">
<h4>
  <?php echo "Process id: $PID"  ?>
</h4>

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
