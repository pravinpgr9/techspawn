<?php
class DB
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'techspawn';

    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            throw new Exception("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function executeQuery($query)
    {
        $result = $this->conn->query($query);
        if (!$result) {
            throw new Exception("Query execution failed: " . $this->conn->error);
        }
        
        // Check if the result is a valid result set before fetching data
        if ($result instanceof mysqli_result) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            // If $result is not a valid result set, return an empty array
            return array();
        }
    }

    public function getConnection()
  {
    try {
      $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conn;
    } catch(PDOException $e) {
      throw new Exception($e->getMessage());
    }
  }

}
?>
