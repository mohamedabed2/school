<?php
require_once 'controller.php';

// Instantiate the controller
$controller = new Controller();

// Handle the requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST['data'];
    $controller->addData($data);
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller->getAllData();
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $putParams);
    $id = $putParams['id'];
    $newData = $putParams['data'];
    $controller->updateData($id, $newData);
}

// Close the database connection
$controller->closeConnection();

?>
