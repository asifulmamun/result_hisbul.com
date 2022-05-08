<?php

class Database{

  // Object
  private $servername;
  private $username;
  private $password;
  private $dbname;



  protected function connect(){

    $this->servername = "hisbul.com";
    $this->username = "hisbulm_hisbulm_results_manger";
    $this->password = "#HisbulDBMager_R";
    $this->dbname = "hisbulm_results";


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