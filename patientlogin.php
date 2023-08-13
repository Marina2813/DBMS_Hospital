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

// Retrieve the submitted username and password from the form
$username = $_POST['Name'];
$password = $_POST['password'];

// Prepare the SQL query to fetch the patient details
$sql = "SELECT * FROM patient WHERE Name = '$username' AND Password = '$password'";
$result = mysqli_query($conn, $sql);

// Check if any matching rows were found
if (mysqli_num_rows($result) == 1) {
    // Login successful
    $row = mysqli_fetch_assoc($result);
    $_SESSION['patientId'] = $row['Patient_Id'];
    $_SESSION['patientName'] = $row['Name'];
    $_SESSION['age'] = $row['Age'];
    $_SESSION['gender'] = $row['Gender'];
    $_SESSION['bloodGroup'] = $row['Blood_Grp'];
    $_SESSION['height'] = $row['Height'];
    $_SESSION['weight'] = $row['Weight'];
    $_SESSION['phone'] = $row['Phone_No'];
    $_SESSION['address'] = $row['Address'];

    // Fetch the patient's diagnosis details
    $patientId = $row['Patient_Id'];
    $diagnosisSql = "SELECT * FROM patientdiagnosis WHERE Patient_ID = $patientId";
    $diagnosisResult = mysqli_query($conn, $diagnosisSql);
    
    // Check if any diagnosis records were found
    if (mysqli_num_rows($diagnosisResult) > 0) {
        // Fetch all diagnosis records
        $_SESSION['diagnosis'] = array();
        while ($diagnosisRow = mysqli_fetch_assoc($diagnosisResult)) {
            $_SESSION['diagnosis'][] = $diagnosisRow;
        }
    } else {
        // No diagnosis records found
        $_SESSION['diagnosis'] = array();
    }

    // Redirect to the patient profile page
    header("Location: patientprof.php");
    exit();
} else {
    // Login failed
    echo "Invalid username or password. Please try again.";
}

// Close the database connection
mysqli_close($conn);
?>
