<?php
session_start();

$mysqli = new mysqli("localhost", "root", '', "uber");

if ($mysqli->connect_errno) {
    echo $mysqli->connect_error;
}
if (isset($_SESSION['id-client'])) {
    $clientid = $_SESSION['id-client'];

    $query = "SELECT * FROM `client` WHERE `ClientID` = '$clientid'";
    // print($query); 
    $result = $mysqli->query($query);
    if (!$result) {
        echo $mysqli->error;
    } else {
        if (mysqli_num_rows($result) > 0) {
            $data = $result->fetch_array();
            $_SESSION['id-client'] =  $clientid;
        }
    }
}
if (isset($_SESSION['id-client']) and isset($_POST['update-edit'])) {
    $clientid = $_SESSION['id-client'];
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

    $query = "UPDATE `client` SET `Password` = '$password', `Email` = '$emailaddress', `Gender` = '$gender', `DateOfBirth`= '$dateofbirth', `FName` = '$name', `LName` = '$surname', `Address` = '$address',`Occupation` = '$occupation',`PhoneNumber` = '$phonenumber' WHERE `ClientID` = '$clientid'";
    // print($query); 
    print $query;
    $insert = $mysqli->query($query);
    if (!$insert) {
        echo $mysqli->error;
    } else {


        if (file_exists('clientimg/' . $clientid . '.jpg')) {
            unlink('clientimg/' . $clientid . '.jpg');
        }


        move_uploaded_file($_FILES["my_file"]["tmp_name"], 'clientimg/' . $clientid . '.jpg');
        header("Location: Client-Main.php");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>CSS326 Sample</title>
    <link rel="stylesheet" href="Edit-Acc-Client-Styling.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>


<body>

</style>
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
            <div id="div_subcontent" class="form">

                <form action="#" method="post" enctype="multipart/form-data">
                    <h2>Edit your information</h2>

                    <div class="center">
                        <input name="emailaddress" type="email" value=<?php
                                                                        echo $data['Email'];
                                                                        ?>><br><br>
                        <input name="password" type="password" placeholder="New Password"><br><br>
                        <input name="confirmpassword" type="password" placeholder="New Password Confirm"  ><br><br>
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

                        <input name="occupation" type="occupation" value=<?php
                                                                            echo $data['Occupation'];
                                                                            ?>><br><br>
                        <input name="phonenumber" type="phone number" value=<?php
                                                                            echo $data['PhoneNumber'];
                                                                            ?>><br><br>
                        <input name="address" type="main address" value=<?php
                                                                        echo $data['Address'];
                                                                        ?>>

                        <label> </label>
                        <input type="radio" name="" value="gps location" checked>GPS Location<br><br>

                        <input name="day" type="birth date" value=<?php
                                                                    echo date("d", strtotime($data['DateOfBirth']));
                                                                    ?>>
                        <input name="month" type="birth month" value=<?php
                                                                        echo date("m", strtotime($data['DateOfBirth']));
                                                                        ?>>
                        <input name="year" type="birth year" value=<?php
                                                                    $dt = DateTime::createFromFormat('Y', date('Y', strtotime($data['DateOfBirth'])));
                                                                    echo $dt->format('Y');
                                                                    ?>><br><br>
                        Select Image to upload:
                        <input type="file" name="my_file" />
                    </div>
            </div>

            <div class="center">
                <input name="update-edit" type="submit" value="Update" class="Submit" style="cursor: pointer; font-size: 15px; font-weight: bold; width: 200px;"><br><br>
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