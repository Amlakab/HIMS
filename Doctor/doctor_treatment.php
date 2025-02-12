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
                <h4>Admin Dashboard</h4>
            </div>
            <!-- Table Element -->
            <div class="card border-0">
                <div class="card-header">
                    <h5 class="card-title">Patient List Needs Indoor</h5>
                </div>
                <div class="card-body">
                    <table class="animated-table">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>ID</th>
                                <th>Birthdate</th>
                                <th>Age</th>
                                <th>Address</th>
                                <th>Type</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Blood Pressure</th>
                                <th>Weight</th>
                                <th>Temperature</th>
                                <th>Height</th>
                                <th colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include ('../db_connection.php');
                              $status="inpatient";
                              $seq_no=0;
                                $sql="SELECT * FROM patients WHERE Status='$status'";
                                $result=mysqli_query($con,$sql);
                                while( $row=mysqli_fetch_assoc($result)){
                                $seq_no++;
                                $id=$row['Id'];
                                $mhistory=$row['Mhistory'];
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
                                    <td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registrationModal" onclick="openModal(' <?php echo $id ; ?> ',' <?php echo $resoan ; ?> ',' <?php echo $lstyle ; ?> ',' <?php echo $tplan ; ?> ',' <?php echo $date ; ?> ')">View</button>
                                    </td>
                                    <td>
                                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#registrationModal2" onclick="openModal2(' <?php echo $id ; ?> ','<?php echo $row['Fname']; ?>','<?php echo $row['Mname']; ?>','<?php echo $row['Lname']; ?>')">Admit</button>
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
                    <h5 class="modal-title" id="registrationModalLabel">Admition Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Registration Form -->
                    <form id="registrationForm">
                        <div class="mb-3">
                            <h4 style="width: 100% ; height: 40px; background-color : black ; color: white; text-align: center; paddind-top:10px" >Username</h4>
                            <textarea style="width: 100% ; height: 180px" name="" id="amlakie">amlakie mac</textarea>
                        </div>
                        <div class="mb-3">
                        <h4 style="width: 100% ; height: 40px; background-color : black ; color: white; text-align: center; paddind-top:10px" >Username</h4>                            
                        <textarea style="width: 100% ; height: 180px" name="" id="">amlakie mac</textarea>
                        </div>
                        <div class="mb-3">
                        <h4 style="width: 100% ; height: 40px; background-color : black ; color: white; text-align: center; paddind-top:10px" >Username</h4>                            
                        <textarea style="width: 100% ; height: 180px" name="" id="">amlakie mac</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Allocate Modal -->
    <div class="modal fade" id="registrationModal2" tabindex="-1" aria-labelledby="registrationModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registrationModalLabel2">Allocate Patient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Login Form -->
                    <form id="loginForm" method="post">
                    <input type="text" id="fname" name="fname" hidden>
                    <input type="text" id="mname" name="mname" hidden>
                    <input type="text" id="lname" name="lname" hidden>
                    <input type="text" id="id" name="id" hidden>
                        <div class="mb-3">
                        <h4 style="width: 100% ; height: 40px; background-color : black ; color: white; text-align: center; paddind-top:10px" >Reason for Admition</h4>                            
                        <textarea style="width: 100% ; height: 180px" name="reason" id=""></textarea>
                        </div>
                        <div class="mb-3">
                        <h4 style="width: 100% ; height: 40px; background-color : black ; color: white; text-align: center; paddind-top:10px" >Life Style</h4>                            
                        <textarea style="width: 100% ; height: 180px" name="lstyle" id=""></textarea>
                        </div>
                        <div class="mb-3">
                        <h4 style="width: 100% ; height: 40px; background-color : black ; color: white; text-align: center; paddind-top:10px" >Treatment Plan</h4>                            
                        <textarea style="width: 100% ; height: 180px" name="tplan" id="">amlakie mac</textarea>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Insuranse Provider</label>
                            <input type="text" class="form-control" name="iprovider" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Policy Number</label>
                            <input type="text"  name="pnumber" class="form-control" required>
                        </div>
                        <div class="mb-3">
                        <label for="ward">Ward/Unit:</label>
                        <select id="ward" class="form-control" name="type">
                            <option value="general">General Ward</option>
                            <option value="icu">ICU</option>
                            <option value="surgery">Surgery</option>
                        </select>
                        </div>
                        <div class="mb-3">
                        <label for="admission-date">Admission Date and Time:</label>
                        <input type="datetime-local" class="form-control" id="admission-date" name="date" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">Save</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    include '../db_connection.php';
    if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $lname=$_POST['lname'];
    $reason=$_POST['reason'];
    $lstyle=$_POST['lstyle'];
    $tplan=$_POST['tplan'];
    $type=$_POST['type'];
    $iprovider=$_POST['iprovider'];
    $pnumber=$_POST['pnumber'];
    $date=$_POST['date'];
    $day=1;
    $status="untrushed";
    $payment="unpayed";
    $payed=0;
    $price=0;
    if($type=="sergery"){
        $price=1000;
    }
    else if($type=="ICU"){
        $price=800;
    }
    else{
        $price=500; 
    }
    $unpayed=$price;
    $sql="INSERT INTO admited (Id,Resoan,Lstyle,Tplan,Iprovider,Pnumber,Date,Type) VALUES ('$id','$reason','$lstyle','$tplan','$iprovider','$pnumber','$date','$type')";
    $result=mysqli_query($con,$sql);
    if($result){
        $date = date("Y-m-d H:i:s");
        $query="INSERT INTO indoorpayments (Id,Fname,Mname,Lname,Date,Day,Intype,Payed,Unpayed,Payment,Status,Price) VALUES ('$id','$fname','$mname','$lname','$date','$day','$type','$payed','$unpayed','$payment','$status','$price')";
        $result=mysqli_query($con,$query);
        if($result){
            ?>
            <script type="text/javascript">
            alert("You have adnited patient succesfully!");
            </script>
            <?php
        }
        else{
            echo "error";
        } 
        
    }
    else{
        echo "error";
    }



   }

   ?>
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
    function openModal(itemId,fname,lname,mname) {
        // You can use AJAX or simply use the item ID for displaying content in the modal.
        const modalContent = document.getElementById('amlakie');
        modalContent.value = itemId;

        // Example: Using PHP to pass data to be displayed in the modal (this is just a static example)
        // You can replace this with a real database query or any other data you want to show.
        // For this example, we directly set the content, but you could use AJAX to fetch more data if needed.
    }
    // Function to open modal and pass ID to modal content
    function openModal2(itemId,fname,mname,lname) {
        // You can use AJAX or simply use the item ID for displaying content in the modal.
        document.getElementById('id').value = itemId;
        document.getElementById('fname').value = fname;
        document.getElementById('lname').value = lname;
        document.getElementById('mname').value = mname;

        // Example: Using PHP to pass data to be displayed in the modal (this is just a static example)
        // You can replace this with a real database query or any other data you want to show.
        // For this example, we directly set the content, but you could use AJAX to fetch more data if needed.
    }
</script>
</body>
</html>
