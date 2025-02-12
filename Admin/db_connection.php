<?php
$host="localhost";
$user="root";
$passowerd="";
$database="hospital_managment";
$conn=mysqli_connect($host,$user,$passowerd,$database);
if(!$conn){
	echo "You havn't connected !";
}
?>