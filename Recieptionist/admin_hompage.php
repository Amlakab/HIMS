<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=10" >

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/product.css">
</head>
<body>
    <main class="content px-3 py-2">
        <div class="container-fluid">
            <div class="mb-3">
                <h4>Recieptionist Dashboard</h4>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 d-flex">
                    <div class="card flex-fill border-0 illustration">
                        <div class="card-body p-0 d-flex flex-fill">
                            <div class="row g-0 w-100">
                                <div class="col-6">
                                    <div class="p-3 m-1">
                                        <h4>Welcome Back, Recieptionist</h4>
                                        <p class="mb-0">Recieptionist Dashboard, Tepi</p>
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
             
   <?php 
   include '../db_connection.php';
   $available=0;
   $pharmacy=0;
   $indoor=0;
   $trushed=0;
   $query="SELECT * FROM patients WHERE Available='untrushed' ";
   $result=mysqli_query($con,$query);
	while( $row=mysqli_fetch_assoc($result)){
        $available++;
    }
    $sql="SELECT * FROM pharmacypayments WHERE Status='untrushed' ";
    $result=mysqli_query($con,$sql);
        while( $row=mysqli_fetch_assoc($result)){
            $pharmacy++;
    }
    $add="SELECT * FROM indoorpayments WHERE Status='untrushed' ";
    $result=mysqli_query($con,$add);
        while( $row=mysqli_fetch_assoc($result)){
            $indoor++;
    }
    $qury="SELECT * FROM patients WHERE Available='trushed' ";
    $result=mysqli_query($con,$qury);
        while( $row=mysqli_fetch_assoc($result)){
            $trushed++;
    }
 
   ?>


         <div class="row">
            <section style="padding: 20px;">
                <div class="col-sm-3">
                    <div class="card card-green">
                        <h3>Available<br>Patient</h3>
                        <h2 style="color: #282828; text-align: center;"><?php echo $available ?></h2>
                        <a href=""><button class="btn-primary btn">View</button></a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card card-yellow" >
                        <h3>Pharmacy<br>Payment</h3>
                        <h2 style="color: #282828; text-align: center;"><?php echo $pharmacy ?></h2>
                        <a href=""><button class="btn-primary btn">View</button></a>
                    </div>
                </div>
                <div class="col-sm-3 " >
                    <div class="card card-blue" >
                        <h3>Indoor<br>Payment</h3>
                        <h2 style="color: #282828; text-align: center;"><?php echo $indoor ?></h2>
                        <a href=""><button class="btn-primary btn">View</button></a>
                    </div>
                </div>
                <div class="col-sm-3" >
                    <div class="card card-red" >
                        <h3>Trushed<br>Patient</h3>
                        <h2 style="color: #282828; text-align: center;"><?php echo $trushed ?></h2>
                        <a href=""><button class="btn-primary btn">View</button></a>
                    </div>
                </div>
            </section>
          </div>
        </div>
    </main> 
</body>
</html>