<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/table.css">
</head>
<body>
    <main class="content px-3 py-2">
        <div class="container-fluid">
            <div class="mb-3">
                <h4>Nurse Dashboard</h4>
            </div>
            <!-- Table Element -->
            <div class="card border-0">
                <div class="card-header">
                    <h5 class="card-title">
                    <h1>Patient List</h1>
                    
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
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include ('../db_connection.php');
                              $status="new";
                              $seq_no=0;
                              $id=0;
                                $sql="SELECT * FROM patients WHERE Status='$status'";
                                $result=mysqli_query($con,$sql);
                                while( $row=mysqli_fetch_assoc($result)){
                                $seq_no++;
                                $id=$row['Id'];
                                $status1="inpatient";
                                $status2="outpatient";
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
                                  <td>
                                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#registrationModal2" onclick="openModal2(' <?php echo $id ; ?> ')">Treat</button>
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


     <!-- Allocate Modal -->
     <div class="modal fade" id="registrationModal2" tabindex="-1" aria-labelledby="registrationModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registrationModalLabel2">Room Assignment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Login Form -->
                    <form id="loginForm" method="post">
                        <input type="text"hidden name="id" id="id">

                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Blood Presure</label>
                            <input type="text" name="bpresure" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Temprature</label>
                            <input type="text" name="temprature" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Weight</label>
                            <input type="number" name="weight" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Height</label>
                            <input type="number" name="height" class="form-control" required>
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
        $idd=$_POST['id'];
        $bpresure=$_POST['bpresure'];
        $temprature=$_POST['temprature'];
        $weight=$_POST['weight'];
        $height=$_POST['height'];
        $sql="UPDATE  patients SET Bpresure='$bpresure',Temprature='$temprature',Weight='$weight',Height='$height', Status='unseen' WHERE Id='$idd'";
        $result=mysqli_query($con,$sql);
        if($result){
            ?>
            <script type="text/javascript">
            alert("success!");
            window.location.href='nurse_patientlist.php';
            </script>
            <?php
        }
        else{
        echo "error";
        }

        }?>

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
        }, 2000); // 30,000 milliseconds = 30 seconds
    </script>
    <script>
    // Function to open modal and pass ID to modal content
    function openModal2(itemId) {
        // You can use AJAX or simply use the item ID for displaying content in the modal.
        const modalContent = document.getElementById('id');
        modalContent.value = itemId;

        // Example: Using PHP to pass data to be displayed in the modal (this is just a static example)
        // You can replace this with a real database query or any other data you want to show.
        // For this example, we directly set the content, but you could use AJAX to fetch more data if needed.
    }
</script>
</body>
</html>