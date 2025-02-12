<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
   

    <title>Dashboard - Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script src="bootstrap/js/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="images/icon.svg" type="image/x-icon">
    <script src="https://kit.fontawesome.com/c5cdba9a5c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/home.css">
   
    <script src="js/restrict.js"></script>
  </head>
  <body>

    <?php include "sections/nurse_sidnav.html"; 
    $iddd=0;
    if(isset($_GET['iddd'])){
      $iddd=$_GET['iddd'];
    }
    echo $iddd;
    ?>
   


    <div class="container-fluid">
      <div class="container">
        <!-- header section -->
        <?php
          require "php/header.php";
          createHeader('home', 'Dashboard', 'Home');
        ?>
        <!-- header section end -->

        <!-- form content -->
        <div class="row">


<hr style="border-top: 2px solid #ff5252;">
        

       
    
 <hr style="border-top: 2px solid #ff5252;">

      
        <!-- form content end -->

           <?php
           
   // include 'add_user.php';
    ?>
      </div>

      

<div class="main_container">

<h3>Patient List Needs Bed Allocation</h3>

<div class="table_body">
<table>
    <thead>
    <tr>
        <th>User Id</th>
        <th>Fist Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>Id</th>
        <th>Birthdate</th>
        <th>Age</th>
        <th>Address</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Sex</th>
        <th>Blood group</th>
        <th>Blood pressure</th>
        <th>Weight</th>
        <th>Tempreture</th>
        <th>Height</th>
        <th>Action</th>
    </tr>
</thead>




<tbody>
<?php
include ('php/db_connection.php');
  $status="inpatient";
  $seq_no=0;
  $id=0;
	$sql="SELECT * FROM patient WHERE Status='$status'";
	$result=mysqli_query($con,$sql);
	while( $row=mysqli_fetch_assoc($result)){
    $seq_no++;
    $id=$row['Id'];
    ?>
    <tr>
    <td><?php echo $seq_no; ?></td>
      <td><?php echo $row['Fname']; ?></td>
      <td><?php echo $row['Mname']; ?></td>
      <td><?php echo $row['Lname']; ?></td>
      <td><?php echo $row['Id']; ?></td>
      <td><?php echo $row['Birthdate']; ?></td>
      <td><?php echo $row['Age']; ?></td>
      <td><?php echo $row['Mobile']; ?></td>
      <td><?php echo $row['Email']; ?></td>
      <td><?php echo $row['Address']; ?></td>
      <td><?php echo $row['Sex']; ?></td>
      <td><?php echo $row['Bgroup']; ?></td>
      <td><?php echo $row['Bpresure']; ?></td>
      <td><?php echo $row['Weight']; ?></td>
      <td><?php echo $row['Temprature']; ?></td>
      <td><?php echo $row['Height']; ?></td>
      <td class="action_td">
        <?php if(isset($iddd) && $iddd!=0){

         ?>
            <a href="#" id="Treatment_bnt"> <span class="editbtn">View</span> </a>
            <?php 
            }
            else{
            ?>
            <a href="Treatment_bnt?iddd=<?php echo $row['Id']; ?>" id="Treatment_bnt"> <span class="editbtn">View</span> </a>

            <?php 
            }
            ?>
            <a href="#"> <span class="removedbtn" id="Allocate">Allocate</span> </a>
        </td>
    </tr>
<?php
  }

  ?>

</tbody>
</table>

</div>
</div>



<div class="inpatientBox" id="inpatientBox2">

<i  id="inpatientttt_close"  class="fa-solid fa-xmark"></i>
<div class="inpatient_msg">
    <h3>Bed Allocation</h3>
</div>
<div class="medical_history">
        <h4 class="reason_forAdmission_msg"> Room Assignment</h4>
    </div>
  <form method="POST">
    <div class="insurence_provider">

        <label for="ward">Ward/Unit:</label>
        <select id="ward" name="ward">
            <option value="general">General Ward</option>
            <option value="icu">ICU</option>
            <option value="surgery">Surgery</option>
        </select>
        
          </div>


          <div class="insurence_provider">
        
            <label for="ward2">Room Number:</label>
            <select id="ward2" name="rnumber">
                <option value="104">104</option>
                <option value="202">202</option>
                <option value="23">23</option>
                <option value="104">104</option>
                <option value="202">202</option>
                <option value="23">23</option>
            </select>
            
              </div>


              <div class="insurence_provider">
        
                <label for="ward3">Bed Number:</label>
                <select id="ward3" name="bnumber">
                    <option value="104">104</option>
                    <option value="202">202</option>
                    <option value="23">23</option>
                    <option value="104">104</option>
                    <option value="202">202</option>
                    <option value="23">23</option>
                </select>
                
                  </div>
                  <div class="insurence_provider1">
                    <label for="admission-date">Admission Date and Time:</label>
                    <input type="datetime-local" id="admission-date" name="date" required>
                 </div>

                 <hr class="line_submit">

                 <div class="submit_box">
                    <input name="cancel" type="reset" id="submit_btnCancel" value="Cancel">
                    <input name="submited" type="submit" id="submit_btnSabmit" value="Submit">
                </div>
                </form>
    </div>

 
<?php
if(isset($_POST['submited'])){
$rnumber=$_POST['rnumber'];
$bnumber=$_POST['bnumber'];
$ward=$_POST['ward'];
$date=$_POST['date'];
$sql="UPDATE  admited SET Date='$date', Ward='$ward',Roomnumber='$rnumber',Bednumber='$bnumber' WHERE Id='$idd'";
$result=mysqli_query($con,$sql);
if($result){
  
$status="admited";
$sql="UPDATE  patient SET Status='$status' WHERE Id='$iddd'";
$res=mysqli_query($con,$sql);
if($res){
  ?>
	<script type="text/javascript">
	alert("You have allocated bed succesfully!");
    window.location.href='nurse_treatment.php';
	</script>
	<?php
}
else{
  echo "error";
}


}
else{
  echo "error";
}

}





if(isset($iddd) && $iddd!=0){
echo $iddd;
$sql="SELECT * FROM admited WHERE Id=$iddd";
    $result=mysqli_query($con,$sql);
	while( $row=mysqli_fetch_assoc($result)){
    $resoan=$row['Resoan'];
    $tplan=$row['Tplan'];
    $mhistory=$row['Mhistory'];
    $lstyle=$row['Lstyle'];

?>
<div class="inpatientBox" id="inpatientBox"> 

<i  id="inpatient_close"  class="fa-solid fa-xmark"></i>


<div class="inpatient_msg">
    <h3>Inpatient Information</h3>
</div>

<div class="reason_forAdmission">
    <h4 class="reason_forAdmission_msg">Resoan For Admission</h4>
</div>

<textarea name=""  id="reason_description" disabled ><?php echo $resoan; ?>

</textarea>


<div class="medical_history">
    <h4 class="reason_forAdmission_msg">Medical History</h4>
</div>

<textarea name=""  id="MedicalHistory_description" disabled ><?php echo $mhistory; ?>

</textarea>

<div class="medical_history">
    <h4 class="reason_forAdmission_msg">Life style & Social History</h4>
</div>

<textarea name=""  id="MedicalHistory_description"  disabled ><?php echo $lstyle; ?>

</textarea>


<div class="medical_history">
    <h4 class="reason_forAdmission_msg" disabled >Treatment Plan</h4>
</div>

<textarea name=""  id="MedicalHistory_description" disabled><?php echo $tplan; ?>

</textarea>
      

</div>
<?php
  }
}
?>
 
  
   
</div>
</div>



<script src="script.js"></script>
  </body>

</html>
