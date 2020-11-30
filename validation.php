<?php

session_start();


$con = mysqli_connect('localhost','root','Ry290250091!');

mysqli_select_db($con, 'userRegistration');

$name = $_POST['user'];
$pass = $_POST['password'];

$s = " select * from userTable where name = '$name' && password = '$pass'";

$result = mysqli_query($con, $s);
$row = $result->fetch_row();

$num = mysqli_num_rows($result);

if($num == 1){
	$_SESSION['username'] = $name;
	$_SESSION['userID'] = $row[3];
	$_SESSION['role'] = $row[2];
	if(strcmp($_SESSION['role'], 'admin') == 0){
		header('location:admin.php');
	}
	else if(strcmp($_SESSION['role'], 'faculty') == 0){
		header('location:faculty.php');
	}
	else if(strcmp($_SESSION['role'], 'student') == 0){
		header('location:student.php');
	}
}else{
	header('location:login.php');
}

?>