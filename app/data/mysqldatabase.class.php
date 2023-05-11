



<?php

require_once(APP_PATH.'app/data/client.class.php');

class MysqlDatabase {

  private $host = CONFIG['db']['host'];
  private $port = CONFIG['db']['port'];
  private $username = CONFIG['db']['username'];
  private $password = CONFIG['db']['password'];
  private $dbname = CONFIG['db']['dbname'];

  private $pdo = null;

  function __construct() {
    $this->pdo = $this->connect();
  }

  function __destruct() {
    $this->disconnect();
  }


  private function connect() {
    $dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->dbname;charset=utf8";
    try {
      return new PDO($dsn, $this->username, $this->password);
    } catch (PDOException $e) {
      throw $e;
      return null;
    }
  }

  function disconnect() {
    unset($this->pdo);
    $this->pdo = null;
  }

  private function is_connection_established() : bool {
    return $this->pdo !== null;
  }


  function execute($sql, $params = null) {

    if(!$this->is_connection_established())
      return false;

    try {
      $stmt = $this->pdo->prepare($sql);
      $this->pdo->beginTransaction();
      $stmt->execute($params);
      $stmt->closeCursor();
      if($this->pdo->inTransaction()) { 
        $this->pdo->commit();
      }
    } catch(Exception $ex) {
      /* 
      checking if the transaction has been began (not including those started via SQL queries !)
      if true roll back (go back to the first db state before attemping to chnage data or schema)
      */
      if($this->pdo->inTransaction()) { 
        $this->pdo->rollBack();
      }
      print($ex);
      return false;
    }
    return true;
  }


  function query($sql, $params = null) {

    if(!$this->is_connection_established())
      return false;

    $query = null;

    try {
      // $this->pdo->beginTransaction();

      if(empty($params)) {
        $query = $this->pdo->query($sql);
      } else {
        $query = $this->pdo->prepare($sql);
        $query->execute($params);
      }

      // $this->pdo->commit();

    } catch(Exception $ex) {
      // if($this->pdo->inTransaction()) { 
      //   $this->pdo->rollBack();
      // }
      print($ex);
      return false;
    }

    $data = $query->fetchAll(PDO::FETCH_CLASS, 'Client');
    $query->closeCursor();
    $query = null;
    return $data;
  }
}



?>