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

?>

<head>
  <link rel="stylesheet" href="/src/assets/login_style.css">
</head>
<body>
<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="login" method="POST">
<?php
  echo "<h4>Process id: $processId</h4>"
?>
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" name="user" class="login__input" placeholder="User name / Email">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" name="password" class="login__input" placeholder="Password">
				</div>
				<button class="button login__submit" type="submit">
					<span class="button__text">Log In Now</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>				
			</form>
			<div class="social-login">
				<h3>log in via</h3>
				<div class="social-icons">
					<a href="#" class="social-login__icon fab fa-instagram"></a>
					<a href="#" class="social-login__icon fab fa-facebook"></a>
					<a href="#" class="social-login__icon fab fa-twitter"></a>
				</div>
			</div>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
</body>