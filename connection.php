<?php

//$servername = "localhost";
//$username = "root";
//$password = "";
//
//try {
//  $conn = new PDO("mysql:host=$servername;dbname=youcrafting", $username, $password);
//  $conn->exec('SET NAMES "UTF8"');
//} catch(PDOException $e) {
//  echo "Connection failed: " . $e->getMessage();
//}

class Connection{
  private $host = "localhost";
  private $user = "root";
  private $pwd = "";
  private $dbname = "youcrafting";
  public $conn;
  protected function connectdb(){
    $this->conn = null;
    try{
      $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->user, $this->pwd);

    }catch(PDOException $exception){
      echo "Connection error: " . $exception->getMessage();
    }
    return $this->conn;
  }
}



?>

