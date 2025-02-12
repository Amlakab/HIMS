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
        .action-icons button {
            cursor: pointer;
            border: none;
            background: none;
            font-size: 16px;
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
                        <td class="editable Fname"><?= htmlspecialchars($row['Fname']); ?></td>
                        <td class="editable Lname"><?= htmlspecialchars($row['Lname']); ?></td>
                        <td class="editable Gender"><?= htmlspecialchars($row['Gender']); ?></td>
                        <td class="editable Department"><?= htmlspecialchars($row['Department']); ?></td>
                        <td class="editable Email"><?= htmlspecialchars($row['Email']); ?></td>
                        <td class="editable Mobile"><?= htmlspecialchars($row['Mobile']); ?></td>
                        <td class="editable Address"><?= htmlspecialchars($row['Address']); ?></td>
                        <td class="action-icons">
                            <button class="edit-button">✏️ Edit</button>
                            <button class="save-button" style="display: none;">💾 Save</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9">No doctors found.</td>
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
                const fname = row.querySelector('.Fname input').value;
                const lname = row.querySelector('.Lname input').value;
                const gender = row.querySelector('.Gender input').value;
                const department = row.querySelector('.Department input').value;
                const email = row.querySelector('.Email input').value;
                const phone = row.querySelector('.Mobile input').value;
                const address = row.querySelector('.Address input').value;

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
                    row.querySelector('.Fname').textContent = fname;
                    row.querySelector('.Lname').textContent = lname;
                    row.querySelector('.Gender').textContent = gender;
                    row.querySelector('.Department').textContent = department;
                    row.querySelector('.Email').textContent = email;
                    row.querySelector('.Mobile').textContent = phone;
                    row.querySelector('.Address').textContent = address;

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
