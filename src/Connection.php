<?php

class Connection {

  private const SERVERNAME = 'localhost';
  private const DATABASE = 'gerpet';
  private const USERNAME = 'root';
  private const PASSWORD = '';

  public static function newConnection() {
    try {
      $conn = new PDO('mysql:host='.self::SERVERNAME.';dbname='.self::DATABASE, self::USERNAME, self::PASSWORD);
      return $conn;
    } catch (PDOException $e) {
      echo $e; #remover antes de entregar
      return null;
    }
  }

}

?>
