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

      if(isset($_SESSION['session_id'])) {
         $sessionId =  $_SESSION['session_id'];

         $statement = "UPDATE sessions SET process_id = pg_backend_pid() WHERE id = $sessionId";
         pg_query($this->client, $statement);
      }
   }

   function consultar(string $stament): array {
      $output = [];

      $result = pg_query($this->client, $stament);  

      if($result && pg_fetch_all($result) !== false) {
         $output = pg_fetch_all($result);
      }

      return $output;
   }

   function insert(string $table, array $datas) {
      $fields = implode(',', array_keys($datas));

      $valuesArr = array_map(
         function($item) { 
            if(gettype($item) === 'string') {
               $item = "'$item'"; 
            }

            return $item;
         }, array_values($datas)
      );

      $values = implode(',', $valuesArr);

      $this->consultar("INSERT INTO $table($fields) VALUES($values)");
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
