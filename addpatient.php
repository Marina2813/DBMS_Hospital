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
$patientId = $_POST['patientId'];
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$bloodGrp = $_POST['bloodGrp'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$phoneNo = $_POST['phoneNo'];
$address = $_POST['address'];

// Prepare and execute the SQL statement
$sql = "INSERT INTO patient (Patient_Id, Name, Age, Gender, Blood_Grp, Height, Weight, Phone_No, Address)
        VALUES ('$patientId', '$name', '$age', '$gender', '$bloodGrp', '$height', '$weight', '$phoneNo', '$address')";

if (mysqli_query($conn, $sql)) {
    echo "Patient added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
