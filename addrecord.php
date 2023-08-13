<?php
// Start a session
session_start();

// Establish a connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the submitted record details from the form
$patientId = $_POST['patientId'];
$diagnosisDate = $_POST['diagnosisDate'];
$diagnosisDetails = $_POST['diagnosisDetails'];
$doctorId = $_POST['doctorId'];

// Prepare the SQL query to insert the record into the PatientDiagnosis table
$sql = "INSERT INTO PatientDiagnosis (Patient_ID, Diagnosis_Date, Diagnosis_Details, Doctor_ID) VALUES ('$patientId', '$diagnosisDate', '$diagnosisDetails', '$doctorId')";

if (mysqli_query($conn, $sql)) {
    // Record insertion successful
    echo "Record added successfully.";
    //redirect to docprof.php in 3 sec
    header("refresh:3; url=docprof.php");
} else {
    // Error in record insertion
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
