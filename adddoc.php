<?php
// Establish database connection
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'hospital';

$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Retrieve form data
$doctorId = $_POST['doctorId'];
$doctorName = $_POST['doctorName'];
$contactNo = $_POST['contactNo'];
$email = $_POST['email'];
$deptId = $_POST['deptId'];
$password = $_POST['password'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$deptName = $_POST['deptName'];
$experience = $_POST['experience'];

// Prepare and execute the SQL statement
$sql = "INSERT INTO doctor (Doctor_Id,Doctor_Name, Contact_No, Email, Dept_Id, password, Age, Gender, Dept_Name, Experience)
        VALUES ('$doctorId','$doctorName', '$contactNo', '$email', '$deptId', '$password', '$age', '$gender', '$deptName', '$experience')";

if (mysqli_query($conn, $sql)) {
    echo "Doctor added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
