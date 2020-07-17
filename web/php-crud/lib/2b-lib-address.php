<?php
class Task{
  private $pdo = null;
  private $stmt = null;

  function __construct(){
    try {
      $this->pdo = new PDO(
        "mysql:host=".MYSQL_HOST.";dbname=".MYSQL_NAME.";charset=".MYSQL_CHAR,
        MYSQL_USER, MYSQL_PASS, [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_EMULATE_PREPARES => false,
        ]
      );
    } catch (Exception $ex) { die($ex->getMessage()); }
  }

  function __destruct(){
    if ($this->stmt!==null) { $this->stmt = null; }
    if ($this->pdo!==null) { $this->pdo = null; }
  }

  function query($sql, $cond=[]){
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($cond);
    } catch (Exception $ex) { 
      $this->error = $ex->getMessage();
      return false;
    }
    $this->stmt = null;
    return true;
  }

  function create($task){
    return $this->query(
      "INSERT INTO `task_book` (`task`) VALUES (?)",
      [$task]
    );
  }

  function read(){
    $this->stmt = $this->pdo->prepare("SELECT * FROM `task_book`");
    $this->stmt->execute();
    $entries = $this->stmt->fetchAll();
    return count($entries)==0 ? false : $entries ;
  }

  function update($task, $id){
    return $this->query(
      "UPDATE `task_book` SET `task`=? WHERE `id`=?",
      [$task, $id]
    );
  }

  function delete($id){
    return $this->query(
      "DELETE FROM `task_book` WHERE `id`=?",
      [$id]
    );
  }
}
?>