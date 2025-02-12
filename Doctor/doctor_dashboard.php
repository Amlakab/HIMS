<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Doctor Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <div class="sidebar-logo">
                <a href="image/amlakie.jpg">
                <img src="image/amlakie.jpg" style="width:120px ; height: 110px" class="avatar img-fluid rounded-circle" alt="">
                </a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        <h6><marquee behavior="scroll" direction="left">Wellcome Amlakie</marquee></h6>
                        
                    </li>
                    <li class="sidebar-item">
                        <a href="doctor_dashboard.php" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse"
                            aria-expanded="false"><i class="fa-solid fa-file-lines pe-2"></i>
                            Patient
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="doctor_patientlist.php" target="Doctor_Dashboard" class="sidebar-link">Treatment List</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Patient History</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse"
                            aria-expanded="false"><i class="fa-solid fa-sliders pe-2"></i>
                            Prescription
                        </a>
                        <ul id="posts" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="admin_hompage.html" data-bs-toggle="modal" data-bs-target="#registrationModal2"  target="_blank" class="sidebar-link">For Labratorist</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#registrationModal"  class="sidebar-link">For Pharmacist</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#results" data-bs-toggle="collapse"
                            aria-expanded="false"><i class="fa-solid fa-sliders pe-2"></i>
                            Result
                        </a>
                        <ul id="results" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="view_diagnosisresult.php" target="Doctor_Dashboard" class="sidebar-link">from Labratorist</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">From Nurse</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#treatment" data-bs-toggle="collapse"
                            aria-expanded="false"><i class="fa-solid fa-sliders pe-2"></i>
                            Treatment
                        </a>
                        <ul id="treatment" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="doctor_treatment.php" target="Doctor_Dashboard" class="sidebar-link">Inpatient</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="doctor_outpatient.php" target="Doctor_Dashboard" class="sidebar-link">Outpatient</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="doctor_admited.php" target="Doctor_Dashboard" class="sidebar-link">Admited</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="doctor_discharged.php" target="Doctor_Dashboard" class="sidebar-link">Discharged</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#appointments" data-bs-toggle="collapse"
                            aria-expanded="false"><i class="fa-solid fa-sliders pe-2"></i>
                            Appointment
                        </a>
                        <ul id="appointments" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="add_appointment.php" target="Doctor_Dashboard" class="sidebar-link">Add Appointment</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="manage_appointment.php" target="Doctor_Dashboard" class="sidebar-link">Manage Appointment</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#auth" data-bs-toggle="collapse"
                            aria-expanded="false"><i class="fa-regular fa-user pe-2"></i>
                            Auth
                        </a>
                        <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Login</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Register</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Forgot Password</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- start sid navbar -->

        <!-- start main header -->
            <div class="main">
                <nav class="navbar navbar-expand px-3 border-bottom">
                    <button class="btn" id="sidebar-toggle" type="button">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse navbar">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                    <img src="image/profile.jpg" class="avatar img-fluid rounded-circle" alt="">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item">Profile</a>
                                    <a href="#" class="dropdown-item">Setting</a>
                                    <a href="#" class="dropdown-item">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- start main header -->

                <!--start innerr body -->

                <iframe src="admin_hompage.php" class="hide" width="100%" height="650" frameborder="0" name="Doctor_Dashboard"></iframe>
                
                <!-- end enner body -->
                
                <!-- <a href="#" class="theme-toggle">
                    <i class="fa-regular fa-moon"></i>
                    <i class="fa-regular fa-sun"></i>
                </a> -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row text-muted">
                            <div class="col-6 text-start">
                                <p class="mb-0">
                                    <a href="#" class="text-muted">
                                        <strong>CodzSwod</strong>
                                    </a>
                                </p>
                            </div>
                            <div class="col-6 text-end">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="#" class="text-muted">Contact</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="text-muted">About Us</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="text-muted">Terms</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="text-muted">Booking</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
    </div>
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
                            <input type="text" name="fname" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Last Name</label>
                            <input type="text" name="lnsme" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Id</label>
                            <input type="text" name="id" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Age</label>
                            <input type="number" min="0" max="120" name="age" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Gender</label>
                            <input type="text" name="gender" class="form-control" required>
                        </div>
                        <label  class="form-label">Medicine Type and Dosages(Maximum 5)</label>                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <input type="text" name="medicine1" class="form-control" placeholder="Medicine type 1">
                            </div>
                            <div class="col-md-6 mb-3">
                            <input type="text" name="dosage1" class="form-control" placeholder="Dosage 1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <input type="text" name="medicine2" class="form-control" placeholder="Medicine type 2">
                            </div>
                            <div class="col-md-6 mb-3">
                            <input type="text" name="dosage2" class="form-control" placeholder="Dosage 2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <input type="text" name="medicine3" class="form-control" placeholder="Medicine type 3">
                            </div>
                            <div class="col-md-6 mb-3">
                            <input type="text" name="dosage3" class="form-control" placeholder="Dosage 3">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <input type="text" name="medicine4" class="form-control" placeholder="Medicine type 4">
                            </div>
                            <div class="col-md-6 mb-3">
                            <input type="text" name="dosage4" class="form-control" placeholder="Dosage 4">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <input type="text" name="medicine5" class="form-control" placeholder="Medicine type 4">
                            </div>
                            <div class="col-md-6 mb-3">
                            <input type="text" name="dosage5" class="form-control" placeholder="Dosage 5">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Doctor Name</label>
                            <input type="text" name="dname" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Doctor Contact</label>
                            <input type="text" name="dcontact" class="form-control" required>
                        </div>
                        <button type="submit" name="submit1" class="btn btn-success">Send</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
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
                    <h5 class="modal-title" id="registrationModalLabel2">Labratory Prescription</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Login Form -->
                    <form id="loginForm" method="post">
                        <div class="mb-3">
                            <label for="loginUsername" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="fname"  id="loginUsername" required>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lname"  value="" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Age</label>
                            <input type="number" min="0" max="120" name="age" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Gender</label>
                            <input type="text" name="gender" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Id</label>
                            <input type="text" class="form-control" name="id"   value="" required>
                        </div>
                        <label  class="form-label">Diagnosis Type(Maximum 5)</label>                        <div class="mb-3">
                        <input type="text" name="diagnosis1" class="form-control" placeholder="Diagnosis type 1">
                        </div>
                        <div class="mb-3">
                        <input type="text" name="diagnosis2" class="form-control" placeholder="Diagnosis type 2">
                        </div>
                        <div class="mb-3">
                        <input type="text" name="diagnosis3" class="form-control" placeholder="Diagnosis type 3">
                        </div>
                        <div class="mb-3">
                        <input type="text" name="diagnosis4" class="form-control" placeholder="Diagnosis type 4">
                        </div>
                        <div class="mb-3">
                        <input type="text" name="diagnosis5" class="form-control" placeholder="Diagnosis type 5">
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Doctor Name</label>
                            <input type="text" name="dname" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Doctor Contact</label>
                            <input type="text" name="dcontact" class="form-control" required>
                        </div>
                        <button type="submit" name="submit2" class="btn btn-success">Send</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- php cod for inserting prescription -->

