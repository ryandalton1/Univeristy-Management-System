<?php

session_start();
header('location:admin.php');


$con = mysqli_connect('localhost','root','Ry290250091!');

mysqli_select_db($con, 'userRegistration');

$name = $_POST['user'];
$pass = $_POST['password'];
$role = $_POST['role'];

$id = mt_rand(10000000, 99999999);
$s = " select * from userTable where userID = '$id'";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

while($num == 1){
	$id = mt_rand(10000000, 99999999);

	$s = " select * from userTable where userID = '$id'";
	$result = mysqli_query($con, $s);
	$num = mysqli_num_rows($result);
}

$s = " select * from userTable where name = '$name'";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);
if($num == 1){
	echo" Username Already Taken";
}else{
	$reg = " insert into userTable(name, password, role, userID, balance) values ('$name', '$pass', '$role', $id, 0)";
	mysqli_query($con, $reg);
	echo "Registration Successful";
}

?>