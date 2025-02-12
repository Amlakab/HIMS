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
    $name = $conn->real_escape_string($_POST['name']);
    $specialization = $conn->real_escape_string($_POST['specialization']);
    $phone = $conn->real_escape_string($_POST['phone']);

    $update_sql = "UPDATE doctors SET name='$name', specialization='$specialization', phone='$phone' WHERE id=$id";
    if ($conn->query($update_sql) === TRUE) {
        echo "Doctor updated successfully!";
    } else {
        echo "Error updating doctor: " . $conn->error;
    }
    exit;
}
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
        .edit-mode input {
            width: 90%;
            padding: 5px;
        }
        .action-icons {
            display: flex;
            gap: 10px;
        }
        .action-icons a, .action-icons button {
            text-decoration: none;
            color: #555;
            font-size: 16px;
            border: none;
            background: none;
            cursor: pointer;
        }
        .action-icons a:hover, .action-icons button:hover {
            color: #000;
        }
    </style>
</head>
<body>
    <h1>Doctor Information</h1>
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
                    <tr data-id="<?= $row['Id']; ?>">
                        <td><?= htmlspecialchars($row['Id']); ?></td>
                        <td class="editable fname"><?= htmlspecialchars($row['Fname']); ?></td>
                        <td class="editable lname"><?= htmlspecialchars($row['Lname']); ?></td>
                        <td class="editable gender"><?= htmlspecialchars($row['Gender']); ?></td>
                        <td class="editable department"><?= htmlspecialchars($row['Department']); ?></td>
                        <td class="editable email"><?= htmlspecialchars($row['Email']); ?></td>
                        <td class="editable phone"><?= htmlspecialchars($row['Mobile']); ?></td>
                        <td class="editable address"><?= htmlspecialchars($row['Address']); ?></td>
                        <td class="action-icons">
                            <button class="edit-button">✏️ Edit</button>
                            <button class="save-button" style="display: none;">💾 Save</button>
                            <a href="delete_doctor.php?id=<?= $row['Id']; ?>" onclick="return confirm('Are you sure you want to delete this doctor?');">🗑️ Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No doctors found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <script>
        // Handle inline editing
        document.querySelectorAll('.edit-button').forEach(button => {
            button.addEventListener('click', function () {
                const row = this.closest('tr');
                row.classList.add('edit-mode');
                row.querySelectorAll('.editable').forEach(cell => {
                    const text = cell.textContent.trim();
                    cell.innerHTML = `<input type="text" value="${text}">`;
                });
                this.style.display = 'none';
                row.querySelector('.save-button').style.display = 'inline';
            });
        });

        // Handle saving data
        document.querySelectorAll('.save-button').forEach(button => {
            button.addEventListener('click', function () {
                const row = this.closest('tr');
                const id = row.dataset.id;
                row.classList.add('edit-mode');
                const fname = row.querySelector('.fname input').value;
                const lname = row.querySelector('.lname input').value;
                const gender = row.querySelector('.gender input').value;
                const department = row.querySelector('.department input').value;
                const email = row.querySelector('.email input').value;
                const phone = row.querySelector('.phone input').value;
                const address = row.querySelector('.address input').value;  
            
                
                // Send updated data to the server via AJAX
                
                fetch('doctor12.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `id=${id}&Fname=${encodeURIComponent(fname)}&Lname=${encodeURIComponent(lname)}&Gender=${encodeURIComponent(gender)}&Department=${encodeURIComponent(department)}&Email=${encodeURIComponent(email)}&Mobile=${encodeURIComponent(phone)}&Address=${encodeURIComponent(address)}`
                })
                .then(response => response.text())
                .then(data => {
                    alert(data); // Show success message

                    // Update the table UI
                    row.querySelector('.fname').textContent = fname;
                    row.querySelector('.lname').textContent = lname;
                    row.querySelector('.gender').textContent = gender;
                    row.querySelector('.department').textContent = department;
                    row.querySelector('.email').textContent = email;
                    row.querySelector('.phone').textContent = phone;
                    row.querySelector('.address').textContent = address;

                    // Exit edit mode
                    row.classList.remove('edit-mode');
                    row.querySelector('.edit-button').style.display = 'inline';
                    row.querySelector('.save-button').style.display = 'none';
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert("Failed to save changes. Please try again.");
                });
                
            });
        });
    </script>
</body>
</html>

<?php $conn->close(); ?>
