
<?php
include('../db_connection.php');

if(isset($_GET['id'])){
$role="";
$idd=$_GET['id'];
if(isset($_GET['role'])){
$role=$_GET['role'];
}
$status=$_GET['status'];
$query=" UPDATE patients SET Status='$status' WHERE Id='$idd'";
$result=mysqli_query($con,$query);
if($result){
    if($status=="admited"){
        header('location:nurse_inpatient.php'); 
    }
    else if($status=="discharged"){
        header('location:nurse_admited.php');
        }
    else if($status=="unseen" && $role=="discharged"){
        header('location:nurse_discharged.php');

    }
    else{
        header('location:nurse_outpatient.php'); 
    }

	
}
else{
	$pay="error";
}

}
if(isset($_GET['day'])){
    $day=$_GET['day'];
    $price=$_GET['price'];
    $payment=$_GET['payment'];
    $idd=$_GET['idd'];
    $day++;
    $unpayed=$price;
if($payment=="payed"){
$sql="UPDATE indoorpayments SET Day='$day', Unpayed='$unpayed', Payment='unpayed' WHERE Pid='$idd'";
$result=mysqli_query($con,$sql);
if($result){
    header('location:check_indoorpayment.php'); 
}
}
else{
    ?>
    <script type="text/javascript">
        alert("The patient have previous payment. He must pay the prevous before add another!");
        window.location.href='check_indoorpayment.php';  
    </script>
    <?php
}
}
if(isset($_GET['iddd'])){
  $idd=$_GET['iddd'];
  $payments=$_GET['payment'];
  if($payments=="payed"){
  $sql="UPDATE indoorpayments SET Status='trushed' WHERE Pid='$idd'";
$result=mysqli_query($con,$sql);
if($result){
    header('location:check_indoorpayment.php'); 
}
  }
  else{
        ?>
        <script type="text/javascript">
        alert("The patient must pay before delate it!");
        window.location.href='check_indoorpayment.php';  

    </script>
    <?php
  }
}
?>
