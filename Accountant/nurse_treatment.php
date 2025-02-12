<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Admin Dashboard</title>
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
                                  <td >
                                    <?php if(isset($iddd) && $iddd!=0){
                            
                                     ?>
                                        <a href="#" id="Treatment_bnt"> <button class="btn-primary btn">View</button> </a>
                                        <?php 
                                        }
                                        else{
                                        ?>
                                        
                                        <a href="Treatment_bnt?iddd=<?php echo $row['Id']; ?>" id="Treatment_bnt"> <button class="btn-primary btn">View</button> </a>
                                        
                                        <?php 
                                        }
                                        ?>
                                        </td>
                                    <td>
                                        <a href="updat_status.php?id=<?php echo $id; ?>&status=<?php echo $status; ?>"><button class="btn-success btn">Admit</button></a>
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
</body>
</html>