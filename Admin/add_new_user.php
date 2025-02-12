<?php
  require "../db_connection.php";
  if($con) {
      $id = $_GET["id"];
      $role = ucwords($_GET["role"]);
      $fname = ucwords($_GET["fname"]);
      $lname = ucwords($_GET["lname"]);
      $gender = ucwords($_GET["gender"]);
      $department = ucwords($_GET["department"]);
      $email = ucwords($_GET["email"]);
      $mobile = ucwords($_GET["mobile"]);
      $address = ucwords($_GET["address"]);
      $username="TGU/$fname";
      $password="$lname.@123";

    $query = "SELECT * FROM $roles WHERE Id = '$id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    if($row)
      echo "User id is already exists !";
    else {
      $query = "INSERT INTO $role (Fname, Lname, Gender, Department, Email, Mobile, Address, Username, Password,Status) VALUES('$fname', '$lname', '$gender', '$department', '$email', '$mobile','$address', '$username','$password','untrushed')";
      $result = mysqli_query($con, $query);
      if(!empty($result))
  		 ?>
       <script>
        alert("You have added user seccesfuly!");
       </script>
       <?php
  		else
  			echo "Failed to add $fname!";
    }
  }
?>