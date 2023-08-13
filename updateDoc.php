<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hospital";

// Establish a connection to the database
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process the update form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the record ID
    $recordId = $_POST["record_id"];

    // Update the record with the submitted values
    $doctorName = $_POST["doctor_name"];
    $contactNo = $_POST["contact_no"];
    $email = $_POST["email"];
    $deptId = $_POST["dept_id"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $deptName = $_POST["dept_name"];
    $experience = $_POST["experience"];

    // Prepare and execute the SQL statement to update the record
    $sql = "UPDATE doctor SET 
            doctor_name = '$doctorName',
            contact_no = '$contactNo',
            email = '$email',
            dept_id = '$deptId',
            age = '$age',
            gender = '$gender',
            dept_name = '$deptName',
            experience = '$experience'
            WHERE doctor_id = $recordId";

    if (mysqli_query($conn, $sql)) {
        //redirect to addpeole after 2 sec
        echo "Record updated successfully!.....Redirecting to Admin page in 3 sec";
        // wait for 3 sec
        header("refresh:3; url=../addpeople.html");

    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
