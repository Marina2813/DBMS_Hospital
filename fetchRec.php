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

// Initialize variables for storing fetched data
$patientId = "";
$patientName = "";
$gender = "";
$age = "";
$bloodGroup = "";
$height = "";
$weight = "";
$phoneNo = "";
$address = "";
$password = "";

// Function to fetch data based on the provided patient ID
function fetchPatientData($conn, $recordId) {
    global $patientId, $patientName, $gender, $age, $bloodGroup, $height, $weight, $phoneNo, $address, $password;

    // Prepare and execute the SQL statement to fetch the record
    $sql = "SELECT * FROM patient WHERE Patient_Id = $recordId";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $patientId = $row["Patient_Id"];
        $patientName = $row["Name"];
        $gender = $row["Gender"];
        $age = $row["Age"];
        $bloodGroup = $row["Blood_Grp"];
        $height = $row["Height"];
        $weight = $row["Weight"];
        $phoneNo = $row["Phone_No"];
        $address = $row["Address"];
        $password = $row["Password"];
    } else {
        echo "No record found with the provided ID.";
    }
}

// Check if a record ID is provided in the URL
if (isset($_GET["record_id"])) {
    // Fetch the data for the provided record ID
    $recordId = $_GET["record_id"];
    fetchPatientData($conn, $recordId);
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Record - Hospital Management System</title>
    <link rel="stylesheet" href="../styles1.css">
</head>
<body>
    <h1>Fetch Record</h1>

    <form action="" method="GET">
        <label for="fetch_id">Fetch Record ID:</label>
        <input type="text" id="fetch_id" name="record_id" required>
        <input type="submit" value="Fetch">
    </form>

    <form action="updateRec.php" method="POST">
         <!-- Hidden field for record ID -->
        <label for="patient_id">Patient Id:</label>
        <input type="text" id="patient_id" name="record_id" required value="<?php echo $patientId; ?>">

        <label for="patient_name">Patient Name:</label>
        <input type="text" id="patient_name" name="patient_name" value="<?php echo $patientName; ?>" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender">
            <option value="male" <?php if ($gender == "male") echo "selected"; ?>>Male</option>
            <option value="female" <?php if ($gender == "female") echo "selected"; ?>>Female</option>
        </select>

        <label for="age">Age:</label>
        <input type="text" id="age" name="age" value="<?php echo $age; ?>" required>

        <label for="blood_group">Blood Group:</label>
        <input type="text" id="blood_group" name="blood_group" value="<?php echo $bloodGroup; ?>" required>

        <label for="height">Height:</label>
        <input type="text" id="height" name="height" value="<?php echo $height; ?>" required>

        <label for="weight">Weight:</label>
        <input type="text" id="weight" name="weight" value="<?php echo $weight; ?>" required>

        <label for="phone_no">Phone No:</label>
        <input type="text" id="phone_no" name="phone_no" value="<?php echo $phoneNo; ?>" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo $address; ?>" required>

        <label for="password">Password:</label>
        <input type="text" id="password" name="password" value="<?php echo $password; ?>" required>
        
        <input type="submit" value="Update">
    </form>


</body>
</html>
