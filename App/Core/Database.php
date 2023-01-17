<?php
namespace App\Core;
class Database {
    private array $config;
    public \PDO $conn;
 
    public function __construct() {
        $this->config = (require "../config.php")['database'];
        try {
            $this->conn = new \PDO("mysql:host=" . $this->config['host'] . ";dbname=" . $this->config['dbname'], $this->config['user'], $this->config['password']);
            $this->conn->exec("set names utf8");
        } catch (\PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
    }
 
    public function addData($table, $data) {
        $fields = array_keys($data);
        $values = array_values($data);
        $fieldString = implode(',', $fields);
        $valueString = implode("','", $values);
        $sql = "INSERT INTO $table ($fieldString) VALUES ('$valueString')";
        return $this->conn->exec($sql);
    }
    
    public function findById($table, $id) {
        $sql = "SELECT * FROM $table WHERE id = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function findByColumn($table, $column, $value) {
        $sql = "SELECT * FROM $table WHERE $column = '$value'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    
    public function findAll($table) {
        $sql = "SELECT * FROM $table";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findAllByColumn($table, $column, $value) {
        $sql = "SELECT * FROM $table WHERE $column = '$value'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function updateData($table, $data, $id) {
        $fields = array_keys($data);
        $values = array_values($data);
        $setString = '';
        for($i = 0; $i < count($fields); $i++){
            $setString .= $fields[$i] . "='" . $values[$i] . "', ";
        }
        $setString = rtrim($setString, ", ");
        $sql = "UPDATE $table SET $setString WHERE id = $id";
        return $this->conn->exec($sql);
    }
    
    public function deleteData($table, $id) {
        $sql = "DELETE FROM $table WHERE id = $id";
        return $this->conn->exec($sql);
    }

    public function deleteManyData($table, array $vals) {
        $in  = str_repeat('?,', count($vals) - 1) . '?';$in  = str_repeat('?,', count($vals) - 1) . '?';
        $sql = "DELETE FROM $table WHERE id IN $in";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($vals);
    }

    public function deleteManyDataByColumn($table, $column, array $vals) {
        $in  = str_repeat('?,', count($vals) - 1) . '?';$in  = str_repeat('?,', count($vals) - 1) . '?';
        $sql = "DELETE FROM $table WHERE $column IN ($in)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($vals);
    }



    public function checkExistence($table, $column, $value) {
        $sql = "SELECT * FROM $table WHERE $column = '$value'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
