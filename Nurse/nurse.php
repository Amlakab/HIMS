<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/table.css">
</head>
<body>
    <main class="content px-3 py-2">
        <div class="container-fluid">
            <div class="mb-3">
                <h4>Admin Dashboard</h4>
            </div>
            <!-- Table Element -->
            <div class="card border-0">
                <div class="card-header">
                    <h5 class="card-title">
                    <h1>Patient List Needs Indoor</h1>
                    
                </div>
                <div class="card-body">
                    <table class="animated-table">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Fist Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Id</th>
                                <th>Birthdate</th>
                                <th>Age</th>
                                <th>Address</th>
                                <th>Type</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Blood pressure</th>
                                <th>Weight</th>
                                <th>Tempreture</th>
                                <th>Height</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include ('../db_connection.php');
                              $status="inpatient";
                              $seq_no=0;
                              $id=0;
                                $sql="SELECT * FROM patients WHERE Status='$status'";
                                $result=mysqli_query($con,$sql);
                                while( $row=mysqli_fetch_assoc($result)){
                                $seq_no++;
                                $id=$row['Id'];
                                $status="admited";
                                ?>
                                <tr>
                                <td><?php echo $seq_no; ?></td>
                                  <td><?php echo $row['Fname']; ?></td>
                                  <td><?php echo $row['Mname']; ?></td>
                                  <td><?php echo $row['Lname']; ?></td>
                                  <td><?php echo $row['Id']; ?></td>
                                  <td><?php echo $row['Brthdate']; ?></td>
                                  <td><?php echo $row['Age']; ?></td>
                                  <td><?php echo $row['Ptype']; ?></td>
                                  <td><?php echo $row['Email']; ?></td>
                                  <td><?php echo $row['Address']; ?></td>
                                  <td><?php echo $row['Gender']; ?></td>
                                  <td><?php echo $row['Bpresure']; ?></td>
                                  <td><?php echo $row['Weight']; ?></td>
                                  <td><?php echo $row['Temprature']; ?></td>
                                  <td><?php echo $row['Height']; ?></td>
                                  <td>
                                  <a href="nurse_treatment.php?id=<?php echo $id ?>" class="btn btn-primary">View</a>
                                   </td>
                                    <td>
                                    <a href="nurse_treatment.php?id=<?php echo $id ?>" class="btn btn-success">Allocate</a>
                                    </td>
                                </tr>
                            <?php
                              }
                            
                              ?>
                            
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    
    <!--start model -->
    <div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registrationModalLabel">Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="registrationForm">
                        <div class="mb-3">
                            <label for="username" style="width: 100% ; height: 45px" class="form-label">Username</label>
                            <textarea style="width: 100% ; height: 180px" name="" id="">amlakie mac</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <textarea style="width: 100% ; height: 180px" name="" id="">amlakie mac</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                    <!-- The dynamic ID will appear here -->
                </div>
            </div>
        </div>
    </div>
    
    <!--start model -->
    <div class="modal fade" id="registrationModal2" tabindex="-1" aria-labelledby="registrationModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registrationModalLabel2">Amlakie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="registrationForm2">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <textarea name="" id="">amlakie mac</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <textarea name="" id="">amlakie mac</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                    <!-- The dynamic ID will appear here -->
                </div>
            </div>
        </div>
    </div>
    <script>
    // Function to open modal and pass ID to modal content
    function openModal(itemId) {
        // You can use AJAX or simply use the item ID for displaying content in the modal.
        const modalContent = document.getElementById('modalContent');
        modalContent.innerHTML = 'Details for Item ID: ' + itemId;

        // Example: Using PHP to pass data to be displayed in the modal (this is just a static example)
        // You can replace this with a real database query or any other data you want to show.
        // For this example, we directly set the content, but you could use AJAX to fetch more data if needed.
    }
</script>
</body>
</html>