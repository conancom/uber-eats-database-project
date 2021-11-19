<?php
session_start();
$mysqli = new mysqli("localhost", "root", '', "uber");


if ($mysqli->connect_errno) {
	echo $mysqli->connect_error;
}

if (isset($_POST["submit-login"])) {
	$emailaddress = $_POST['emailaddress'];
	$password = $_POST['password'];
	$query = "SELECT * FROM `restaurant` WHERE `Email` = '$emailaddress' AND `Password` = '$password'";
	// print($query); 
	$result = $mysqli->query($query);
	if (!$result) {
		echo $mysqli->error;
	} else {
		if (mysqli_num_rows($result) > 0) {
			$data = $result->fetch_array();
			$_SESSION['id-restaurant'] = $data['RestaurantID'];
			header("Location: Restaurant-Main.php");
		}
	}
}
?>

<!DOCTYPE html>
<html>


<head>
	<title>CSS326 Sample</title>
	<link rel="stylesheet" href="Login Page Restaurant.css">
	<!-- <link rel="stylesheet" href="Edit-Acc-Client-Styling.css"> -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>

<body>

	<div id="wrapper">
		<div id="div_header">
			Uber Eats
		</div>
		<div id="div_subhead">

		</div>

		<div id="div_content" class="form">
			<!--%%%%% Main block %%%%-->
			<!--Form -->
			
			<div id="div_subcontent" class="form">
				<form name="submit-login" action="#" method="post"><br><br><br><br><br>
					<div class="center">
						<input name="emailaddress" type="email" placeholder="Email" class="EmailText"><br><br>
						<input name="password" type="password" placeholder="Password" class="PasswordText"><br><br><br><br><br>
					</div>

					<div class="center"><br><br><br>
						<input id="button1" type="submit" value="Login" name="submit-login" class="LoginButton"><br><br>
						<label id="text">Don't have an account?</label><br><br>
						<button id="button2" type="submit" value="submit" class="RegisterButton">Register</button>
					</div>
				</form>
			</div>

		</div> <!-- end div_content -->
	</div> <!-- end div_main -->

	<div id="div_footer">
		<br>
	</div>

	</div>
</body>

</html>