<?php
  include '../db_connection.php';
    if(isset($_POST['submit2']))
    {
    	$id=$_POST['id'];
    	$fname=$_POST['fname'];
    	$lname=$_POST['lname'];
    	$age=$_POST['age'];
    	$gender=$_POST['gender'];
    	$diagnosis1=$_POST['diagnosis1'];
    	$diagnosis2=$_POST['diagnosis2'];
    	$diagnosis3=$_POST['diagnosis3'];
    	$diagnosis4=$_POST['diagnosis4'];
    	$diagnosis5=$_POST['diagnosis5'];
    	$dname=$_POST['dname'];
    	$dcontact=$_POST['dcontact'];

    	// $encrypted_fname=encriptthis($fname,$key);
    	// $encrypted_lname=encriptthis($lname,$key);
    	// $encrypted_age=encriptthis($age,$key);
    	// $encrypted_gender=encriptthis($gender,$key);
    	// $encrypted_diagnosis1=encriptthis($diagnosis1,$key);
    	// $encrypted_diagnosis2=encriptthis($diagnosis2,$key);
    	// $encrypted_diagnosis3=encriptthis($diagnosis3,$key);
    	// $encrypted_diagnosis4=encriptthis($diagnosis4,$key);
    	// $encrypted_diagnosis5=encriptthis($diagnosis5,$key);
    	// $encrypted_dname=encriptthis($dname,$key);
    	// $encrypted_dcontact=encriptthis($dcontact,$key);

 $query="INSERT INTO labprescription(Fname,Lname,Age,Gender,Diagnosis1,Diagnosis2,Diagnosis3,Diagnosis4,Diagnosis5,Dname,Dcontact,Id,Status) VALUES('$fname','$lname','$age','$gender','$diagnosis1','$diagnosis2','$diagnosis3','$diagnosis4','$diagnosis5','$dname','$dcontact','$id' ,'untrushed')";
    	$add=mysqli_query($con,$query);
    	if($add){
    			?>
			<script type="text/javascript">
			alert("You have sent prescription succesfully!");
		</script>
			<?php
    	}
    	else{
			?>
			<script type="text/javascript">
			alert("There is an error. Try again!");

		</script>
			<?php
    	}
    }
