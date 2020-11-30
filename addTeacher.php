<?php

session_start();


$con = mysqli_connect('localhost','root','Ry290250091!');

mysqli_select_db($con, 'userRegistration');

$personID = $_POST['userID'];
$classID = $_POST['classID'];

//here make variable that contains personID's role. then add that role when inserting to rosterTable
$s = " select * from userTable where userID = '$personID'";
$result = mysqli_query($con, $s);
$row = $result->fetch_row();
$role = $row[2];

$reg = " insert into rosterTable(personID, classID, role) values ($personID, $classID, '$role')";
mysqli_query($con, $reg);
echo "Registration Successful";

header('location:admin.php');
?>