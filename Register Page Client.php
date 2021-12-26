<?php
session_start();

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

    $query = "INSERT INTO `client`(`Password`, `Email`, `Gender`, `DateOfBirth`, `FName`, `LName`, `Address`,`Occupation`,`PhoneNumber`) 
    VALUES ('$password', '$emailaddress', '$gender', '$dateofbirth', '$name', '$surname', '$address', '$occupation','$phonenumber')";
    //$query2 = "SELECT LAST_INSERT_ID();";
    //print $query;

    $insert = $mysqli->query($query);

    if (!$insert) {
        echo $mysqli->error;
    } else {
        move_uploaded_file($_FILES["my_file"]["tmp_name"], 'clientimg/' . mysqli_insert_id($mysqli) . '.jpg');
        header("Location: Login-Page-Client.php");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>CSS326 Sample</title>
    <link rel="stylesheet" href="Register Page Client.css">

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

        <div id="div_content" >

            <h1>Setting the World in Motion</h1>
            <!--%%%%% Main block %%%%-->
            <!--Form -->
            <div id=" div_subcontent" class="form" style="background-color: rgba(0, 0, 0, 0.699); width: 550px; position: relative; margin-left: auto; margin-right:auto;">

            <form name="form" method="post" enctype="multipart/form-data">
                <label style="color: white; font-weight: bold;">
                  Select Image to upload:  
                </label> <br> <br>
                <input type="file" name="my_file" style="position: relative; left: 2%;"/>

                <h2>Welcome to Uber!</h2>

                <div class="center">
                    <input name="emailaddress" type="email" placeholder="Email"><br><br>
                    <input name="password" type="password" placeholder="Password"><br><br>
                    <input name="confirmpassword" type="password" placeholder="Confirm Password"><br><br>
                    <input name="name" type="first name" placeholder="First Name"><br><br>
                    <input name="surname" type="last name" placeholder="Last name"><br><br>

                    <label style="color: white;">Gender</label>
                    <input type="radio" name="gender" value="male" checked>Male
                    <input type="radio" name="gender" value="female">Female
                    <input type="radio" name="gender" value="others">Others<br><br>

                    <input name="occupation" type="occupation" placeholder="Occupation"><br><br>
                    <input name="phonenumber" type="phone number" placeholder="Phone Number"><br><br>
                    <input name="address" type="main address" placeholder="Main Address">

                    <label> </label>
                    <input type="radio" name="gpslocation" placeholder="gps location" unchecked>GPS Location<br><br>

                    <input name="day" type="birth date" placeholder="Birth Date">
                    <input name="month" type="birth month" placeholder="Birth Month">
                    <input name="year" type="birth year" placeholder="Birth Year"><br><br>

                </div>
            </div>

        <div class="center">
            <input type="submit" value="Submit" name="submit-register" class="Submit" style="cursor: pointer;"><br><br>
            <label>Terms and Agreement</label>
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