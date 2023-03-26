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
   function consultar(string $stament): array {
    $output = [];

    $result = pg_query($this->client, $stament);  

    if ($result) $output = pg_fetch_all($result);

    return $output;
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

$sql = new PostgreSQL(); 

$arr = $sql->consultar("SELECT * FROM users");

print_r($arr);
