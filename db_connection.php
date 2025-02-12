<?php
$host="localhost";
$user="root";
$passowerd="";
$database="hospital_managment";
$con=mysqli_connect($host,$user,$passowerd,$database);
if(!$con){
	echo "You havn't connected !";
}
?>