<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to select and display all employee records
function selectEmployees()
{
    global $conn;

    $sql = "SELECT * FROM employee_info";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h3>Employee Records:</h3>";
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Contact No</th>
                    <th>Designation</th>
                    <th>Department</th>
                    <th>Salary</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["id"]."</td>
                    <td>".$row["first_name"]."</td>
                    <td>".$row["last_name"]."</td>
                    <td>".$row["contact_no"]."</td>
                    <td>".$row["designation"]."</td>
                    <td>".$row["department"]."</td>
                    <td>".$row["salary"]."</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No employee records found";
    }
}

// Function to insert an employee record
function insertEmployee($employee_id, $first_name, $last_name, $contact_no, $designation, $department, $salary)
{
    global $conn;

    $sql = "INSERT INTO employee_info (id, first_name, last_name, contact_no, designation, department, salary)
            VALUES ('$employee_id', '$first_name', '$last_name', '$contact_no', '$designation', '$department', '$salary')";

    if ($conn->query($sql) === TRUE) {
        echo "Employee record created successfully";
    } else {
        echo "Error creating employee record: " . $conn->error;
    }
}

// Function to delete an employee record
function deleteEmployee($employee_id)
{
    global $conn;

    $sql = "DELETE FROM employee_info WHERE id='$employee_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Employee record deleted successfully";
    } else {
        echo "Error deleting employee record: " . $conn->error;
    }
}

// Event-driven logic
if (isset($_POST['select'])) {
    selectEmployees();
}

if (isset($_POST['insert'])) {
    $employee_id = $_POST['employee_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $contact_no = $_POST['contact_no'];
    $designation = $_POST['designation'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];

    insertEmployee($employee_id, $first_name, $last_name, $contact_no, $designation, $department, $salary);
}

if (isset($_POST['delete'])) {
    $employee_id = $_POST['employee_id'];

    deleteEmployee($employee_id);
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Information</title>
</head>
<body>
    <h2>Employee Information</h2>
    <form method="post" action="">
        <input type="submit" name="select" value="Select Employees"><br><br>

        <label for="employee_id">Employee ID:</label>
        <input type="text" name="employee_id" id="employee_id" required><br><br>

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" ><br><br>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name" ><br><br>

        <label for="contact_no">Contact No:</label>
        <input type="text" name="contact_no" id="contact_no" ><br><br>

        <label for="designation">Designation:</label>
        <input type="text" name="designation" id="designation" ><br><br>

        <label for="department">Department:</label>
        <input type="text" name="department" id="department" ><br><br>

        <label for="salary">Salary:</label>
        <input type="text" name="salary" id="salary" ><br><br>

        <input type="submit" name="insert" value="Insert Employee">
        <input type="submit" name="delete" value="Delete Employee">
    </form>
</body>
</html>
