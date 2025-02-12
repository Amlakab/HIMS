<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Nurse Dashboard</title>
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
                        <a href="nurse_dashboard.php" class="sidebar-link">
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
                                <a href="nurse_patientlist.php" target="Nurse_Dashboard" class="sidebar-link">Treatment List</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Patient History</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="check_indoorpayment.php" target="Nurse_Dashboard" class="sidebar-link">Check Payment</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse"
                            aria-expanded="false"><i class="fa-solid fa-sliders pe-2"></i>
                            Prescription
                        </a>
                        <ul id="posts" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="admin_hompage.html" target="_blank" class="sidebar-link">View</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Upload</a>
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
                                <a href="nurse_treatment.php" target="Nurse_Dashboard" class="sidebar-link">Inpatient</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="nurse_outpatient.php" target="Nurse_Dashboard" class="sidebar-link">Outpatient</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="nurse_admited.php" target="Nurse_Dashboard" class="sidebar-link">Admited</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="nurse_discharged.php" target="Nurse_Dashboard" class="sidebar-link">Discharged</a>
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

                <iframe src="nurse_hompage.php" class="hide" width="100%" height="650" frameborder="0" name="Nurse_Dashboard"></iframe>
                
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
