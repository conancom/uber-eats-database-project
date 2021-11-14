<?php
session_start();
$mysqli = new mysqli("127.0.0.1", "root", 'Wirz140328', "uber");


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
    $rating = $_POST['rating'];
    $address = $_POST['address'];
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];

    if (strlen($month) == 1) {
        $dateofbirth = "$year-0$month-$day";
    } else {
        $dateofbirth = "$year-$month-$day";
    }

    $query = "INSERT INTO `driver`(`Password`, `Email`, `Gender`, `DateOfBirth`, `FName`, `LName`, `Address`,`DriverLicenseID`,`PhoneNumber`,`Rating`) VALUES ('$password', '$emailaddress', '$gender', '$dateofbirth', '$name', '$surname', '$address', '$driverlicenseid','$phonenumber','0')";
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
            $data = $result->fetch_array();
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
            <div id="div_subcontent" class="form">

                <form name="submit-register" action="#" method="post">
                    <h2>Welcome to Uber!</h2>

                    <div class="center">
                        <input name="emailaddress" type="email" value="Email"><br><br>
                        <input name="password" type="password" value="Password"><br><br>
                        <input name="confirmpassword" type="confirm password" value="Confirm Password"><br><br>
                        <input name="name" type="first name" value="First Name"><br><br>
                        <input name="surname" type="last name" value="Last name"><br><br>

                        <label>Gender</label>
                        <input type="radio" name="gender" value="male" checked>Male
                        <input type="radio" name="gender" value="female">Female
                        <input type="radio" name="gender" value="others">Others<br><br>

                        <input name="phonemunber" type="phone number" value="Phone Number"><br><br>
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