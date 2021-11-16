<?php
session_start();
/*Leon's Database*/
$mysqli = new mysqli("localhost", "root", 'Wirz140328', "uber");

/*Junior's Database
$mysqli = new mysqli("localhost", "root", '', "uber");*/


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
    $occupation = $_POST['occupation'];
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

    $query = "INSERT INTO `client`(`Password`, `Email`, `Gender`, `DateOfBirth`, `FName`, `LName`, `Address`,`Occupation`,`PhoneNumber`) VALUES ('$password', '$emailaddress', '$gender', '$dateofbirth', '$name', '$surname', '$address', '$occupation','$phonenumber')";
    //$query2 = "SELECT LAST_INSERT_ID();";
    //print $query;

    $insert = $mysqli->query($query);
    
    if (!$insert) {
        echo $mysqli->error;
    } else {
            move_uploaded_file($_FILES["my_file"]["tmp_name"], 'img/'.mysqli_insert_id($mysqli).'.jpg');
            header("Location: Login-Page-Client.php");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>CSS326 Sample</title>
    <link rel="stylesheet" href="Register Page Client.css">
</head>


<body>
    <div id="wrapper">
        <div id="div_header">
            Header
        </div>
        <div id="div_subhead">

        </div>

        <div id="div_content" ">

            <h1>Setting the World in Motion</h1>
            <!--%%%%% Main block %%%%-->
            <!--Form -->
            <div id=" div_subcontent" class="form">

            <form name="form" method="post" enctype="multipart/form-data">

                Select Image to upload:
                <input type="file" name="my_file" />

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

                    <input name="occupation" type="occupation" value="Occupation"><br><br>
                    <input name="phonenumber" type="phone number" value="Phone Number"><br><br>
                    <input name="address" type="main address" value="Main Address">

                    <label> </label>
                    <input type="radio" name="gpslocation" value="gps location" unchecked>GPS Location<br><br>

                    <input name="day" type="birth date" value="Birth Date">
                    <input name="month" type="birth month" value="Birth Month">
                    <input name="year" type="birth year" value="Birth Year"><br><br>

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