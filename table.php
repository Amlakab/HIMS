<?php
 include 'db_connection.php';
 $sql="CREATE TABLE employeers( 

Fname varchar(200),
Lname varchar(200),
Department varchar(200),
Gender varchar(200),
Email varchar(200),
Mobile varchar(200),
Address text,
Username varchar(200),
Password varchar(200),
Status varchar(200),
Image text
)";
 $result=mysqli_query($con,$sql);
 if($result){
 	echo "table is created succsesfully!";
 }
 else{
 	echo "Error!";
 }
 mysqli_close($con);
?>
