<?php

class Database extends DatabaseInfo{

  protected function connect(){

    $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

    // Set charset for unicode problem solve
    $conn->set_charset("utf8");

    // Check connection error
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }


    return $conn;
    // echo "Connected successfully";
    
  }

} // class Database