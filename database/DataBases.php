<?php 

namespace database;

use PDO;
use PDOException;

class DataBases{

  private $connections;

  private $Opstion = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION , PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC , PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAME utf8');

  private $dbHost = DB_HOST;

  private $dbname = DB_NAME;

  private $dbUserName = DB_USERNAME;
  private $dbPassword = DB_PASSWORD;

  function __construct(){

    try{

      $this->connections = new PDO('mysql:host='. $this->dbHost.';dbname=' . $this->dbname, $this->dbUserName,
      $this->dbPassword);

      // echo 'OK';

    }catch(PDOException $e){

      echo "ERROR" . $e->getMessage();

    }


  }

  public function select($sql , $valeus = null){

    try{

      $stmt = $this->connections->prepare($sql);
      if($valeus == null){

        $stmt->execute();

      }else{
        $stmt->execute($valeus);
      }
      $result = $stmt;

      return $result;


    }catch(PDOException $e){

      echo "ERROR". $e->getMessage();
      return false;
    }

  }

  public function insert($tablName , $fields , $valeus){

    try{

      $stmt = $this->connections->prepare("INSERT INTO " . $tablName . "(" . implode(", ", $fields) . ", 
      created_at ) VALUES ( :". implode(", :", $fields) .", now() );");
      $stmt->execute(array_combine($fields , $valeus));

      return true;

    }catch(PDOException $e){
      echo "ERROR". $e->getMessage();
      return false;
    }


  }

  public function update($tablName ,$id, $fields , $valeus){

    $sql = "UPDATE " . $tablName . " SET";
    foreach(array_combine($fields , $valeus) as $field => $valeu){

      if($valeu){

        $sql .= " `" . $field . "` = ? ,";

      }else{
        $sql .= " `". $field . "` = null ,";
      }
        
    }
    $sql .= "updated_at = now()";
    $sql .= "WHERE id = ?";
    try{

      $stmt = $this->connections->prepare($sql);
      $stmt->execute(array_merge(array_filter(array_values($valeus)) , [$id]));
      return true;

    }catch(PDOException $e){

      echo "ERROR". $e->getMessage();
      return false;
    }


  }

  public function delete($tablName ,$id){

    $sql = "DELETE FROM " . $tablName . " WHERE id = ?;";
    try{
      $stmt = $this->connections->prepare($sql);
      $stmt->execute([$id]);
      return true;
    }catch(PDOException $e){
      echo "ERROR". $e->getMessage();
    }

  }

}