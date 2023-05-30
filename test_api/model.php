<?php
class Database
{
    private $conn;

    public function __construct($servername, $username, $password, $dbname , $port)
    {
        $this->conn = new mysqli($servername, $username, $password, $dbname , $port);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function addData($data)
    {
        $stmt = $this->conn->prepare("INSERT INTO students (column_name) VALUES (?)");
        $stmt->bind_param("s", $data);
        $stmt->execute();
        $stmt->close();
    }

    public function getAllData()
    {
        $sql = "SELECT * FROM students";
        $result = $this->conn->query($sql);

        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    public function updateData($id, $newData)
    {
        $stmt = $this->conn->prepare("UPDATE students SET column_name = ? WHERE id = ?");
        $stmt->bind_param("si", $newData, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function closeConnection()
    {
        $this->conn->close();
    }
}
?>
