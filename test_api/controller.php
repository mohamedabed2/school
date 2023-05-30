<?php
require_once 'model.php';

class Controller
{
    private $db;

    public function __construct()
    {
        $this->db = new Database("localhost", "root", "", "school" , "3308");
    }

    public function addData($data)
    {
        $this->db->addData($data);
        $this->sendResponse(true, 'Data added successfully');
    }

    public function getAllData()
    {
        $data = $this->db->getAllData();
        $this->sendResponse($data);
    }

    public function updateData($id, $newData)
    {
        $this->db->updateData($id, $newData);
        $this->sendResponse(true, 'Data updated successfully');
    }

    public function sendResponse($data, $message = null)
    {
        $response = array('success' => true, 'data' => $data);

        if ($message !== null) {
            $response['message'] = $message;
        }

        echo json_encode($response);
    }

    public function closeConnection()
    {
        $this->db->closeConnection();
    }
}
?>
