<?php

session_start();
header('location:admin.php');


$con = mysqli_connect('localhost','root','Ry290250091!');

mysqli_select_db($con, 'userRegistration');

$class = $_POST['class'];
$cost = $_POST['cost'];
$id = mt_rand(1000, 9999);

$s = " select * from classTable where className = '$class'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
	echo" Class has already been created ";
}else{
	$reg = " insert into classTable(classID, className, cost) values ($id, '$class', $cost)";
	mysqli_query($con, $reg);
	echo "Registration Successful";
}

?>