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

      if($result && pg_fetch_all($result) !== false) {
         $output = pg_fetch_all($result);
      }

      return $output;
   }

   function saveSession(array $datas) {
      $nextSeq = $this->consultar("SELECT nextval('sessions_id_seq');");

      $sessionId = $nextSeq[0]['nextval'];; 

      $datas[] = $sessionId;
      $data = implode(',', $datas);
      $statement = "INSERT INTO sessions(process_id, ip_address, user_id, id) VALUES($data)";

      pg_query($this->client, $statement);

      return $sessionId; 
   }
}
