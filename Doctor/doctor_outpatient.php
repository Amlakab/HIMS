<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
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
                    <h1>Outpatient List</h1>
                    
                </div>
                <div class="loading-overlay">
                   <div class="spinner-border text-primary" role="status">
                     <span class="visually-hidden">Loading...</span>
                   </div>
               </div>
                <div class="card-body table-container">
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
                              $status="outpatient";
                              $seq_no=0;
                              $id=0;
                              $role="outpatient";
                                $sql="SELECT * FROM patients WHERE Status='$status'";
                                $result=mysqli_query($con,$sql);
                                while( $row=mysqli_fetch_assoc($result)){
                                $seq_no++;
                                $id=$row['Id'];
                                $status="unseen";
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
                                        <a href="update_status.php?id=<?php echo $id; ?>&status=<?php echo $status; ?>&role=<?php echo $role; ?>"><button class="btn-success btn">Review</button></a>
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
    <script>
      document.addEventListener("DOMContentLoaded", () => {
          const rows = document.querySelectorAll("tbody tr");
          rows.forEach((row, index) => {
              setTimeout(() => {
                  row.style.opacity = "1";
                  row.style.transform = "translateX(0)";
              }, index * 200);
          });
      });
  </script>
  <script>
        // Ensure spinner is visible for 30 seconds
        setTimeout(() => {
            // Hide the loading spinner
            document.querySelector('.loading-overlay').style.display = 'none';

            // Show the table
            document.querySelector('.table-container').style.display = 'block';
        }, 3000); // 30,000 milliseconds = 30 seconds
    </script>
</body>
</html>