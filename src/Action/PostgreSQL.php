<?php

class PostgreSQL {
   private $client;

   function __construct() {
      $this->connect();
   }

   function connect() {
      $host        = "host = postgresql";
      $port        = "port = 5432";
      $dbname      = "dbname = mmc";
      $credentials = "user = mmc password=mmc";

      $this->client = pg_connect("$host $port $dbname $credentials");
      var_dump($this->client); //view 

      if(isset($_SESSION['session_id'])) {
         $sessionId =  $_SESSION['session_id'];
         
        

         $statement = "UPDATE sesion SET PID = pg_backend_pid() WHERE id_sesion = $sessionId";
         pg_query($this->client, $statement);
      }
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
      $nextSeq = $this->consultar("SELECT nextval('sesion_id_sesion_seq');");

      $sessionId = $nextSeq[0]['nextval'];; 

      $datas[] = $sessionId;
      $data = implode(',', $datas);
      $statement = "INSERT INTO SESION (id_usern, PID, id_sesion) VALUES($data)";

      pg_query($this->client, $statement);

      return $sessionId; 
   }
}