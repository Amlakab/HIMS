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
                <h4>Accountant Dashboard</h4>
            </div>
            <!-- Table Element -->
            <div class="card border-0">
                <div class="card-header">
                    <h5 class="card-title">Medicine Payment List</h5>
                </div>
                <div class="card-body">
                    <table class="animated-table">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Id</th>
                                <th>Date</th>
                                <th>Medicine1</th>
                                <th>Cost1</th>
                                <th>Medicine2</th>
                                <th>Cost2</th>
                                <th>Medicine3</th>
                                <th>Cost3</th>
                                <th>Medicine4</th>
                                <th>Cost4</th>
                                <th>Medicine5</th>
                                <th>Cost5</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include ('../db_connection.php');
                              $status="untrushed";
                              $seq_no=0;
                                $sql="SELECT * FROM pharmacypayments WHERE Status='$status'";
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
                                    <td><?php echo $row['Date']; ?></td>
                                    <td><?php echo $row['Medicine1']; ?></td>
                                    <td><?php echo $row['Cost1']; ?></td>
                                    <td><?php echo $row['Medicine2']; ?></td>
                                    <td><?php echo $row['Cost2']; ?></td>
                                    <td><?php echo $row['Medicine3']; ?></td>
                                    <td><?php echo $row['Cost3']; ?></td>
                                    <td><?php echo $row['Medicine4']; ?></td>
                                    <td><?php echo $row['Cost4']; ?></td>
                                    <td><?php echo $row['Medicine5']; ?></td>
                                    <td><?php echo $row['Cost5']; ?></td>
                                    <td><?php echo $row['Total']; ?></td>
                                    <td>
                                    <a href="update_status.php?id=<?php echo $row['Pid']; ?>&role=pharmacy&payment=<?php echo $row['Payment']; ?>"><button class="btn btn-danger"><?php echo $row['Payment']; ?></button></a>     
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
    <div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registrationModalLabel">Medicine Prescription</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Registration Form -->
                    <form id="registrationForm" method="post">
                    <div class="mb-3">
                            <label for="loginPassword" class="form-label">First Name</label>
                            <input type="text" name="fname" id="fname" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Last Name</label>
                            <input type="text" name="lname" disabled id="lname" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Id</label>
                            <input type="text" name="id" disabled id="id" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Age</label>
                            <input type="number" min="0" max="120" name="age" disabled id="age" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Gender</label>
                            <input type="text" name="gender" disabled id="gender" class="form-control" required>
                        </div>
                        <label  class="form-label">Medicine Type and Dosages(Maximum 5)</label>                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <input type="text" name="diagnosis1" disabled id="diagnosis1" class="form-control" placeholder="diagnosis type 1">
                            </div>
                            <div class="col-md-6 mb-3">
                            <input type="text" name="dosage1" disabled id="dosage1" class="form-control" placeholder="Dosage 1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <input type="text" name="diagnosis2" disabled id="diagnosis2" class="form-control" placeholder="diagnosis type 2">
                            </div>
                            <div class="col-md-6 mb-3">
                            <input type="text" name="dosage2" disabled id="dosage2" class="form-control" placeholder="Dosage 2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <input type="text" name="diagnosis3" disabled id="diagnosis3" class="form-control" placeholder="diagnosis type 3">
                            </div>
                            <div class="col-md-6 mb-3">
                            <input type="text" name="dosage3" disabled id="dosage3" class="form-control" placeholder="Dosage 3">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <input type="text" name="diagnosis4" disabled id="diagnosis4" class="form-control" placeholder="diagnosis type 4">
                            </div>
                            <div class="col-md-6 mb-3">
                            <input type="text" name="dosage4" disabled id="dosage4" class="form-control" placeholder="Dosage 4">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <input type="text" name="diagnosis5" disabled id="diagnosis5" class="form-control" placeholder="diagnosis type 4">
                            </div>
                            <div class="col-md-6 mb-3">
                            <input type="text" name="dosage5" disabled id="dosage5" class="form-control" placeholder="Dosage 5">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Labratorist Name</label>
                            <input type="text" name="laname" disabled id="laname" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Labratorist Contact</label>
                            <input type="text" name="lacontact" disabled id="lacontact" class="form-control" required>
                        </div>
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
    function openModal(id,fname,lname,age,gender,diagnosis1,result1,diagnosis2,result2,diagnosis3,result3,diagnosis4,result4,diagnosis5,result5,laname,lacontact) {
        // You can use AJAX or simply use the item ID for displaying content in the modal.
        document.getElementById('fname').value=fname;
        document.getElementById('lname').value=lname;
        document.getElementById('id').value=id;
        document.getElementById('age').value=age;
        document.getElementById('gender').value=gender;
        document.getElementById('diagnosis1').value=diagnosis1;
        document.getElementById('result1').value=result1;
        document.getElementById('diagnosis2').value=diagnosis2;
        document.getElementById('result3').value=result2;
        document.getElementById('diagnosis3').value=diagnosis3;
        document.getElementById('result3').value=result3;
        document.getElementById('diagnosis4').value=diagnosis4;
        document.getElementById('result4').value=result4;
        document.getElementById('diagnosis5').value=diagnosis5;
        document.getElementById('result5').value=result5;
        document.getElementById('laname').value=laname;
        document.getElementById('lacontact').value=lacontact;


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
