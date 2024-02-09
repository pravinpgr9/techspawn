<?php
require_once 'Employee.php';

class EmployeeController
{
    private $employeeModel;

    public function __construct()
    {
        $this->employeeModel = new Employee();
        $this->apiKey = '123456789'; // Hardcoded API key

    }

    public function authenticate($apiKey)
    {
        // Check if the provided API key matches the hardcoded key
        if ($apiKey !== $this->apiKey) {
            // If the API key is incorrect, return a failure response
            return ['status' => false, 'message' => 'Authentication failed: Invalid API key'];
        }

        // If the API key is correct, return a success response
        return ['status' => true, 'message' => 'Authentication successful'];
    }

    public function viewEmployees()
    {
        try {
            $employees = $this->employeeModel->getAllEmployees();
            
            // Check if any employees exist
            if (empty($employees)) {
                return ['status' => false, 'message' => 'No employees found'];
            }

            return ['status' => true, 'employees' => $employees];
        } catch (Exception $e) {
            return ['status' => false, 'message' => 'Error fetching employees: ' . $e->getMessage()];
        }
    }

    public function addEmployee($employeeData)
    {
        try {

            // Validate employee data
            if (empty($employeeData['first_name']) || empty($employeeData['last_name']) || empty($employeeData['email']) || empty($employeeData['phone_number']) || empty($employeeData['address']) || empty($employeeData['department']) || empty($employeeData['position']) || empty($employeeData['salary']) || empty($employeeData['hire_date'])) 
            {
                return ['status' => false, 'message' => 'Please provide all the required fields'];
            }  

            // Check if employee already exists based on email or phone number
            $existingEmployee = $this->employeeModel->getEmployeeByEmailOrPhone($employeeData['email'], $employeeData['phone_number']);
            if ($existingEmployee) {
                return ['status' => false, 'message' => 'Employee with the provided email or phone number already exists'];
            }

            // Call the model function to add employee
            $this->employeeModel->addEmployee($employeeData);
            
            return ['status' => true, 'message' => 'Employee added successfully'];
        } catch (Exception $e) {
            return ['status' => false, 'message' => 'Error adding employee: ' . $e->getMessage()];
        }
    }

    public function editEmployee($id)
    {
        try {
            // Fetch employee details by ID
            $employee = $this->employeeModel->getEmployeeById($id); 
            
            // Check if employee exists
            if (!$employee) {
                return ['status' => false, 'message' => 'Employee not found'];
            }
            
            return ['status' => true, 'employee' => $employee];
        } catch (Exception $e) {
            return ['status' => false, 'message' => 'Error fetching employee: ' . $e->getMessage()];
        }
    }

    public function updateEmployee($employeeData)
    {
        try {
            // Validate employee data

            if (empty($employeeData['first_name']) || empty($employeeData['last_name']) || empty($employeeData['email']) || empty($employeeData['phone_number']) || empty($employeeData['address']) || empty($employeeData['department']) || empty($employeeData['position']) || empty($employeeData['salary']) || empty($employeeData['hire_date'])) 
            {
                return ['status' => false, 'message' => 'Please submit all the provided fields'];
            } 

            // Check if the employee exists
            $existingEmployee = $this->employeeModel->getEmployeeById($employeeData['id']);
            if (!$existingEmployee) {
                return ['status' => false, 'message' => 'Employee with ID ' . $employeeData['id'] . ' not found'];
            }

            // Call the model function to update employee
            $this->employeeModel->updateEmployee($employeeData);
            
            return ['status' => true, 'message' => 'Employee updated successfully'];
        } catch (Exception $e) {
            return ['status' => false, 'message' => 'Error updating employee: ' . $e->getMessage()];
        }
    }


    public function deleteEmployee($id)
    {
        try {
            // Check if the employee exists
            $existingEmployee = $this->employeeModel->getEmployeeById($id);
            if (!$existingEmployee) {
                return ['status' => false, 'message' => 'Employee with ID ' . $id . ' not found'];
            }

            // Call the model function to delete employee
            $this->employeeModel->deleteEmployee($id);
            
            return ['status' => true, 'message' => 'Employee deleted successfully'];
        } catch (Exception $e) {
            return ['status' => false, 'message' => 'Error deleting employee: ' . $e->getMessage()];
        }
    }

}
?>
