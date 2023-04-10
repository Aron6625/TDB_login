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

  $usern_windows = $sql->consultar(
    "SELECT * FROM ingresar('$user','$password');"
  );

 // var_dump($user);

  if(!empty($usern_windows)) {
    $id_usern = $usern_windows[0]['user_id'];
     
    $userSession = [
      $id_usern,
      $PID,
      
    ];

    $sessionId = $sql->saveSession($userSession);

    $_SESSION['session_id'] = $sessionId;
    $_SESSION['ventana']= $usern_windows;


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
