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

// Prepare the SQL query to fetch the doctor details
$sql = "SELECT * FROM doctor WHERE Doctor_Name = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);

// Check if any matching rows were found
if (mysqli_num_rows($result) == 1) {
    // Login successful
    //Doctor_ID, Doctor_Name, Contact_No, Email, Dept_Id, password
    $row = mysqli_fetch_assoc($result);
    $_SESSION['doctorId'] = $row['Doctor_ID'];
    $_SESSION['doctorName'] = $row['Doctor_Name'];
    $_SESSION['age'] = $row['Age'];
    $_SESSION['gender'] = $row['Gender'];
    $_SESSION['department'] = $row['Dept_Name'];
    $_SESSION['experience'] = $row['Experience'];
    $_SESSION['phone'] = $row['Contact_No'];
    $_SESSION['email'] = $row['Email'];

    // Redirect to the doctor profile page
    header("Location: docprof.php");
} else {
    // Login failed
    echo "Invalid username or password. Please try again.";
}

// Close the database connection
mysqli_close($conn);
?>
