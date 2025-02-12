
<?php
include('../db_connection.php');

if(isset($_GET['id'])){
$role="";
$role="payment";
$idd=$_GET['id'];
if(isset($_GET['role'])){
$role=$_GET['role'];
}
if(isset($_GET['payment'])){
    $payment=$_GET['payment'];
    }
if($role=="prescription"){
$query=" UPDATE labprescription SET Status='trushed' WHERE Pid='$idd'";
$result=mysqli_query($con,$query);
if($result){
    header('location:view_labratoryprescription.php');
}
else{
    echo "error";
}
}
if($role=="check"){
    if($payment=="payed"){
    $query=" UPDATE labpayments SET Status='trushed' WHERE Pid='$idd'";
    $result=mysqli_query($con,$query);
    if($result){
        header('location:check_labratorpayment.php');
    }
    else{
        echo "error";
    }
    }
    else{
        ?>
        <script type="text/javascript">
        alert("The patient must pay before trushed!");
        window.location.href='check_labratorpayment.php';  

    </script>
        <?php
    }
}

}
if(isset($_GET['pid'])){
    $pid=$_GET['pid'];
    $query=" UPDATE labprescription SET Status='untrushed' WHERE Pid='$pid'";
    $result=mysqli_query($con,$query);
    if($result){
        header('location:view_trushedprescription.php');
    }
    else{
        echo "error";
    }
    }

?>
