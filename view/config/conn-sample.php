<?php

class Database{

  // Object
  public $servername = "localhost";
  public $username = "asifulmamun";
  public $password = "";
  public $dbname = "febrms";

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

}