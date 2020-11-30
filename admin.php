<?php

session_start();
if(!isset($_SESSION['username'])){
	header('location:login.php');
}

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
	
	<h1> Welcome to the admin page <?php echo $_SESSION['username']; ?>. </h1>
	
	<div class="row">
		<div class="col-md-6 login-left">
			<h2> Create class </h2>
			<form action="classValidation.php" method="post">
				<div class="form-group">
					<label>Class Name</label>
					<input type="text" name="class" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Price (only numbers eg 1000)</label>
					<input type="int" name="cost" class="form-control" required>
				</div>
				<button type="submit" class="btn btn-primary"> Submit </button>
			</form>
		</div>
		
		<div class="col-md-6 login-right">
			<h2> Add teacher to class </h2>
			<form action="addTeacher.php" method="post">
				<div class="form-group">
					<label>Teacher ID</label>
					<input type="number" name="userID" class="form-control" min="10000000" max="99999999" required>
				</div>
				<div class="form-group">
					<label>Class ID</label>
					<input type="number" name="classID" class="form-control" min="1000" max="9999" required>
				</div>
					<button type="submit" class="btn btn-primary"> Add Teacher </button>
				</form>
		</div>
		
		<div class="col-md-6 login-left">
			<h2> Add User to Database </h2>
			<form action="registration.php" method="post">
				<div class="form-group">
					<label>User Name</label>
					<input type="text" name="user" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Role (admin, faculty, student)</label>
					<input type="text" name="role" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="int" name="password" class="form-control" required>
				</div>
				<button type="submit" class="btn btn-primary"> Submit </button>
			</form>
		</div>
	</div>
	
	</div>
</body>
</html>