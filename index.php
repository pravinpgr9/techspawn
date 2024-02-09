<?php

// Allow requests from any origin
header("Access-Control-Allow-Origin: *");

// Allow certain HTTP methods (e.g., GET, POST, PUT, DELETE)
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

// Allow certain headers to be sent with the request (e.g., Content-Type)
header("Access-Control-Allow-Headers: Content-Type");

// Allow credentials (if needed)
header("Access-Control-Allow-Credentials: true");


require_once 'EmployeeController.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$apiKey = isset($_GET['apiKey']) ? $_GET['apiKey'] : '';

$employeeController = new EmployeeController();

try {
    switch ($action) {
        case 'view':
            $authResult = $employeeController->authenticate($apiKey);
            if ($authResult['status']) {
                // Authentication successful, proceed with other operations
                $response = $employeeController->viewEmployees();
            } else {
                $response = $authResult;
            } 
            break;
        case 'add':  
            $authResult = $employeeController->authenticate($apiKey);
            if ($authResult['status']) {
                $requestData = json_decode(file_get_contents('php://input'), true); 
                // Authentication successful, proceed with add employee operations
                $response = $employeeController->addEmployee($requestData);
            } else {
                $response = $authResult;
            }
            break;
        case 'edit': 
            $authResult = $employeeController->authenticate($apiKey);
            if ($authResult['status']) {
                // Authentication successful, proceed with edit employee operations
                $response = $employeeController->editEmployee($_GET['id']);
            } else {
                $response = $authResult;
            } 
            break;
        case 'update':
            $authResult = $employeeController->authenticate($apiKey);
            if ($authResult['status']) {
                // Authentication successful, proceed with edit employee operations
                $requestData = json_decode(file_get_contents('php://input'), true);
                $response = $employeeController->updateEmployee($requestData);
            } else {
                $response = $authResult;
            }
            break;
        case 'delete':
            $authResult = $employeeController->authenticate($apiKey);
            if ($authResult['status']) {
                // Authentication successful, proceed with edit employee operations
                $response = $employeeController->deleteEmployee($_GET['id']);
            } else {
                $response = $authResult;
            }
            break; 
        default:
            $response = ['error' => 'Invalid action'];
    }

    echo json_encode($response);
} catch (Exception $e) {
    $response = ['error' => $e->getMessage()];
    http_response_code(500);
    echo json_encode($response);
}
?>
