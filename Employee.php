<?php
require_once 'DB.php';

class Employee
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function getAllEmployees()
    {
        // Construct SQL query to fetch all employees
        $query = "SELECT * FROM employees";
        
        // Execute the query using the database connection
        return $this->db->executeQuery($query);
    }

    public function getEmployeeByEmailOrPhone($email, $phoneNumber)
    {
        // Construct SQL query to retrieve employee by email or phone number
        $query = "SELECT * FROM employees WHERE email = '$email' OR phone_number = '$phoneNumber'";
        
        // Execute the query using the database connection
        $result = $this->db->executeQuery($query);

        // Check if any rows were returned
        if (!empty($result)) {
            // If a row is returned, return the employee data
            return $result[0];
        } else {
            // If no row is returned, return null (indicating no matching employee)
            return null;
        }
    }

    public function addEmployee($employeeData)
    {
        try {
            // Validate employee data
            if (empty($employeeData['first_name']) || empty($employeeData['last_name']) || empty($employeeData['email']) || empty($employeeData['phone_number']) || empty($employeeData['address']) || empty($employeeData['department']) || empty($employeeData['position']) || empty($employeeData['salary']) || empty($employeeData['hire_date'])) {
                throw new Exception("All fields are required for adding an employee");
            }
            
            // Extract employee data from the $employeeData array
            $firstName = $employeeData['first_name'];
            $lastName = $employeeData['last_name'];
            $email = $employeeData['email'];
            $phoneNumber = $employeeData['phone_number'];
            $address = $employeeData['address'];
            $department = $employeeData['department'];
            $position = $employeeData['position'];
            $salary = $employeeData['salary'];
            $hireDate = $employeeData['hire_date']; 
            
            // Construct SQL query to insert employee data into the database
            $query = "INSERT INTO employees (first_name, last_name, email, phone_number, address, department, position, salary, hire_date) VALUES ('$firstName', '$lastName', '$email', '$phoneNumber', '$address', '$department', '$position', '$salary', '$hireDate')";
            
            // Execute the query using the database connection
            $this->db->executeQuery($query);
            
            return ['status' => true, 'message' => 'Employee added successfully'];
        } catch (Exception $e) {
            return ['status' => false, 'message' => 'Error adding employee: ' . $e->getMessage()];
        }
    }

    public function updateEmployee($employeeData)
    {
        try {
            // Validate employee data
            if (empty($employeeData['id']) || empty($employeeData['first_name']) || empty($employeeData['last_name']) || empty($employeeData['email']) || empty($employeeData['phone_number']) || empty($employeeData['address']) || empty($employeeData['department']) || empty($employeeData['position']) || empty($employeeData['salary']) || empty($employeeData['hire_date'])) {
                throw new Exception("All fields are required for updating an employee");
            }

            // Extract employee data from the $employeeData array
            $id = $employeeData['id'];
            $firstName = $employeeData['first_name'];
            $lastName = $employeeData['last_name'];
            $email = $employeeData['email'];
            $phoneNumber = $employeeData['phone_number'];
            $address = $employeeData['address'];
            $department = $employeeData['department'];
            $position = $employeeData['position'];
            $salary = $employeeData['salary'];
            $hireDate = $employeeData['hire_date']; 
            
            // Construct SQL query to update employee data in the database
            $query = "UPDATE employees SET first_name = '$firstName', last_name = '$lastName', email = '$email', phone_number = '$phoneNumber', address = '$address', department = '$department', position = '$position', salary = '$salary', hire_date = '$hireDate' WHERE id = $id";
            
            // Execute the query using the database connection
            $this->db->executeQuery($query);
            
            return ['status' => true, 'message' => 'Employee updated successfully'];
        } catch (Exception $e) {
            return ['status' => false, 'message' => 'Error updating employee: ' . $e->getMessage()];
        }
    }

    public function deleteEmployee($id)
    {
        try {
            // Validate employee ID
            if (empty($id)) {
                throw new Exception("Employee ID is required for deleting an employee");
            }

            // Construct SQL query to delete employee by ID
            $query = "DELETE FROM employees WHERE id = $id";
            
            // Execute the query using the database connection
            $this->db->executeQuery($query);
            
            return ['status' => true, 'message' => 'Employee deleted successfully'];
        } catch (Exception $e) {
            return ['status' => false, 'message' => 'Error deleting employee: ' . $e->getMessage()];
        }
    }

    public function getEmployeeById($id)
    {
        // Assuming DB class has a method to establish a database connection
        $connection = $this->db->getConnection();

        // Perform database query to fetch employee by ID
        $query = "SELECT * FROM employees WHERE id = :id";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // Check if the query was successful
        if ($stmt->rowCount() > 0) {
            // Fetch the employee record
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            // Employee not found
            throw new Exception("Employee not found");
        }
    }

}
?>
