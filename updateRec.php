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
    $patientName = $_POST["patient_name"];
    $gender = $_POST["gender"];
    $age = $_POST["age"];
    $bloodGroup = $_POST["blood_group"];
    $height = $_POST["height"];
    $weight = $_POST["weight"];
    $phoneNo = $_POST["phone_no"];
    $address = $_POST["address"];
    $password = $_POST["password"];

    // Prepare and execute the SQL statement to update the record
    $sql = "UPDATE patient SET 
            Name = '$patientName',
            Gender = '$gender',
            Age = '$age',
            Blood_Grp = '$bloodGroup',
            Height = '$height',
            Weight = '$weight',
            Phone_No = '$phoneNo',
            Address = '$address',
            Password = '$password'
            WHERE Patient_Id = $recordId";

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully!.....Redirecting to Admin page";
        // wait for 3 sec
        header("refresh:3; url=../addpeople.html");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
