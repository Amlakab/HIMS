<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "hospital_managment");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch doctor data
$sql = "SELECT * FROM medicines";
$result = $conn->query($sql);

// Update doctor information (if form submitted via AJAX)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    $mname = $conn->real_escape_string($_POST['mname']);
    $mtype = $conn->real_escape_string($_POST['mtype']);
    $mprice = $conn->real_escape_string($_POST['mprice']);
    $mweight = $conn->real_escape_string($_POST['mweight']);
    $mquantity = $conn->real_escape_string($_POST['mquantity']);
    $mexpairdate = $conn->real_escape_string($_POST['mexpairdate']);
    $campuny = $conn->real_escape_string($_POST['campuny']);

    // Update query with prepared statements
    $stmt = $conn->prepare("UPDATE medicines SET Mname=?, Mtype=?,  Mprice=?, Mweight=?, Mquantity=?, Mexpairdate=?, Mcampuny=? WHERE Mid=?");
    $stmt->bind_param("sssssssi", $mname, $mtype, $mprice, $mweight, $mquantity, $mexpairdate, $campuny, $id);
    
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
        input{
            width: 20px;
        }
    </style>
</head>
<body>
    <h1>Medicine Information</h1>
    <table class="animated-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>MEdicine Name</th>
                <th>Medicine Type</th>
                <th>Medicine Price</th>
                <th>Medicine Weight</th>
                <th>Medicine Quantity</th>
                <th>Medicine Expairdate</th>
                <th>Medicine Campuny</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr data-id="<?= $row['Mid']; ?>">
                        <td><?= htmlspecialchars($row['Mid']); ?></td>
                        <td class="editable mname"><?= htmlspecialchars($row['Mname']); ?></td>
                        <td class="editable mtype"><?= htmlspecialchars($row['Mtype']); ?></td>
                        <td class="editable mprice"><?= htmlspecialchars($row['Mprice']); ?></td>
                        <td class="editable mweight"><?= htmlspecialchars($row['Mweight']); ?></td>
                        <td class="editable mquantity"><?= htmlspecialchars($row['Mquantity']); ?></td>
                        <td class="editable mexpairdate"><?= htmlspecialchars($row['Mexpairdate']); ?></td>
                        <td class="editable campuny"><?= htmlspecialchars($row['Mcampuny']); ?></td>
                        <td class="action-icons">
                            <button class="edit-button">✏️ Edit</button>
                            <button class="save-button" style="display: none;">💾 Save</button>
                            <a href="delete_doctor.php?id=<?= $row['Mid']; ?>" onclick="return confirm('Are you sure you want to delete this doctor?');">🗑️ Delete</a>
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
                
                const mname = row.querySelector('.mname input').value;
                const mtype = row.querySelector('.mtype input').value;
                const mprice = row.querySelector('.mprice input').value;
                const mweight = row.querySelector('.mweight input').value;
                const mquantity = row.querySelector('.mquantity input').value;
                const mexpairdate = row.querySelector('.mexpairdate input').value;
                const campuny = row.querySelector('.campuny input').value;  
                
                // Send updated data to the server via AJAX
                fetch('manage_medicine.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `id=${id}&mname=${encodeURIComponent(mname)}&mtype=${encodeURIComponent(mtype)}&mprice=${encodeURIComponent(mprice)}&mweight=${encodeURIComponent(mweight)}&mquantity=${encodeURIComponent(mquantity)}&mexpairdate=${encodeURIComponent(mexpairdate)}&campuny=${encodeURIComponent(campuny)}`
                })
                .then(response => response.text())
                .then(data => {
                    alert(data); // Show success message

                    // Update the table UI
                    row.querySelector('.mname').textContent = mname;
                    row.querySelector('.mtype').textContent = mtype;
                    row.querySelector('.mprice').textContent = mprice;
                    row.querySelector('.mweight').textContent = mweight;
                    row.querySelector('.mquantity').textContent = mquantity;
                    row.querySelector('.mexpairdate').textContent = mexpairdate;
                    row.querySelector('.campuny').textContent = campuny;

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


