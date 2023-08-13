<?php
// Start a session
session_start();

// Check if the user clicked on the logout button
if (isset($_POST['logout'])) {
    // Clear all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect the user to the login page
    header("Location: ../login.html");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Patient Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body {
            background: #001c30;
        }

        table.table-bordered {
            background-color: transparent;
            border: none;
        }

        table.table-bordered th,
        table.table-bordered td {
            background-color: rgba(255, 255, 255, 0.8);
            border: none;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .profile-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            width: 800px;
        }

        .profile-container h3 {
            margin-bottom: 20px;
        }

        .button-container {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

        .button-container form {
            margin: 0 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="profile-container">
            <h3>Patient PROFILE</h3>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>NAME</th>
                        <td><?php echo $_SESSION['patientName']; ?></td>
                    </tr>
                    <tr>
                        <th>AGE</th>
                        <td><?php echo $_SESSION['age']; ?></td>
                    </tr>
                    <tr>
                        <th>GENDER</th>
                        <td><?php echo $_SESSION['gender']; ?></td>
                    </tr>
                    <tr>
                        <th>BLOOD GROUP</th>
                        <td><?php echo $_SESSION['bloodGroup']; ?></td>
                    </tr>
                    <tr>
                        <th>HEIGHT</th>
                        <td><?php echo $_SESSION['height']; ?></td>
                    </tr>
                    <tr>
                        <th>WEIGHT</th>
                        <td><?php echo $_SESSION['weight']; ?></td>
                    </tr>
                    <tr>
                        <th>PHONE</th>
                        <td><?php echo $_SESSION['phone']; ?></td>
                    </tr>
                    <tr>
                        <th>ADDRESS</th>
                        <td><?php echo $_SESSION['address']; ?></td>
                    </tr>
                    <tr>
                        <th>DIAGNOSIS DETAILS</th>
                        <td>
                            <?php
                            // Check if diagnosis array is not empty
                            if (!empty($_SESSION['diagnosis'])) {
                                foreach ($_SESSION['diagnosis'] as $diagnosis) {
                                    echo $diagnosis['Diagnosis_Date'];
                                    echo " --> ";
                                    echo $diagnosis['Diagnosis_Details']; // Replace 'diagnosis_column_name' with the actual column name in the diagnosis table
                                    echo "<br>";
                                }
                            } else {
                                echo "No diagnosis records found.";
                            }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="button-container">

                <form method="POST">
                    <button type="submit" name="logout" class="btn btn-primary">Logout</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
