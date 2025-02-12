<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/table.css">
    <style>
        tbody tr {
            opacity: 0;
            transform: translateX(-50%);
            transition: all 0.5s ease;
        }
    </style>
</head>
<body>
    <main class="content px-3 py-2">
        <div class="container-fluid">
            <div class="mb-3">
                <h4>Labratorist Dashboard</h4>
            </div>
            <!-- Table Element -->
            <div class="card border-0">
                <div class="card-header">
                    <h5 class="card-title">Labratorist Prescription List</h5>
                </div>
                <div class="card-body">
                    <table class="animated-table">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Id</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Diagnosis1</th>
                                <th>Diagnosis2</th>
                                <th>Diagnosis3</th>
                                <th>Diagnosis4</th>
                                <th>Diagnosis5</th>
                                <th>Doctor Name</th>
                                <th>Doctor Contact</th>
                                <th colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include ('../db_connection.php');
                              $status="untrushed";
                              $seq_no=0;
                                $sql="SELECT * FROM labprescription WHERE Status='$status'";
                                $result=mysqli_query($con,$sql);
                                while( $row=mysqli_fetch_assoc($result)){
                                $seq_no++;
                                $id=$row['Id'];
                                $pid=$row['Pid'];
                                ?>
                                <tr>
                                    <td><?php echo $seq_no; ?></td>
                                    <td><?php echo $row['Fname']; ?></td>
                                    <td><?php echo $row['Lname']; ?></td>
                                    <td><?php echo $row['Id']; ?></td>
                                    <td><?php echo $row['Age']; ?></td>
                                    <td><?php echo $row['Gender']; ?></td>
                                    <td><?php echo $row['Diagnosis1']; ?></td>
                                    <td><?php echo $row['Diagnosis2']; ?></td>
                                    <td><?php echo $row['Diagnosis3']; ?></td>
                                    <td><?php echo $row['Diagnosis4']; ?></td>
                                    <td><?php echo $row['Diagnosis5']; ?></td>
                                    <td><?php echo $row['Dname']; ?></td>
                                    <td><?php echo $row['Dcontact']; ?></td>
                                    <td>
                                    <td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registrationModal2" onclick="openModal(' <?php echo $id ; ?> ',' <?php echo $row['Fname'] ; ?> ',' <?php echo $row['Lname'] ; ?> ',' <?php echo $row['Age'] ; ?> ',' <?php echo $row['Gender'] ; ?> ',' <?php echo $row['Diagnosis1'] ; ?> ',' <?php echo $row['Diagnosis2'] ; ?> ',' <?php echo $row['Diagnosis3'] ; ?> ',' <?php echo $row['Diagnosis4'] ; ?> ',' <?php echo $row['Diagnosis5'] ; ?> ',' <?php echo $row['Dname'] ; ?> ',' <?php echo $row['Dcontact'] ; ?> ')">View</button>
                                    </td>
                                    <td>
                                        <a href="update_status.php?id=<?php echo $row['Pid'] ; ?>&role=prescription"><button class="btn btn-success">Delete</button></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    
    <!-- View Modal -->
    <div class="modal fade" id="registrationModal2" tabindex="-1" aria-labelledby="registrationModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registrationModalLabel2">Labratory Prescription</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Login Form -->
                    <form id="loginForm" method="post">
                        <div class="mb-3">
                            <label for="loginUsername" class="form-label">First Name</label>
                            <input type="text" class="form-control" disabled id="fname" required>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lname" disabled id="lname"  value="" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Age</label>
                            <input type="text"  disabled name="age" id="age" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Gender</label>
                            <input type="text" name="gender" disabled  id="gender" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Id</label>
                            <input type="text" name="id" disabled id="id" class="form-control"  value="" required>
                        </div>
                        <label  class="form-label">Diagnosis Type(Maximum 5)</label>                        <div class="mb-3">
                        <input type="text" name="diagnosis1" disabled id="diagnosis1" class="form-control" placeholder="Diagnosis type 1">
                        </div>
                        <div class="mb-3">
                        <input type="text" name="diagnosis2" disabled id="diagnosis2" class="form-control" placeholder="Diagnosis type 2">
                        </div>
                        <div class="mb-3">
                        <input type="text" name="diagnosis3" disabled id="diagnosis3" class="form-control" placeholder="Diagnosis type 3">
                        </div>
                        <div class="mb-3">
                        <input type="text" name="diagnosis4" disabled id="diagnosis4" class="form-control" placeholder="Diagnosis type 4">
                        </div>
                        <div class="mb-3">
                        <input type="text" name="diagnosis5" disabled id="diagnosis5" class="form-control" placeholder="Diagnosis type 5">
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Doctor Name</label>
                            <input type="text" name="dname" disabled id="dname" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Doctor Contact</label>
                            <input type="text" name="dcontact" disabled id="dcontact" class="form-control" required>
                        </div>
                        <button type="submit" name="submit2" class="btn btn-success">Send</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Allocate Modal -->
    <!-- <div class="modal fade" id="registrationModal2" tabindex="-1" aria-labelledby="registrationModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registrationModalLabel2">Allocate Patient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <form id="loginForm">
                        <div class="mb-3">
                            <label for="loginUsername" class="form-label">Username</label>
                            <input type="text" class="form-control" id="loginUsername" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginUsername" class="form-label">Amlakie</label>
                            <input type="text" class="form-control" id="abebaw" value="" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="loginPassword" required>
                        </div>
                        <button type="submit" class="btn btn-success">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
    const rows = document.querySelectorAll("tbody tr");
    rows.forEach((row, index) => {
        setTimeout(() => {
            row.style.opacity = "1";
            row.style.transform = "translateX(0)";
        }, index * 200);
    });

    // Event listeners for the View button
    document.querySelectorAll('.view-btn').forEach(button => {
        button.addEventListener('click', (e) => {
            const id = e.target.getAttribute('data-id');
            const modalBody = document.querySelector('#registrationModal .modal-body');

            // Clear previous ID dynamically added
            const previousId = modalBody.querySelector('.dynamic-id');
            if (previousId) {
                previousId.remove();
            }

            // Add new ID dynamically
            modalBody.innerHTML += `<p class="dynamic-id">Viewing details for ID: ${id}</p>`;

            const modal = new bootstrap.Modal(document.getElementById('registrationModal'));
            modal.show();
        });
    });

    // Event listeners for the Allocate button
    document.querySelectorAll('.allocate-btn').forEach(button => {
        button.addEventListener('click', (e) => {
            const id = e.target.getAttribute('data-id');
            const modalBody = document.querySelector('#registrationModal2 .modal-body');

            // Clear previous ID dynamically added
            const previousId = modalBody.querySelector('.dynamic-id');
            if (previousId) {
                previousId.remove();
            }

            // Add new ID dynamically
            modalBody.innerHTML += `<p class="dynamic-id" >Allocating resources for ID: ${id}</p>`;

            const modal = new bootstrap.Modal(document.getElementById('registrationModal2'));
            modal.show();
        });
    });
});

    </script>
    <script>
    // Function to open modal and pass ID to modal content
    function openModal(id,fname,lname,age,gender,diagnosis1,diagnosis2,diagnosis3,diagnosis4,diagnosis5,dname,dcontact) {
        // You can use AJAX or simply use the item ID for displaying content in the modal.
        document.getElementById('fname').value=fname;
        document.getElementById('lname').value=lname;
        document.getElementById('id').value=id;
        document.getElementById('age').value=age;
        document.getElementById('gender').value=gender;
        document.getElementById('diagnosis1').value=diagnosis1;
        document.getElementById('diagnosis2').value=diagnosis2;
        document.getElementById('diagnosis3').value=diagnosis3;
        document.getElementById('diagnosis4').value=diagnosis4;
        document.getElementById('diagnosis5').value=diagnosis5;
        document.getElementById('dname').value=dname;
        document.getElementById('dcontact').value=dcontact;


        // Example: Using PHP to pass data to be displayed in the modal (this is just a static example)
        // You can replace this with a real database query or any other data you want to show.
        // For this example, we directly set the content, but you could use AJAX to fetch more data if needed.
    }
    // Function to open modal and pass ID to modal content
    function openModal2(itemId) {
        // You can use AJAX or simply use the item ID for displaying content in the modal.
        const modalContent = document.getElementById('abebaw');
        modalContent.value = itemId;

        // Example: Using PHP to pass data to be displayed in the modal (this is just a static example)
        // You can replace this with a real database query or any other data you want to show.
        // For this example, we directly set the content, but you could use AJAX to fetch more data if needed.
    }
</script>
</body>
</html>
