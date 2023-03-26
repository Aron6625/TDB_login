<?php

class PostgreSQL {
   private $client;

   function __construct() {
      $this->connect();
   }

   function connect() {
      $host        = "host = postgresql";
      $port        = "port = 5432";
      $dbname      = "dbname = perfectly_spoken";
      $credentials = "user = perfectly_spoken password=perfectly_spoken";

      $this->client = pg_connect("$host $port $dbname $credentials");
   }

   // $stament: 'SELECT * FROM users;'
   function consultar(string $stament): ?array {
        return pg_query($this->client, $stament);
    //   return $this->client->query($stament)->fetchAll();
   }

   // $stament: 'SELECT * FROM users;'
   function persistir(array $datas, string $table) {

      $query = '';
      // INSERT INTO COMPANY (ID,NAME,AGE,ADDRESS,SALARY)
      // VALUES (1, 'Paul', 32, 'California', 20000.00 );
      foreach($datas as $key => $value) {

      }
   
      pg_query($this->client, $query);
   }
}

// use MyApp\Datasource\PostgreSQL;

$sql = new PostgreSQL();

$sql->connect();

$users = $sql->consultar('SELECT * FROM users');

// tratar
// $arr = ['a', 'b', 'c'];


// while ($row = pg_fetch_row($users)) {
//   echo "Author: $row[0]  E-mail: $row[1]";
//   echo "<br />\n";
// }
var_dump($users);


echo 'Nuestros datos: ';
echo $_POST['password'];

var_dump($_POST);
