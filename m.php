
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
$row = $result->fetch_assoc();
if(isset($_GET['id'])){
    $idd=$_GET['id'];
    showEditOptionsRow($idd,$row);
}
else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            animation: fadeIn 1s ease-in;
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
        .action-icons {
            display: flex;
            gap: 10px;
        }
        .action-icons a {
            text-decoration: none;
            color: #555;
            font-size: 18px;
        }
        .action-icons a:hover {
            color: #000;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <h1>Doctor Information</h1>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Specialization</th>
                <th>Phone</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['Id']); ?></td>
                        <td><?= htmlspecialchars($row['Fname']); ?></td>
                        <td><?= htmlspecialchars($row['Lname']); ?></td>
                        <td><?= htmlspecialchars($row['Email']); ?></td>
                        <td><?= htmlspecialchars($row['Email']); ?></td>
                        <td class="action-icons">
                            <a href="m.php?id=<?= $row['Id']; ?>">✏️</a>
                            <a href="delete_doctor.php?id=<?= $row['Id']; ?>" onclick="return confirm('Are you sure you want to delete this doctor?');">🗑️</a>
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
    <?php
}
function showEditOptionsRow($idd,$row) {
    ?>
    <tr>
      
      <td>
        <input type="text" class="form-control" value="<?php echo $row['Fname']; ?>" placeholder="First Name" id="fname" maxlength="15"reqaired onblur="notNull(this.value, 'fname_error');">
        <code class="text-danger small font-weight-bold float-right" id="fname_error" style="display: none;"></code>
      </td>
      <td>
        <input type="text" class="form-control" value="<?php echo $row['Lname']; ?>" placeholder="Last Name" id="lname" maxlength="15"reqaired onblur="notNull(this.value, 'lname_error');">
        <code class="text-danger small font-weight-bold float-right" id="lname_error" style="display: none;"></code>
      </td>
      <td>
        <input type="text" class="form-control" value="<?php echo $row['Gender']; ?>" placeholder=" Gender" id="gender" axlength="15"reqaired onblur="notNull(this.value, 'gender_error');">
        <code class="text-danger small font-weight-bold float-right" id="gender_error" style="display: none;"></code>
      </td>
      <td>
        <input type="text" class="form-control" value="<?php echo $row['Dpartment']; ?>" placeholder="Department" id="department" axlength="15"reqaired onblur="notNull(this.value, 'department_error');">
        <code class="text-danger small font-weight-bold float-right" id="department_error" style="display: none;"></code>
      </td>
     
      <td>
        <button href="" class="btn btn-success btn-sm" onclick="updateUser(<?php echo $row['Id']; ?>);">
          <i class="fa fa-edit"></i>
        </button>
        <button class="btn btn-danger btn-sm" onclick="cancel();">
          <i class="fa fa-close"></i>
        </button>
      </td>
    </tr>
    <?php
  }
    ?>
</body>
</html>

<?php $conn->close(); ?>
