<?php

$user = [
   'email' => 'juan@gmail.com',
   //key => value
   'password' => '34353435',
];

$user = ['juan', 'antonio', 'lists'];


class PostgreSQL {
   $client;

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
   function consultar(string $stament) {
      $this->client->query($stament)->fetchAll();
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