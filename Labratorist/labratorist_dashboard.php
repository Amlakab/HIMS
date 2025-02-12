<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Labratorist Dashboard</title>
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
                    <a href="#">CodzSword</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Admin Elements
                    </li>
                    <li class="sidebar-item">
                        <a href="labratorist_dashboard.php" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse"
                            aria-expanded="false"><i class="fa-solid fa-file-lines pe-2"></i>
                            Prescription
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="view_labratoryprescription.php" target="Labratorist_Dashboard" class="sidebar-link">View
                            <li class="sidebar-item">
                                <a href="#"data-bs-toggle="modal" data-bs-target="#registrationModal" class="sidebar-link">Upload</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse"
                            aria-expanded="false"><i class="fa-solid fa-sliders pe-2"></i>
                            Payment
                        </a>
                        <ul id="posts" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="admin_hompage.html" data-bs-toggle="modal" data-bs-target="#registrationModal3" target="_blank" class="sidebar-link">Notify</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="check_labratorpayment.php" target="Labratorist_Dashboard" class="sidebar-link">Chack</a>
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
                                    <img src="image/profile.jpg" class="avatar img-fluid rounded" alt="">
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

                <iframe src="labratorist_hompage.php" class="hide" width="100%" height="650" frameborder="0" name="Labratorist_Dashboard"></iframe>
                
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

