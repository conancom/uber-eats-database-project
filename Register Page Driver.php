<?php
session_start();
/*Leon's Database
$mysqli = new mysqli("localhost", "root", 'Wirz140328', "uber");
*/
/*Junior's Database*/
$mysqli = new mysqli("localhost", "root", '', "uber");

if ($mysqli->connect_errno) {
    echo $mysqli->connect_error;
}

if (isset($_POST["submit-register"])) {
    $emailaddress = $_POST['emailaddress'];
    $password = md5($_POST['password']);
    $confirmpassword = md5($_POST['confirmpassword']);
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
    //print $query;
    $insert = $mysqli->query($query);
    if (!$insert) {
        echo $mysqli->error;
    } else {
        $id = mysqli_insert_id($mysqli);

        move_uploaded_file($_FILES["my_file"]["tmp_name"], 'driverimg/' . $id . '.jpg');

        
        $_SESSION['id-driver'] = $id;
        header("Location: Register-Vehicle-Page.php");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>CSS326 Sample</title>
    <link rel="stylesheet" href="Register Page Driver.css">
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
            <h1>Setting the World in Motion</h1>
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
                            <input name="name" type="first name" placeholder="First Name"><br><br>
                            <input name="surname" type="last name" placeholder="Last name"><br><br>
                            <input name="address" type="address" placeholder="Address"><br><br>

                            <label style="color: white;">Gender</label>
                            <input type="radio" name="gender" value="male" checked>Male
                            <input type="radio" name="gender" value="female">Female
                            <input type="radio" name="gender" value="others">Others<br><br>

                            <input name="phonenumber" type="phone number" placeholder="Phone Number"><br><br>
                            <input name="driverlicenseid" type="driver license id" placeholder="Driver License ID"><br><br>

                            <input name="day" type="birth date" placeholder="Birth Date">
                            <input name="month" type="birth month" placeholder="Birth Month">
                            <input name="year" type="birth year" placeholder="Birth Year"><br><br><br>
                        </div>

                </div>

                <div id="div_subcontent" style="background-color: transparent;">
                    <div class="center">
                        <input type="submit" value="Submit" name="submit-register" class="Submit" style="cursor: pointer;"><br><br>
                        <label>Terms and Agreement</label>
                    </div>
                </div>
            </form>

        </div>
        <!-- end div_content -->
    </div>
    <!-- end div_main -->

    <div id="div_footer">
        <br>
    </div>

    </div>
</body>

</html>