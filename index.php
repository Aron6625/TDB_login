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
  2 => ['src/view/registro.php','Registro'],
  3 => ['lista-estudiantes.php','Ver computadoras'],
  4 => ['src/view/devolucion.php','Devolución'], 
];  
$valor = $_SESSION['iu_ax'];
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}
		nav {
			background-color: #333;
			color: #fff;
			display: flex;
			justify-content: space-between;
			align-items: center;
			padding: 10px 20px;
		}
		nav ul {
			margin: 0;
			padding: 0;
			list-style: none;
			display: flex;
		}
		nav li {
			margin: 0 10px;
		}
		nav a {
			color: #fff;
			text-decoration: none;
			padding: 5px;
		}
		nav a:hover {
			background-color: #fff;
			color: #333;
		}
		button {
			background-color: #f44336;
			color: #fff;
			border: none;
			border-radius: 4px;
			padding: 10px 20px;
			font-size: 16px;
			cursor: pointer;
			margin: 20px;
			float: right;
		}
		button:hover {
			background-color: #d32f2f;
		}
	</style>
</head>
<body>
	<nav>
		<h1></h1>
		<ul>
			<?php foreach($valor as $value): ?>
				<?php $key = $value['o_id_iu']; ?>
				<?php if(isset($interfaces[$key])): ?>
					<?php $ruta = $interfaces[$key][0]; ?>
					<?php $label = $interfaces[$key][1]; ?>
					<li><a href="<?php echo $ruta; ?>"><?php echo $label; ?></a></li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ul>
	</nav>
	<button id="salir">Cerrar sesión</button>
	<script type="text/javascript">
		const button = document.getElementById('salir');
		button.onclick = () => {
			document.cookie = 'PHPSESSID=; path=/; expires=Monday, 10 May 1914 00:00:01 GMT';
			window.location = 'src/login.php'
		}
	</script>
</body>
</html>
