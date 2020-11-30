<?php
session_start();
$con = mysqli_connect('localhost','root','Ry290250091!');
mysqli_select_db($con, 'userRegistration');

$studentID = $_SESSION['userID'];
$sql = "UPDATE userTable SET balance=0 WHERE userID='$studentID'";
$result = $con->query($sql);

$con->close();

header('location:student.php');
?>