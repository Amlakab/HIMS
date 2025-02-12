<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "hospital_managment");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update doctor information (if form submitted via POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    $fname = $conn->real_escape_string($_POST['Fname']);
    $lname = $conn->real_escape_string($_POST['Lname']);
    $gender = $conn->real_escape_string($_POST['Gender']);
    $department = $conn->real_escape_string($_POST['Department']);
    $email = $conn->real_escape_string($_POST['Email']);
    $phone = $conn->real_escape_string($_POST['Mobile']);
    $address = $conn->real_escape_string($_POST['Address']);

    // Use a prepared statement to prevent SQL injection
    $stmt = $conn->prepare("UPDATE doctors SET Fname=?, Lname=?, Gender=?, Department=?, Email=?, Mobile=?, Address=? WHERE Id=?");
    $stmt->bind_param("sssssssi", $fname, $lname, $gender, $department, $email, $phone, $address, $id);

    if ($stmt->execute()) {
        $message = "Doctor updated successfully!";
    } else {
        $message = "Error updating doctor: " . $stmt->error;
    }
    $stmt->close();
}

// Fetch doctor data
$sql = "SELECT * FROM doctors";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inline Doctor Editing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        form {
            display: inline;
        }
        .save-button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .save-button:hover {
            background-color: #45a049;
        }
        .message {
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Doctor Information</h1>

    <?php if (isset($message)): ?>
        <p class="message"><?= htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Department</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <form method="POST" action="doctors.php">
                            <td><?= htmlspecialchars($row['Id']); ?></td>
                            <td><input type="text" name="Fname" value="<?= htmlspecialchars($row['Fname']); ?>"></td>
                            <td><input type="text" name="Lname" value="<?= htmlspecialchars($row['Lname']); ?>"></td>
                            <td><input type="text" name="Gender" value="<?= htmlspecialchars($row['Gender']); ?>"></td>
                            <td><input type="text" name="Department" value="<?= htmlspecialchars($row['Department']); ?>"></td>
                            <td><input type="email" name="Email" value="<?= htmlspecialchars($row['Email']); ?>"></td>
                            <td><input type="text" name="Mobile" value="<?= htmlspecialchars($row['Mobile']); ?>"></td>
                            <td><input type="text" name="Address" value="<?= htmlspecialchars($row['Address']); ?>"></td>
                            <td>
                                <input type="hidden" name="id" value="<?= htmlspecialchars($row['Id']); ?>">
                                <button type="submit" class="save-button">Save</button>
                            </td>
                        </form>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9">No doctors found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>

<?php $conn->close(); ?>
