<?php

require_once 'src/datasource/PostgreSQL.php';

session_start();

if(!isset($_SESSION['session_id'])) {
   $url = 'src/login.php';
   header('Location: ' . $url, true);

   exit();
}

$sql = new PostgreSQL();

$response = $sql->consultar('SELECT pg_backend_pid();');
$processId = $response[0]['pg_backend_pid'];

$page = <<<XML
  <h1>Process ID: $processId</h1>
  <h1>Main Page.....</h1>
XML;

echo $page;
