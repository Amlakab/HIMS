<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "hospital_managment");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch doctor data
$sql = "SELECT * FROM appointments";
$result = $conn->query($sql);

// Update doctor information (if form submitted via AJAX)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    $pid = $conn->real_escape_string($_POST['pid']);
    $fname = $conn->real_escape_string($_POST['fname']);
    $lname = $conn->real_escape_string($_POST['lname']);
    $adate = $conn->real_escape_string($_POST['adate']);

    // Update query with prepared statements
    $stmt = $conn->prepare("UPDATE appointments SET Pid=?, Fname=?,  Lname=?, Adate=? WHERE Aid=?");
    $stmt->bind_param("ssssi", $pid, $fname, $lname, $adate, $id);
    
    if ($stmt->execute()) {
        echo "Appointment updated successfully!";
    } else {
        echo "Error updating appointment: " . $stmt->error;
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
    <title>Inline Appointment Editing</title>
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
    <h1>Appointment List</h1>
    <table class="animated-table">
        <thead>
            <tr>
                <th>NO.</th>
                <th>Patient Id</th>
                <th>Patient First Name</th>
                <th>Patient Last Name</th>
                <th>Appointment Date</th>
                <th>Doctor Name</th>
                <th>Doctor Contact</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr data-id="<?= $row['Aid']; ?>">
                        <td><?= htmlspecialchars($row['Aid']); ?></td>
                        <td class="editable pid"><?= htmlspecialchars($row['Pid']); ?></td>
                        <td class="editable fname"><?= htmlspecialchars($row['Fname']); ?></td>
                        <td class="editable lname"><?= htmlspecialchars($row['Lname']); ?></td>
                        <td class="editable adate"><?= htmlspecialchars($row['Adate']); ?></td>
                        <td class="dname"><?= htmlspecialchars($row['Dname']); ?></td>
                        <td class="dcontact"><?= htmlspecialchars($row['Dcontact']); ?></td>
                        <td class="action-icons"> 
                            <button class="edit-button">✏️ Edit</button>
                            <button class="save-button" style="display: none;">💾 Save</button>
                            <a href="delete_doctor.php?id=<?= $row['Aid']; ?>" onclick="return confirm('Are you sure you want to delete this doctor?');">🗑️ Delete</a>
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
                
                const pid = row.querySelector('.pid input').value;
                const fname = row.querySelector('.fname input').value;
                const lname = row.querySelector('.lname input').value;
                const adate = row.querySelector('.adate input').value;
                
                
                // Send updated data to the server via AJAX
                fetch('manage_appointment.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `id=${id}&pid=${encodeURIComponent(pid)}&fname=${encodeURIComponent(fname)}&lname=${encodeURIComponent(lname)}&adate=${encodeURIComponent(adate)}`
                })
                .then(response => response.text())
                .then(data => {
                    alert(data); // Show success message

                    // Update the table UI
                    row.querySelector('.pid').textContent = pid;
                    row.querySelector('.fname').textContent = fname;
                    row.querySelector('.lname').textContent = lname;
                    row.querySelector('.adate').textContent = adate;
                   

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


