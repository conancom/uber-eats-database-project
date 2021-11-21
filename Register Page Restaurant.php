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
    $password = md5($_POST['password']);
    $confirmpassword = md5($_POST['confirmpassword']);
	$address = $_POST['address'];

    $query = "INSERT INTO `restaurant`(`Name`, `Location`, `PhoneNumber`, `Type`, `Opening_Times`, `Opening_Days`, `Email`,`Password`,`Address`,`Rating`) VALUES ('$name', '$location', '$phonenumber', '$type', '$openingtimes', '$openingdays', '$emailaddress', '$password', '$address','0')";
    print $query;
    $insert = $mysqli->query($query);
    if (!$insert) {
        echo $mysqli->error;
    } else {
		move_uploaded_file($_FILES["my_file"]["tmp_name"], 'restaurantimg/'.mysqli_insert_id($mysqli).'.jpg');
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
		Uber Eats
	</div>
	<div id="div_subhead">
	
	</div>

	<div id="div_content" class="form">
                <h1 style="color: white;">Setting the World in Motion</h1>
                <!--%%%%% Main block %%%%-->
                <!--Form -->
                <form name="form" method="post" enctype="multipart/form-data">

                Select Image to upload:
                        <input type="file" name="my_file" id="fileToUpload">

                <div id="div_subcontent" class="form">

                    <form name="submit-register" action="#" method="post">
                        <h2 style="width: 500px;"> Welcome to Uber</h2>

					<div class="center">
						<input name="emailaddress" type="email" placeholder="Email"><br><br>
						<input name="password" type="password" placeholder="Password"><br><br>
						<input name="confirmpassword" type="password" placeholder="Confirm Password"><br><br>
						<input name="type" type="type" placeholder="Type"><br><br>
						<input name="name" type="restaurant name" placeholder="Restaurant Name"><br><br> 
						<input name="openingdays" type="opening days" placeholder="Opening Days"><br><br>
						<input name="openingtimes" type="opening times" placeholder="Opening Times"><br><br>
						<input name="phonenumber" type="phone number" placeholder="Phone Number"><br><br>
						<input name="address" type="main address" placeholder="Main Address">

						<label> </label>
						<input type="radio" name="gpslocation" value="gps location" unchecked>GPS Location<br><br>
						
			
					</div>
				</div>

				<div id="div_subcontent" style="background-color: transparent;">
					<div class="center">
						<input type="submit" value="Submit" name="submit-register" class="Submit" style="cursor: pointer"><br><br>
						<label>Terms and Agreement</label>
					</div>
				</div>
			</form>

		</div> <!-- end div_content -->
	</div> <!-- end div_main -->
	
	<div id="div_footer">  
		<br>
	</div>
	
</div>
</body>
</html>