<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentreg";

$conn = new mysqli('localhost', 'root', '' , 'studentreg');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the form data
$Name = mysqli_real_escape_string($conn, $_POST['Name']);
$Email = mysqli_real_escape_string($conn, $_POST['Email']);
$Phone = mysqli_real_escape_string($conn, $_POST['Phone']);
$Gender = mysqli_real_escape_string($conn, $_POST['Gender']);
$Dob = mysqli_real_escape_string($conn, $_POST['Dob']);
$Department = mysqli_real_escape_string($conn, $_POST['Department']);

// Insert form data into the database using prepared statement
$sql = "INSERT INTO students (name, email, phone, gender, dob, department) 
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssisss", $Name, $Email, $Phone, $Gender, $Dob, $Department);

if (mysqli_stmt_execute($stmt)) {
    echo "Records inserted successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// Close database connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
