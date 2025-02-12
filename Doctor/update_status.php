
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
        header('location:doctor_inpatient.php'); 
    }
    else if($status=="discharged"){
        header('location:doctor_admited.php');
        }
    else if($status=="inpatient" || $status=="outpatient"){
    header('location:doctor_patientlist.php');
    }
    else if($status=="unseen" && $role=="discharged"){
        header('location:doctor_discharged.php');

    }
    else{
        header('location:doctor_outpatient.php'); 
    }

	
}
else{
	$pay="error";
}

}
if(isset($_GET['iddddd'])){
    $idd=$_GET['iddddd'];
    $query=" UPDATE diagnosisresult SET Status='trushed' WHERE Pid='$idd'";
    $result=mysqli_query($con,$query);
    if($result){
       
            header('location:view_diagnosisresult.php'); 
    }
        else{
            echo "error";
        }

}
?>
