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
if (isset($_SESSION['id-driver'])) {
    $id = $_SESSION['id-driver'];

    $query = "SELECT `driver`.*, `vehicle`.* FROM `driver`, `vehicle` WHERE `driver`.`DriverID` = '$id' AND `driver`.`DriverID` = `vehicle`.`DriverID`";
    // print($query); 
    $result = $mysqli->query($query);
    if (!$result) {
        echo $mysqli->error;
    } else {
        if (mysqli_num_rows($result) > 0) {
            $data = $result->fetch_array();
            $_SESSION['id-driver'] =  $id;
        }
    }
}
if (isset($_SESSION['id-driver']) and isset($_POST['update-edit'])) {
    $id = $_SESSION['id-driver'];
    $emailaddress = $_POST['emailaddress'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $gender = $_POST['gender'];
    $name =  $_POST['name'];
    $surname = $_POST['surname'];
    $phonenumber = $_POST['phonenumber'];
    $address = $_POST['address'];
    $driverlicense = $_POST['driverlicenseid'];
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    if (strlen($month) == 1) {
        $dateofbirth = "$year-0$month-$day";
    } else {
        $dateofbirth = "$year-$month-$day";
    }

    $query = "UPDATE `driver` SET `Password` = '$password', `Email` = '$emailaddress', `Gender` = '$gender', `DateOfBirth`= '$dateofbirth', `FName` = '$name', `LName` = '$surname', `DriverLicenseID` = '$driverlicense',`PhoneNumber` = '$phonenumber',`Address` = '$address' WHERE `DriverID` = '$id'";
    // print($query); 
    print $query;
    $insert = $mysqli->query($query);
    if (!$insert) {
        echo $mysqli->error;
    } else {
        header("Location: Driver-Main.php");

        if (file_exists('driverimg/' . $id . '.jpg')) {
            unlink('driverimg/' . $id . '.jpg');
        }


        move_uploaded_file($_FILES["my_file"]["tmp_name"], 'driverimg/' . $id . '.jpg');
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>CSS326 Sample</title>
    <link rel="stylesheet" href="Edit-Acc-Driver-Styling.css">
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

                <form name="update" action="#" method="post" enctype="multipart/form-data">
                    <h2>Welcome to Uber!</h2>

                    <div class="center">
                        <input name="emailaddress" type="email" value=<?php
                                                                        echo $data['Email'];
                                                                        ?>><br><br>
                        <input name="password" type="password" value=<?php
                                                                        echo $data['Password'];
                                                                        ?>><br><br>
                        <input name="confirmpassword" type="confirm password" value=<?php
                                                                                    echo $data['Password'];
                                                                                    ?>><br><br>
                        <input name='name' type="first name" value=<?php
                                                                    echo $data['FName'];
                                                                    ?>><br><br>
                        <input name="surname" type="last name" value=<?php
                                                                        echo $data['LName'];
                                                                        ?>><br><br>

                        <label>Gender</label>
                        <input type="radio" name="gender" value="male" <?php
                                                                        if ($data['Gender'] == "male")
                                                                            echo  'checked';
                                                                        ?>>Male
                        <input type="radio" name="gender" value="female" <?php
                                                                            if ($data['Gender'] == "female")
                                                                                echo  'checked';
                                                                            ?>>Female
                        <input type="radio" name="gender" value="others" <?php
                                                                            if ($data['Gender'] == "others")
                                                                                echo  'checked';
                                                                            ?>>Others<br><br>

                        <input name="phonenumber" type="phone number" value=<?php
                                                                            echo $data['PhoneNumber'];
                                                                            ?>><br><br>

                        <input name="address" type="address" value=<?php
                                                                    echo $data['Address'];
                                                                    ?>><br><br>

                        <input name="driverlicenseid" type="driverlicenseid" value=<?php
                                                                                    echo $data['DriverLicenseID'];
                                                                                    ?>><br><br>
                        <input name="day" type="birth date" value=<?php
                                                                    echo date("d", strtotime($data['DateOfBirth']));
                                                                    ?>>
                        <input name="month" type="birth month" value=<?php
                                                                        echo date("m", strtotime($data['DateOfBirth']));
                                                                        ?>>
                        <input name="year" type="birth year" value=<?php
                                                                    $dt = DateTime::createFromFormat('Y', date('Y', strtotime($data['DateOfBirth'])));
                                                                    echo $dt->format('Y');
                                                                    ?>><br><br><br>


                        Select Image to upload:
                        <input type="file" name="my_file" />

                    </div>

            </div>

            <div class="center">
                <input name="update-edit" type="submit" value="Update" class="Submit"><br><br>
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