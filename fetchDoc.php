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
$doctorId = "";
$doctorName = "";
$contactNo = "";
$email = "";
$deptId = "";
$age = "";
$gender = "";
$deptName = "";
$experience = "";

// Function to fetch data based on the provided doctor ID
function fetchDoctorData($conn, $recordId) {
    global $doctorId, $doctorName, $contactNo, $email, $deptId, $age, $gender, $deptName, $experience;

    // Prepare and execute the SQL statement to fetch the record
    $sql = "SELECT * FROM doctor WHERE Doctor_ID = $recordId";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $doctorId = $row["Doctor_ID"];
        $doctorName = $row["Doctor_Name"];
        $contactNo = $row["Contact_No"];
        $email = $row["Email"];
        $deptId = $row["Dept_Id"];
        $age = $row["Age"];
        $gender = $row["Gender"];
        $deptName = $row["Dept_Name"];
        $experience = $row["Experience"];
    } else {
        echo "No record found with the provided ID.";
    }
}

// Check if a record ID is provided in the URL
if (isset($_GET["record_id"])) {
    // Fetch the data for the provided record ID
    $recordId = $_GET["record_id"];
    fetchDoctorData($conn, $recordId);
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Fetch Record - Hospital Management System</title>
    <link rel="stylesheet" href="../styles1.css">
</head>
<body>
    <h1>Fetch Record</h1>

    <form action="" method="GET">
        <label for="fetch_id">Fetch Record ID:</label>
        <input type="text" id="fetch_id" name="record_id" required>
        <input type="submit" value="Fetch">
    </form>

    <form action="updateDoc.php" method="POST">
         <!-- Hidden field for record ID -->
        <label for="doctor_id">Doctor ID:</label>
        <input type="text" id="doctor_id" name="record_id" required value="<?php echo $doctorId; ?>">

        <label for="doctor_name">Doctor Name:</label>
        <input type="text" id="doctor_name" name="doctor_name" value="<?php echo $doctorName; ?>" required>

        <label for="contact_no">Contact No:</label>
        <input type="text" id="contact_no" name="contact_no" value="<?php echo $contactNo; ?>" required>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo $email; ?>" required>

        <label for="dept_id">Dept ID:</label>
        <input type="text" id="dept_id" name="dept_id" value="<?php echo $deptId; ?>" required>

        <label for="age">Age:</label>
        <input type="text" id="age" name="age" value="<?php echo $age; ?>" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender">
            <option value="male" <?php if ($gender == "male") echo "selected"; ?>>Male</option>
            <option value="female" <?php if ($gender == "female") echo "selected"; ?>>Female</option>
        </select>

        <label for="dept_name">Dept Name:</label>
        <input type="text" id="dept_name" name="dept_name" value="<?php echo $deptName; ?>" required>

        <label for="experience">Experience:</label>
        <input type="text" id="experience" name="experience" value="<?php echo $experience; ?>" required>

        <input type="submit" value="Update">
    </form>
</body>
</html>
