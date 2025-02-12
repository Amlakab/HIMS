<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "hospital_managment");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch doctor data
$sql = "SELECT * FROM doctors";
$result = $conn->query($sql);

// Update doctor information (if form submitted via AJAX)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    $fname = $conn->real_escape_string($_POST['Fname']);
    $lname = $conn->real_escape_string($_POST['Lname']);
    $gender = $conn->real_escape_string($_POST['Gender']);
    $department = $conn->real_escape_string($_POST['Department']);
    $email = $conn->real_escape_string($_POST['Email']);
    $phone = $conn->real_escape_string($_POST['Mobile']);
    $address = $conn->real_escape_string($_POST['Address']);

    // Update query with prepared statements
    $stmt = $conn->prepare("UPDATE doctors SET Fname=?, Lname=?,  Department=?, Gender=?, Email=?, Mobile=?, Address=? WHERE Id=?");
    $stmt->bind_param("sssssssi", $fname, $lname, $department, $gender, $email, $phone, $address, $id);
    
    if ($stmt->execute()) {
        echo "Doctor updated successfully!";
    } else {
        echo "Error updating doctor: " . $stmt->error;
    }
    $stmt->close();
    exit;
}

$conn->close();
?>
