<?php
session_start();
/*Leon's Database*/
$mysqli = new mysqli("localhost", "root", '', "uber");

/*Junior's Database
$mysqli = new mysqli("localhost", "root", '', "uber");*/

if ($mysqli->connect_errno) {
    echo $mysqli->connect_error;
}
if (isset($_SESSION['id-restaurant'])) {
    $id = $_SESSION['id-restaurant'];

    $query = "SELECT `restaurant`.* FROM `restaurant` WHERE `restaurant`.`RestaurantID` = '$id'";
    //print($query); 
    $result = $mysqli->query($query);
    if (!$result) {
        echo $mysqli->error;
    } else {
        if (mysqli_num_rows($result) > 0) {
            $data = $result->fetch_array();
            $_SESSION['id-restaurant'] =  $id;
        }
    }
}
if (isset($_SESSION['id-restaurant']) and isset($_POST['update-edit'])) {
    $id = $_SESSION['id-restaurant'];
    $emailaddress = $_POST['emailaddress'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $name =  $_POST['name'];
    $openingdays =  $_POST['openingdays'];
    $openingtime =  $_POST['openingtime'];
    $phonenumber = $_POST['phonenumber'];
    $address = $_POST['address'];
    $type = $_POST['type'];

    $query = "UPDATE `restaurant` SET `Password` = '$password', `Email` = '$emailaddress', `Name` = '$name', `Opening_Days` = '$openingdays', `Opening_Times` = '$openingtime', `PhoneNumber` = '$phonenumber', `Location` = '$address', `Type` = '$type' WHERE `RestaurantID` = '$id'";
    // print($query); 
    print $query;
    $insert = $mysqli->query($query);
    if (!$insert) {
        echo $mysqli->error;
    } else {

        if (file_exists('restaurantimg/' . $id . '.jpg')) {
            unlink('restaurantimg/' . $id . '.jpg');
        }


        move_uploaded_file($_FILES["my_file"]["tmp_name"], 'restaurantimg/' . $id . '.jpg');


        header("Location: Restaurant-Main.php");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>CSS326 Sample</title>
    <link rel="stylesheet" href="Edit-Acc-Restaurant-Styling.css">
</head>


<body>
    <div id="wrapper">
        <div id="div_header">
            Header
        </div>
        <div id="div_subhead">

        </div>

        <div id="div_content" class="form">
            <form action="#" method="post">
                <h1>Setting the World in Motion</h1>
                <!--%%%%% Main block %%%%-->
                <!--Form -->
                <div id="div_subcontent" class="form">

                    <form action="user.php" method="post">
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
                            <input name="name" type="restaurant name" value=<?php
                                                                            echo $data['Name'];
                                                                            ?>><br><br>
                            <input name="openingdays" type="opening days" value=<?php
                                                                                echo $data['Opening_Days'];
                                                                                ?>><br><br>
                            <input name="openingtime" type="opening time" value=<?php
                                                                                echo $data['Opening_Times'];
                                                                                ?>>
                            <!-- <input type="closing time" value="Closing Time"><br><br> -->

                            <input name="phonenumber" type="phone number" value=<?php
                                                                                echo $data['PhoneNumber'];
                                                                                ?>><br><br>

                            <input name="address" type="main address" value=<?php
                                                                            echo $data['Location'];
                                                                            ?>>

                            <label> </label>
                            <input type="radio" name="" value="gps location" checked>GPS Location<br><br>

                            <input name="type" type="restaurant type" value=<?php
                                                                            echo $data['Type'];
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