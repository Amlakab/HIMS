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
                    <h5 class="card-title">Trushed Labratory Payment List</h5>
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
                                <th>Diagnosis1</th>
                                <th>Cost1</th>
                                <th>Diagnosis2</th>
                                <th>Cost2</th>
                                <th>Diagnosis3</th>
                                <th>Cost3</th>
                                <th>Diagnosis4</th>
                                <th>Cost4</th>
                                <th>Diagnosis5</th>
                                <th>Cost5</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include ('../db_connection.php');
                              $status="trushed";
                              $seq_no=0;
                                $sql="SELECT * FROM labpayments WHERE Status='$status'";
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
                                    <td><?php echo $row['Diagnosis1']; ?></td>
                                    <td><?php echo $row['Cost1']; ?></td>
                                    <td><?php echo $row['Diagnosis2']; ?></td>
                                    <td><?php echo $row['Cost2']; ?></td>
                                    <td><?php echo $row['Diagnosis3']; ?></td>
                                    <td><?php echo $row['Cost3']; ?></td>
                                    <td><?php echo $row['Diagnosis4']; ?></td>
                                    <td><?php echo $row['Cost4']; ?></td>
                                    <td><?php echo $row['Diagnosis5']; ?></td>
                                    <td><?php echo $row['Cost5']; ?></td>
                                    <td><?php echo $row['Total']; ?></td>
                                    <td>
                                    <a href="update_status.php?tid=<?php echo $row['Pid']; ?>&role=labratory&status=untrushed"><button class="btn btn-danger">Restor</button></a>     
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        
            <!-- Table Element -->
            <div class="card border-0">
                <div class="card-header">
                    <h5 class="card-title">Trushed Medicine Payment List</h5>
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
                              $status="trushed";
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
                                    <a href="update_status.php?tid=<?php echo $row['Pid']; ?>&role=pharmacy&status=untrushed"><button class="btn btn-danger">Restor</button></a>     
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Table Element -->
            <div class="card border-0">
                <div class="card-header">
                    <h5 class="card-title">Indoor Payment List</h5>
                </div>
                <div class="card-body">
                    <table class="animated-table">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>First Name</th>
                                <th>Midle Name</th>
                                <th>Last Name</th>
                                <th>Id</th>
                                <th>Indoor Type</th>
                                <th>Date</th>
                                <th>Price</th>
                                <th>Day</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include ('../db_connection.php');
                              $status="trushed";
                              $seq_no=0;
                                $sql="SELECT * FROM indoorpayments WHERE Status='$status'";
                                $result=mysqli_query($con,$sql);
                                while( $row=mysqli_fetch_assoc($result)){
                                $seq_no++;
                                $id=$row['Id'];
                                $pid=$row['Pid'];
                                ?>
                                <tr>
                                    <td><?php echo $seq_no; ?></td>
                                    <td><?php echo $row['Fname']; ?></td>
                                    <td><?php echo $row['Mname']; ?></td>
                                    <td><?php echo $row['Lname']; ?></td>
                                    <td><?php echo $row['Id']; ?></td>
                                    <td><?php echo $row['Intype']; ?></td>
                                    <td><?php echo $row['Date']; ?></td>
                                    <td><?php echo $row['Price']; ?></td>
                                    <td><?php echo $row['Day']; ?></td>
                                    <td><?php echo $row['Payed']; ?></td>
                                    <td>
                                    <a href="update_status.php?tid=<?php echo $row['Pid']; ?>&role=indoor&status=untrushed"><button class="btn btn-danger">Restor</button></a>     
                                    </td>
                                </tr>
                            <?php } ?>
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
