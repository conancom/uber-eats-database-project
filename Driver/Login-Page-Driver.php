<?php
session_start();
$mysqli = new mysqli("localhost", "root", 'Wirz140328', "uber");


if ($mysqli->connect_errno) {
	echo $mysqli->connect_error;
}

if (isset($_POST["submit-login"])) {
	$emailaddress = $_POST['emailaddress'];
	$password = $_POST['password'];
	$query = "SELECT * FROM `driver` WHERE `Email` = '$emailaddress' AND `Password` = '$password'";
	// print($query); 
	$result = $mysqli->query($query);
	if (!$result) {
		echo $mysqli->error;
	} else {
		if (mysqli_num_rows($result) > 0) {
			$data = $result->fetch_array();
			$_SESSION['id-driver'] = $data['DriverID'];
			header("Location: Driver-Main.php");
		}
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>CSS326 Sample</title>
	<link rel="stylesheet" href="Login Page Driver.css">
</head>


<body>
	<div id="wrapper">
		<div id="div_header">
			Header
		</div>
		<div id="div_subhead">

		</div>

		<div id="div_content" class="form">
			<!--%%%%% Main block %%%%-->
			<!--Form -->
			<div id="div_subcontent" class="form">

				<form name="submit-login" action="#" method="post"><br><br><br><br><br>

					<div class="center">
						<input name="emailaddress" type="email" value="Email"><br><br>
						<input name="password" type="password" value="Password"><br><br><br><br><br>

					</div>
					<div class="center"><br><br><br>
						<input id="button1" type="submit" value="Login" name="submit-login"><br><br>
						<label id="text">Don't have an account?</label><br><br>
						<button id="button2" type="submit" value="submit">Register</button>
					</div>
				</form>
			</div>



		</div> <!-- end div_content -->
	</div> <!-- end div_main -->

	<div id="div_footer">
		Footer
	</div>

	</div>
</body>

</html>