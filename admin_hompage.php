<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main class="content px-3 py-2">
        <div class="container-fluid">
            <div class="mb-3">
                <h4>Admin Dashboard</h4>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 d-flex">
                    <div class="card flex-fill border-0 illustration">
                        <div class="card-body p-0 d-flex flex-fill">
                            <div class="row g-0 w-100">
                                <div class="col-6">
                                    <div class="p-3 m-1">
                                        <h4>Welcome Back, Admin</h4>
                                        <p class="mb-0">Admin Dashboard, CodzSword</p>
                                    </div>
                                </div>
                                <div class="col-6 align-self-end text-end">
                                    <img src="image/customer-support.jpg" class="img-fluid illustration-img"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 d-flex">
                    <div class="card flex-fill border-0">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h4 class="mb-2">
                                        $ 78.00
                                    </h4>
                                    <p class="mb-2">
                                        Total Earnings
                                    </p>
                                    <div class="mb-0">
                                        <span class="badge text-success me-2">
                                            +9.0%
                                        </span>
                                        <span class="text-muted">
                                            Since Last Month
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table Element -->
            <div class="card border-0">
                <div class="card-header">
                    <h5 class="card-title">
                        Basic Table
                    </h5>
                    <h6 class="card-subtitle text-muted">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum ducimus,
                        necessitatibus reprehenderit itaque!
                    </h6>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User Id</th>
                                <th>Fist Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Id</th>
                                <th>Birthdate</th>
                                <th>Age</th>
                                <th>Address</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Sex</th>
                                <th>Blood group</th>
                                <th>Blood pressure</th>
                                <th>Weight</th>
                                <th>Tempreture</th>
                                <th>Height</th>
                                <th>Action</th>
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
                                ?>
                                <tr>
                                <td><?php echo $seq_no; ?></td>
                                  <td><?php echo $row['Fname']; ?></td>
                                  <td><?php echo $row['Mname']; ?></td>
                                  <td><?php echo $row['Lname']; ?></td>
                                  <td><?php echo $row['Id']; ?></td>
                                  <td><?php echo $row['Birthdate']; ?></td>
                                  <td><?php echo $row['Age']; ?></td>
                                  <td><?php echo $row['Mobile']; ?></td>
                                  <td><?php echo $row['Email']; ?></td>
                                  <td><?php echo $row['Address']; ?></td>
                                  <td><?php echo $row['Sex']; ?></td>
                                  <td><?php echo $row['Bgroup']; ?></td>
                                  <td><?php echo $row['Bpresure']; ?></td>
                                  <td><?php echo $row['Weight']; ?></td>
                                  <td><?php echo $row['Temprature']; ?></td>
                                  <td><?php echo $row['Height']; ?></td>
                                  <td class="action_td">
                                    <?php if(isset($iddd) && $iddd!=0){
                            
                                     ?>
                                        <a href="#" id="Treatment_bnt"> <span class="editbtn">View</span> </a>
                                        <?php 
                                        }
                                        else{
                                        ?>
                                        <a href="Treatment_bnt?iddd=<?php echo $row['Id']; ?>" id="Treatment_bnt"> <span class="editbtn">View</span> </a>
                            
                                        <?php 
                                        }
                                        ?>
                                        <a href="#"> <span class="removedbtn" id="Allocate">Allocate</span> </a>
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
</body>
</html>