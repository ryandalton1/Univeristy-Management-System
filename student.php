<?php

session_start();
if(!isset($_SESSION['username'])){
	header('location:login.php');
}
$servername = "localhost";
$username = "root";
$password = "Ry290250091!";
$dbname = "userRegistration";

$con = new mysqli($servername, $username, $password, $dbname);
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT * FROM classTable";
$result = $con->query($sql);
?>

<html>
<head>
	<title> Home Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
	<div class = "container">

	<a class="float-right" href="logout.php"> LOGOUT </a>
	
	<h1> Welcome to the student page <?php echo $_SESSION['username']; ?>. </h1>
	
	<div class="row">
		<div class="col-md-6 login-left">
			<?php
			if ($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()) {
				echo "Class ID: " . $row["classID"]. " - Class Name: " . $row["className"]."<br>";
			  }
			} else {
			  echo "0 results";
			}
			?>
		</div>
	
		<div class="col-md-6 login-right">
			<h2> Apply for class </h2>
			<form action="addClass.php" method="post">
				<div class="form-group">
					<label>Class ID</label>
					<input type="number" name="classID" class="form-control" required>
				</div>
					<button type="submit" class="btn btn-primary"> Apply </button>
				</form>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6 login-left">
			<h1> Message System </h1>
			<!-- <h2> Things to be implemented. Basic form with userID (must display teacher id by classes above). and a message box. then somehow get that sent to other user</h2>-->
		</div>
	
		<div class="col-md-6 login-right">
			<h2> Your current classes </h2>
			<?php
			$studentID = $_SESSION['userID'];
			$classes = array();
			
			$sql = "SELECT classID FROM rosterTable WHERE personID = '$studentID'";
			$result = $con->query($sql);
			while($row = $result->fetch_assoc()){
				array_push($classes, $row["classID"]);
			}
			//$classes is array filled with classID of the one's our current student is in. select from classTable all className's of the classID's and display them
			foreach ($classes as &$i){
				$sql = "SELECT className FROM classTable WHERE classID = '$i'";
				$result = $con->query($sql);
				$row = $result->fetch_assoc();
				echo $row["className"];
			}
			?>
			
			<h2> Current Bill </h2>
			<?php
			$sql = "SELECT balance FROM userTable WHERE userID = '$studentID'";
			$result = $con->query($sql);
			$row = $result->fetch_assoc();
			echo $row["balance"];
			?>
			<input type="button" onclick="location.href='payBalance.php'" value="Pay Balance" />
		</div>
	</div>
	
	</div>
</body>
</html>