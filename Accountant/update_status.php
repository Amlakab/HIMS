
<?php
include('../db_connection.php');

$fname="";
$mname="";
$lname="";
$type="";    
$role="";
$idddd="";
$day=0;
$price=0;
$payed=0;
$unpayed=0;
$payemnt="payment"; 
if(isset($_GET['id'])){
$idd=$_GET['id'];
if(isset($_GET['role'])){
$role=$_GET['role'];
}
if(isset($_GET['payment'])){
    $payment=$_GET['payment'];
    }
if(isset($_GET['day'])){
    $iddd=$_GET['idddd'];
    $fname=$_GET['fname'];
    $mname=$_GET['mname'];
    $lname=$_GET['lname'];
    $price=$_GET['price'];
    $type=$_GET['type'];
    $payed=$_GET['payed'];
    $unpayed=$_GET['unpayed'];
         }
if($role=="pharmacy"){
    if($payment=="unpayed"){
$query=" UPDATE pharmacypayments SET Payment='payed' WHERE Pid='$idd'";
$result=mysqli_query($con,$query);
if($result){
    header('location:pharmacy_payment.php');
}
else{
    echo "error";
}
    }
    else{
        ?>
        <script type="text/javascript">
        alert("The payment is already payed!");
        window.location.href='pharmacy_payment.php';  

    </script>
        <?php  
    }
}
else if($role=="labratory"){
    if($payment=="unpayed"){
    $query=" UPDATE labpayments SET Payment='payed' WHERE Pid='$idd'";
    $result=mysqli_query($con,$query);
    if($result){
        header('location:labratory_payment.php');
    }
    else{
        echo "error";
    }
    }
    else{
        ?>
        <script type="text/javascript">
        alert("The payment is already payed!");
        window.location.href='labratory_payment.php';  

    </script>
        <?php
    }
}
else{
    if($payment=="unpayed"){
        $payed=$payed + $unpayed;
        $unpayed=0;
        $query=" UPDATE indoorpayments SET Payed='$payed', Unpayed='$unpayed', Payment='payed' WHERE Pid='$idd'";
        $result=mysqli_query($con,$query);
        if($result){
            $date = date("Y-m-d H:i:s");
            $sql="INSERT INTO indoorpayed (Id,Fname,Mname,Lname,Date,Day,Intype,Price,Total,Payment) VALUES ('$idddd','$fname','$mname','$lname','$date','1','$type','$price','$price','payed')";
            $result=mysqli_query($con,$sql);
            if($result){
                header('location:indoor_payment.php');
            }
        }
        else{
            echo "error";
        }
        }
        else{
            ?>
            <script type="text/javascript">
            alert("The payment is already payed!");
            window.location.href='indoor_payment.php';  
    
            </script>
            <?php
        }  
}

}
if(isset($_GET['tid'])){
    $tid=$_GET['tid'];
    $status=$_GET['status'];
    $role=$_GET['role'];
    $query="";
    if($role=="labratory"){
    $query=" UPDATE labpayments SET Status='$status' WHERE Pid='$tid'";
    }
    if($role=="pharmacy"){
        $query=" UPDATE pharmacypayments SET Status='$status' WHERE Pid='$tid'";
        }
        if($role=="indoor"){
            $query=" UPDATE indoorpayments SET Status='$status' WHERE Pid='$tid'";
            }
            $result=mysqli_query($con,$query);
            if($result){
                header('location:trushed_payment.php');
            }
            else{
                echo "error";
            }  
    }

?>
