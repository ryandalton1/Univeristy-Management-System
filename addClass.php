<?php

session_start();


$con = mysqli_connect('localhost','root','Ry290250091!');

mysqli_select_db($con, 'userRegistration');

$personID = $_SESSION['userID'];
$classID = $_POST['classID'];
$role = $_SESSION['role'];

$reg = " insert into rosterTable(personID, classID, role) values ($personID, $classID, '$role')";
mysqli_query($con, $reg);
echo "Registration Successful";



$sql = "SELECT cost FROM classTable WHERE classID = '$classID'";
$result = $con->query($sql);
$row = $result->fetch_assoc();
$increase = $row["cost"];


$sql = "UPDATE userTable SET balance=balance+$increase WHERE userID='$personID'";
if ($con->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}



header('location:student.php');
?>