<?php
session_start();
$mysqli = new mysqli("localhost", "root", '', "uber");


if ($mysqli->connect_errno) {
    echo $mysqli->connect_error;
}

if (isset($_POST["submit-register"])) {
    $name =  $_POST['name'];
    $location = $_POST['location'];
    $phonenumber = $_POST['phonenumber'];
	$type = $_POST['type'];
	$openingtimes = $_POST['openingtimes'];
	$openingdays = $_POST['openingdays'];
	$emailaddress = $_POST['emailaddress'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    $query = "INSERT INTO `restaurant`(`Name`, `Location`, `PhoneNumber`, `Type`, `Opening_Times`, `Opening_Days`, `Email`,`Password`,`Rating`) VALUES ('$name', '$location', '$phonenumber', '$type', '$openingtimes', '$openingdays', '$emailaddress', '$password','0')";
    print $query;
    $insert = $mysqli->query($query);
    if (!$insert) {
        echo $mysqli->error;
    } else {
        header("Location: Login-Page-Restaurant.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>CSS326 Sample</title>
<link rel="stylesheet" href="Register Page Restaurant.css">
</head>


<body>
<div id="wrapper"> 
	<div id="div_header">
		Header
	</div>
	<div id="div_subhead">
	
	</div>

		<div id="div_content" class="form">
            <h1>Setting the World in Motion</h1>
			<!--%%%%% Main block %%%%-->
			<!--Form -->
			<div id="div_subcontent" class="form">

            <form name="submit-register" action="#" method="post">

				Select Image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">

				<h2>Welcome to Uber!</h2>

				<div class="center">
                    <input name="emailaddress" type="email" value="Email"><br><br>
                    <input name="password" type="password" value="Password"><br><br>
                    <input name="confirmpassword" type="confirm password" value="Confirm Password"><br><br>
					<input name="location" type="location" value="Location"><br><br>
					<input name="type" type="type" value="Type"><br><br>
                    <input name="name" type="restaurant name" value="Restaurant Name"><br><br> 
                    <input name="openingdays" type="opening days" value="Opening Days"><br><br>
                    <input name="openingtimes" type="opening times" value="Opening Times"><br><br>
                    <input name="phonenumber" type="phone number" value="Phone Number"><br><br>

                    <input type="main address" value="Main Address">

                    <label> </label>
				        <input type="radio" name="" value="gps location" checked>GPS Location<br><br>

                    <input type="restaurant type" value="Restaurant Type"><br><br><br>
                    
		
				</div>
			</div>

			<div class="center">
				<input type="submit" value="Submit" name="submit-register" class="Submit"><br><br>
				<label>Terms and Agreement</label>
			</div>
			</form>

		</div> <!-- end div_content -->
	</div> <!-- end div_main -->
	
	<div id="div_footer">  
		Footer
	</div>
	
</div>
</body>
</html>