//insert pharmacy prescription

if(isset($_POST['submit1']))
    {
    	$id=$_POST['id'];
    	$fname=$_POST['fname'];
    	$lname=$_POST['lname'];
    	$age=$_POST['age'];
    	$gender=$_POST['gender'];
    	$medicine1=$_POST['medicine1'];
    	$dosage1=$_POST['dosage1'];
    	$medicine2=$_POST['medicine2'];
    	$dosage2=$_POST['dosage2'];
    	$medicine3=$_POST['medicine3'];
    	$dosage3=$_POST['dosage3'];
    	$medicine4=$_POST['medicine4'];
    	$dosage4=$_POST['dosage4'];
    	$medicine5=$_POST['medicine5'];
    	$dosage5=$_POST['dosage5'];
    	$dname=$_POST['dname'];
    	$dcontact=$_POST['dcontact'];

    	//Encrypt data

    //   $encrypted_fname=encriptthis($fname,$key);
    // 	$encrypted_lname=encriptthis($lname,$key);
    // 	$encrypted_age=encriptthis($age,$key);
    // 	$encrypted_gender=encriptthis($gender,$key);
    // 	$encrypted_medicine1=encriptthis($medicine1,$key);
    // 	$encrypted_dosage1=encriptthis($dosage1,$key);
    // 	$encrypted_medicine2=encriptthis($medicine2,$key);
    // 	$encrypted_dosage2=encriptthis($dosage2,$key);
    // 	$encrypted_medicine3=encriptthis($medicine3,$key);
    // 	$encrypted_dosage3=encriptthis($dosage3,$key);
    // 	$encrypted_medicine4=encriptthis($medicine4,$key);
    // 	$encrypted_dosage4=encriptthis($dosage4,$key);
    // 	$encrypted_medicine5=encriptthis($medicine5,$key);
    // 	$encrypted_dosage5=encriptthis($dosage5,$key);
    // 	$encrypted_dname=encriptthis($dname,$key);
    // 	$encrypted_dcontact=encriptthis($dcontact,$key);

 $query="INSERT INTO prescriptionpharmacy(Id,Fname,Lname,Age,Gender,Medicine1,Dosage1,Medicine2,Dosage2,Medicine3,Dosage3,Medicine4,Dosage4,Medicine5,Dosage5,Dname,Dcontact,Status) VALUES('$id' ,'$fname','$lname','$age','$gender','$medicine1','$dosage1','$medicine2','$dosage2','$medicine3','$dosage3','$medicine4','$dosage4','$medicine5','$dosage5','$dname','$dcontact','untrushed')";
    	$add=mysqli_query($con,$query);
    	if($add){
    			?>
			<script type="text/javascript">
			alert("You have sent prescription succesfully!");
		</script>
			<?php
    		
    	}
    	else{
			?>
			<script type="text/javascript">
			alert("There is an error. Try again!");

		</script>
			<?php
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
    function openModal(itemId) {
        // You can use AJAX or simply use the item ID for displaying content in the modal.
        const modalContent = document.getElementById('amlakie');
        modalContent.value = itemId;

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
