
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
$query=" UPDATE prescriptionpharmacy SET Status='trushed' WHERE Id='$idd'";
$result=mysqli_query($con,$query);
if($result){
    header('location:view_pharmacyprescription.php');
}
else{
    echo "error";
}
}
if($role=="check"){
    if($payment=="payed"){
    $query=" UPDATE pharmacypayments SET Status='trushed' WHERE Pid='$idd'";
    $result=mysqli_query($con,$query);
    if($result){
        header('location:cheak_pharmacypayment.php');
    }
    else{
        echo "error";
    }
    }
    else{
        ?>
        <script type="text/javascript">
        alert("The patient must pay before trushed!");
        window.location.href='cheak_pharmacypayment.php';  

    </script>
        <?php
    }
}

}

?>
