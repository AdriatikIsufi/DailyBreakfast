<?php

// include_once('../../path.php');
require_once(ROOT_PATH . '/database/dbconnect.php');

class crudMethods {
    public $database;
    public $Query;

    public function __construct() {
        $this->database = new dbconnect();
    }

    public function selectAll($table, $conditions = []){

        $sql = "SELECT * FROM `$table`";
        if(empty($conditions)){
            $stmt = $this->database->pdo->prepare($sql);
            $stmt->execute();
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $records;
        }else {
            $i = 0;
            foreach($conditions as $key => $value){
                if($i === 0){
                    $sql = $sql . " WHERE $key=:".$key;
                } else {
                    $sql = $sql . " AND $key=:".$key;
                }
                $i++;
            }
            $stmt = $this->database->pdo->prepare($sql);
            foreach($conditions as $key => $value){
                $bin = ':'.$key;
                $stmt->bindValue($bin, $value);
            }
            $stmt->execute();
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $records;
        }
    }

    function selectOne($table, $conditions){
        $sql = "SELECT * FROM `$table`";
        $i = 0;
        foreach($conditions as $key => $value){
            if($i === 0){
                $sql = $sql . " WHERE $key=:" .$key;
            } else {
                $sql = $sql . " AND $key=:" .$key;
            }
            $i++;
        }
        $sql = $sql . " LIMIT 1";
        $stmt = $this->database->pdo->prepare($sql);
        
        foreach($conditions as $key => $value){
            $bin = ':'.$key;
            $stmt->bindValue($bin, $value);
        }
        $stmt->execute();
        $records = $stmt->fetch(PDO::FETCH_ASSOC);
        // $this->dd($records);
        return $records;
    }

    public function create($table, $data){
        // $crud = new crudMethods();
        // $crudForm->dd($data);
        $sql = "INSERT INTO `$table` SET ";
    
        $i = 0;
        foreach($data as $key => $value){
            if($i === 0){
                $sql = $sql . $key . '=' . ':' .$key;
            } else {
                $sql = $sql . ", " .$key . '=' . ':' .$key;
            }
            $i++;
        }

        // $crudForm->dd($sql);
        $stmt = $this->database->pdo->prepare($sql);
        
        foreach($data as $key => $value){
            $bin = ':'.$key;
            $stmt->bindValue($bin, $value);
        }
        
        $stmt->execute();
        $id = $this->database->pdo->lastInsertId();
        // $crudForm->dd($id);
        return $id;
    }
    
    public function update($table, $id, $data){
        $crudForm = new crudMethods();
        
        $sql = "UPDATE `$table` SET ";
    
        $i = 0;
        foreach($data as $key => $value){
            if($i === 0){
                $sql = $sql . $key . '=' . ":" .$key;
            } else {
                $sql = $sql . ", " .$key . '=' . ":" .$key;
            }
            $i++;
        }
        // $data['id'] = $id;
        $sql = $sql . " WHERE id=". $id;
        // $this->dd($data);

        $stmt = $this->database->pdo->prepare($sql);

        foreach($data as $key => $value){
            $bin = ':'.$key;
            $stmt->bindValue($bin, $value);
        }
        // $idValue = $data['id'];
        // $idbin = ':id';
        // $stmt->bindValue($idbin, $idValue);
        $stmt->execute();
        // $crudForm->dd($stmt);
        return $stmt->rowCount();        
    }
    
    public function delete($table, $id){
        $sql = "DELETE FROM `$table` WHERE id=:id";
        $stmt = $this->database->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
