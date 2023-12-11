<?php
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "studentinfo";

// Create database connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query1 = mysqli_query($conn, "SELECT * FROM `studentinfo`");

if (!$query1) {
    die("Query failed: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
        }

        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

    <h2>Student Information</h2>

    <table>
        <tr>
            <th>Student ID</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Contact No.</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($query1)) {
        ?>
        <tr>
            <td><?php echo $row['studId']; ?></td>
            <td><?php echo $row['lastName']; ?></td>
            <td><?php echo $row['firstName']; ?></td>
            <td><?php echo $row['middleName']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['contactNo']; ?></td>
        </tr>
        <?php
        }
        ?>
    </table>

</body>
</html>