<!-- model for lub result -->

    <div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registrationModalLabel">Labratory Result</h5>
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
                            <input type="text" name="lname" class="form-control" required>
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
                        <label  class="form-label">Diagnosis Type and Results(Maximum 5)</label>                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="loginPassword" class="form-label">Diagnosis Type</label>
                            <input type="text" name="diagnosis1" class="form-control" placeholder="Diagnosis type 1" reqaired>
                            </div>
                            <div class="col-md-6 mb-3">
                            <label for="loginPassword" class="form-label">Results</label>
                            <input type="text" name="result1" class="form-control" placeholder="Result 1" reqaired>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <input type="text" name="diagnosis2" class="form-control" placeholder="Diagnosis type 2">
                            </div>
                            <div class="col-md-6 mb-3">
                            <input type="text" name="result2" class="form-control" placeholder="Result 2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <input type="text" name="diagnosis3" class="form-control" placeholder="Diagnosis type 3">
                            </div>
                            <div class="col-md-6 mb-3">
                            <input type="text" name="result3" class="form-control" placeholder="Result 3">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <input type="text" name="diagnosis4" class="form-control" placeholder="Diagnosis type 4">
                            </div>
                            <div class="col-md-6 mb-3">
                            <input type="text" name="result4" class="form-control" placeholder="Result 4">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <input type="text" name="diagnosis5" class="form-control" placeholder="Diagnosis type 4">
                            </div>
                            <div class="col-md-6 mb-3">
                            <input type="text" name="result5" class="form-control" placeholder="Result 5">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Labratorist Name</label>
                            <input type="text" name="laname" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Labratorist Contact</label>
                            <input type="text" name="lacontact" class="form-control" required>
                        </div>
                        <button type="submit" name="submit1" class="btn btn-success">Send</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- model for notify payment -->
    <div class="modal fade" id="registrationModal3" tabindex="-1" aria-labelledby="registrationModalLabel3" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registrationModalLabel3">Labratory Payment</h5>
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
                            <input type="text" name="lname" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Id</label>
                            <input type="text" name="id" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Date</label>
                            <input type="date" name="date" class="form-control" required>
                        </div>
                        <label  class="form-label">Diagnosis Type and costs(Maximum 5)</label>                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="loginPassword" class="form-label">Diagnosis Type</label>
                            <input type="text" name="diagnosis1" class="form-control" placeholder="Diagnosis type 1" reqaired>
                            </div>
                            <div class="col-md-6 mb-3">
                            <label for="loginPassword" class="form-label">Costs</label>
                            <input type="number" name="cost1" value="0" class="form-control" placeholder="Cost 1" reqaired>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <input type="text" name="diagnosis2" class="form-control" placeholder="Diagnosis type 2">
                            </div>
                            <div class="col-md-6 mb-3">
                            <input type="number" name="cost2" value="0" class="form-control" placeholder="Cost 2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <input type="text" name="diagnosis3" class="form-control" placeholder="Diagnosis type 3">
                            </div>
                            <div class="col-md-6 mb-3">
                            <input type="number" name="cost3" value="0" class="form-control" placeholder="CSost 3">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <input type="text" name="diagnosis4" class="form-control" placeholder="Diagnosis type 4">
                            </div>
                            <div class="col-md-6 mb-3">
                            <input type="number" name="cost4" value="0" class="form-control" placeholder="Cost 4">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <input type="text" name="diagnosis5" class="form-control" placeholder="Diagnosis type 4">
                            </div>
                            <div class="col-md-6 mb-3">
                            <input type="number" name="cost5" value="0" class="form-control" placeholder="Cost 5">
                            </div>
                        </div>
                        <button type="submit" name="submit3" class="btn btn-success">Send</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    include '../db_connection.php';
    if(isset($_POST['submit3']))
    {
    	$id=$_POST['id'];
    	$fname=$_POST['fname'];
    	$lname=$_POST['lname'];
    	$date=$_POST['date'];
    	$diagnosis1=$_POST['diagnosis1'];
    	$cost1=$_POST['cost1'];
    	$diagnosis2=$_POST['diagnosis2'];
    	$cost2=$_POST['cost2'];
    	$diagnosis3=$_POST['diagnosis3'];
    	$cost3=$_POST['cost3'];
    	$diagnosis4=$_POST['diagnosis4'];
    	$cost4=$_POST['cost4'];
    	$diagnosis5=$_POST['diagnosis5'];
    	$cost5=$_POST['cost5'];
    	$total=$cost1+$cost2+$cost3+$cost4+$cost5;
    	$payment="unpayed";

    	//Encrypt data

    //   $encrypted_fname=encriptthis($fname,$key);
    // 	$encrypted_lname=encriptthis($lname,$key);
    // 	$encrypted_age=encriptthis($age,$key);
    // 	$encrypted_gender=encriptthis($gender,$key);
    // 	$encrypted_diagnosis1=encriptthis($medicine1,$key);
    // 	$encrypted_result1=encriptthis($dosage1,$key);
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

 $query="INSERT INTO labpayments(Id,Fname,Date,Lname,Diagnosis1,Cost1,Diagnosis2,Cost2,Diagnosis3,Cost3,Diagnosis4,Cost4,Diagnosis5,Cost5,Total,Payment,Status) VALUES('$id' ,'$fname','$date','$lname','$diagnosis1','$cost1','$diagnosis2','$cost2','$diagnosis3','$cost3','$diagnosis4','$cost4','$diagnosis5','$cost5','$total','$payment','untrushed')";
    	$add=mysqli_query($con,$query);
    	if($add){
    			?>
			<script type="text/javascript">
			alert("You have notify payment succesfully!");
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

    <?php
    include '../db_connection.php';
    if(isset($_POST['submit1']))
    {
    	$id=$_POST['id'];
    	$fname=$_POST['fname'];
    	$lname=$_POST['lname'];
    	$age=$_POST['age'];
    	$gender=$_POST['gender'];
    	$diagnosis1=$_POST['diagnosis1'];
    	$result1=$_POST['result1'];
    	$diagnosis2=$_POST['diagnosis2'];
    	$result2=$_POST['result2'];
    	$diagnosis3=$_POST['diagnosis3'];
    	$result3=$_POST['result3'];
    	$diagnosis4=$_POST['diagnosis4'];
    	$result4=$_POST['result4'];
    	$diagnosis5=$_POST['diagnosis5'];
    	$result5=$_POST['result5'];
    	$laname=$_POST['laname'];
    	$lacontact=$_POST['lacontact'];

    	//Encrypt data

    //   $encrypted_fname=encriptthis($fname,$key);
    // 	$encrypted_lname=encriptthis($lname,$key);
    // 	$encrypted_age=encriptthis($age,$key);
    // 	$encrypted_gender=encriptthis($gender,$key);
    // 	$encrypted_diagnosis1=encriptthis($medicine1,$key);
    // 	$encrypted_result1=encriptthis($dosage1,$key);
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

 $query="INSERT INTO diagnosisresult(Id,Fname,Lname,Age,Gender,Diagnosis1,Result1,Diagnosis2,Result2,Diagnosis3,Result3,Diagnosis4,Result4,Diagnosis5,Result5,Laname,lacontact,Status) VALUES('$id' ,'$fname','$lname','$age','$gender','$diagnosis1','$result1','$diagnosis2','$result2','$diagnosis3','$result3','$diagnosis4','$result4','$diagnosis5','$result5','$laname','$lacontact','untrushed')";
    	$add=mysqli_query($con,$query);
    	if($add){
    			?>
			<script type="text/javascript">
			alert("You have sent labratory result succesfully!");
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
