<?php
// Retrieve form values
$student_id = $_POST['student_id'];
$lecture_hall_number = $_POST['lecture_hall_number'];
$hours = $_POST['hours'];

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "Nisa2001";
$dbname = "CGP";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO lecture_hall_bookings (student_id, lecture_hall_number, hours) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $student_id, $lecture_hall_number, $hours);

// Execute SQL statement
if ($stmt->execute()) {
    // Close statement
    $stmt->close();
    // Close connection
    $conn->close();
    // Redirect to success page
    header("Location: success.html");
    exit();
} else {
    // Provide error message
    echo "Error: Failed to insert data.";
}

// Close connection
$conn->close();
?>
