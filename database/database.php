<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "oop_web";
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function __destruct() {
        if ($this->conn !== null) {
            $this->conn = null; // Close the connection when the object is destroyed.
        }
    }
}
?>