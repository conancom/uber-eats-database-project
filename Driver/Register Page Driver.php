<?php
session_start();
$mysqli = new mysqli("localhost", "root", 'Wirz140328', "uber");


if ($mysqli->connect_errno) {
    echo $mysqli->connect_error;
}

if (isset($_POST["submit-register"])) {
    $emailaddress = $_POST['emailaddress'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $gender = $_POST['gender'];
    $name =  $_POST['name'];
    $surname = $_POST['surname'];
    $driverlicenseid = $_POST['driverlicenseid'];
    $phonenumber = $_POST['phonenumber'];
    $address = $_POST['address'];
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];

    if (strlen($month) == 1) {
        $dateofbirth = "$year-0$month-$day";
    } else {
        $dateofbirth = "$year-$month-$day";
    }

    $query = "INSERT INTO `driver`(`Password`, `Email`, `Gender`, `DateOfBirth`, `FName`, `LName`, `Address`,`DriverLicenseID`,`PhoneNumber`) VALUES ('$password', '$emailaddress', '$gender', '$dateofbirth', '$name', '$surname', '$address', '$driverlicenseid','$phonenumber')";
    print $query;
    $insert = $mysqli->query($query);
    if (!$insert) {
        echo $mysqli->error;
    } else {
        $query2 = "SELECT * FROM `driver` WHERE `Email` = '$emailaddress' AND `Password` = '$password'";
        print $query2;
        $select = $mysqli->query($query2);
        if (!$select) {
            echo $mysqli->error;
        } else {
            $data = $select->fetch_array();
            move_uploaded_file($_FILES["my_file"]["tmp_name"], 'img/'.$data['DriverID'].'.jpg');
            $_SESSION['id-driver'] =  $data['DriverID'];
            header("Location: Register-Vehicle-Page.php");
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>CSS326 Sample</title>
    <link rel="stylesheet" href="Register Page Driver.css">
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
                <form name="form" method="post" enctype="multipart/form-data">

                    <form name="submit-register" action="#" method="post">

                        Select Image to upload:
                        <input type="file" name="my_file" id="fileToUpload">

                        <h2>Welcome to Uber!</h2>

                        <div class="center">
                            <input name="emailaddress" type="email" value="Email"><br><br>
                            <input name="password" type="password" value="Password"><br><br>
                            <input name="confirmpassword" type="confirm password" value="Confirm Password"><br><br>
                            <input name="name" type="first name" value="First Name"><br><br>
                            <input name="surname" type="last name" value="Last name"><br><br>
                            <input name="address" type="address" value="Address"><br><br>

                            <label>Gender</label>
                            <input type="radio" name="gender" value="male" checked>Male
                            <input type="radio" name="gender" value="female">Female
                            <input type="radio" name="gender" value="others">Others<br><br>

                            <input name="phonenumber" type="phone number" value="Phone Number"><br><br>
                            <input name="driverlicenseid" type="driver license id" value="Driver License ID"><br><br>
                            <input name="day" type="birth date" value="Birth Date">
                            <input name="month" type="birth month" value="Birth Month">
                            <input name="year" type="birth year" value="Birth Year"><br><br><br>

                        </div>
                    
                </div>

                <div class="center">
                    <input type="submit" value="Submit" name="submit-register" class="Submit"><br><br>
                    <label>Terms and Agreement</label>
                </div>
                </form>

        </div>
        <!-- end div_content -->
    </div>
    <!-- end div_main -->

    <div id="div_footer">
        Footer
    </div>

    </div>
</body>

</html>