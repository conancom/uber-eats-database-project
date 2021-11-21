<?php
session_start();

$mysqli = new mysqli("localhost", "root", '', "uber");

if ($mysqli->connect_errno) {
    echo $mysqli->connect_error;
}
if (isset($_SESSION['id-driver'])) {
    $driverid = $_SESSION['id-driver'];

    $query = "SELECT `driver`.*, `vehicle`.* FROM `driver`, `vehicle` WHERE `driver`.`DriverID` = '$driverid' AND `driver`.`DriverID` = `vehicle`.`DriverID`";
    // print($query); 
    $result = $mysqli->query($query);
    if (!$result) {
        echo $mysqli->error;
    } else {
        if (mysqli_num_rows($result) > 0) {
            $data = $result->fetch_array();
            $_SESSION['id-driver'] =  $driverid;
        }
    }
}

if (isset($_SESSION['id-driver']) and isset($_POST['accept-order'])) {
    $driverid = $_SESSION['id-driver'];
    $orderid = $_POST['id'];
    $query = "UPDATE `foodordering` SET `foodordering`.`DriverID` = '$driverid', `foodordering`.`Status` = 'Picking up food' WHERE `foodordering`.`FoodOrderingID` = '$orderid'";
    //print $query;
    $insert = $mysqli->query($query);
    if (!$insert) {
        echo $mysqli->error;
    } else {
        $_SESSION['id-order'] = $orderid;
        header("Location: Driver-Main.php");
    }
}

if (isset($_SESSION['id-driver']) and isset($_POST['complete-order'])) {
    $driverid = $_SESSION['id-driver'];
    $orderid = $_POST['id'];
    $query = "UPDATE `foodordering` SET `foodordering`.`Status` = 'Complete' WHERE `foodordering`.`FoodOrderingID` = '$orderid'";
    //print $query;
    $insert = $mysqli->query($query);
    if (!$insert) {
        echo $mysqli->error;
    } else {

        unset($_SESSION['id-order']);
        header("Location: Driver-Main.php");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="driver.css">
</head>

<body>

<div class="header" style="font-family: 'Kanit', sans-serif; z-index:999; cursor: pointer;" onclick="location.href='Driver-Main.php'">
        Uber Eats
    </div>

    <div class="header_details">
        <?php
        echo   "<div class='profilepic' style=' 
        width: 175px;
        height: 175px;
        left: 126px;
        top: 198px;
        background: url(driverimg/" . $data['DriverID'] . ".jpg);
        border-radius: 202px;
        background-size: cover;
        margin-top: 1%;
        margin-left: 4%;
        align-items: center;';>";
        ?>
    </div>

    <div class="textgroup">
        <div class="headerbox">
            <label style="padding: 20px; font-size: 15px;"> <?php
                    echo  $data['FName'] . " " . $data['LName'];
                    ?></label>
        </div>
        <div class="headerbox">
            <label style="padding: 20px;"> <?php
                    echo  $data['DriverID'];
                    ?></label>
        </div><br>
        <div class="licensebox">
            <label style="padding: 20px;"> <?php
                    echo  $data['LicensePlate'];
                    ?></label>
        </div>
        <div class="headerboxlong">
            <label style="padding: 20px;"> <?php
                    echo $data['VehicleType'] . " " . $data['VehicleBrand'] . " " . $data['VehicleModel'] . " " . $data['VehicleColor'];
                    ?></label>
        </div><br>
        <a class="editprofile" href="Edit-Acc-Driver.php" style="text-decoration: none; "> Edit Profile -></a>
    </div>
    
    </div>
    <?php
    if ($mysqli->connect_errno) {
        echo $mysqli->connect_error;
    }
    if (isset($_SESSION['id-driver'])) {
        $driverid = $_SESSION['id-driver'];

        $query = "SELECT count(DISTINCT `foodordering`.`FoodOrderingID`) AS 'num', `driver`.`Rating` As 'DRating', DATE(`driver`.`Registration_TimeStamp`) AS 'startdate' FROM `driver`, `foodordering` WHERE `driver`.`DriverID` = '$driverid' AND `driver`.`DriverID` = `foodordering`.`DriverID`";
        // print($query); 
        $result = $mysqli->query($query);
        if (!$result) {
            echo $mysqli->error;
        } else {
            if (mysqli_num_rows($result) > 0) {
                $data = $result->fetch_array();
                $_SESSION['id-driver'] =  $driverid;
            }
        }
    }
    ?>

    <div class="underheadbar">
        <div class="buttoncontainer">
            <div class="driverdetailscontainer">
                <?php
                echo  $data['num'];
                ?> Total Trips
                
                Driving Since<?php
                                echo   "       " . $data['startdate'];
                                ?>
            </div>
            <button class="previousorders" onclick="window.location.href='Driver-History.php'" style="margin-left: 20px;"> Previous Trips </button>

        </div>
    </div>

    <div class="bigbuttoncontainer">
        <?php
        if (isset($_SESSION['id-driver']) and !isset($_SESSION['id-order'])) {
            $driverid = $_SESSION['id-driver'];
            $query = "SELECT * FROM `foodordering` WHERE `foodordering`.`Status` = 'Looking for Driver';";
            // print($query); 
            $result = $mysqli->query($query);
            if (!$result) {
                echo $mysqli->error;
            } else {
                if (mysqli_num_rows($result) > 0) {
                    $_SESSION['id-driver'] =  $driverid;
                    $x = 1;
                    while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
                        echo '<div class="ordercontainer">';
                        echo '<div class="rightcontainer">';
                        echo '<form name="submit-accept" action="#" method="post">';
                        echo '<label name="label" value="' . $data['FoodOrderingID'] . '"> DELIVERY REQUEST ' . $data['FoodOrderingID'] . '</label>';
                        echo '<input type="hidden" name="id" value="' . $data['FoodOrderingID'] . '">';
                        /*echo '<button class="redbutton"> Reject</button><br>';*/
                        echo '<input name="accept-order" type="submit" class="greenbutton" value="Accept"></button>';
                        echo '</form>';
                        echo '</div>';
                        echo '<div class="leftcontainer">';
                        echo '<div> MAP </div>';
                        echo '</div>';
                        echo '</div>';
                        echo '<br><br><br><br><br><br><br><br><br><br><br>';
                    }
                }
            }
        }
        ?>

        <?php
        if (isset($_SESSION['id-order'])) {
            $orderid = $_SESSION['id-order'];
            $query = "SELECT * FROM `foodordering` WHERE `FoodOrderingID` = '$orderid';";
            // print($query); 
            $result = $mysqli->query($query);
            if (!$result) {
                echo $mysqli->error;
            } else {
                if (mysqli_num_rows($result) > 0) {
                    $_SESSION['id-driver'] =  $driverid;
                    $x = 1;
                    while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
                        echo '<div class="ordercontainer">';
                        echo '<div class="rightcontainer">';
                        echo '<form name="submit-complete" action="#" method="post">';
                        echo '<label name="label" value="' . $data['FoodOrderingID'] . '"> DELIVERY REQUEST ' . $data['FoodOrderingID'] . '</label>';
                        echo '<input type="hidden" name="id" value="' . $data['FoodOrderingID'] . '">';
                        /*echo '<button class="redbutton"> Reject</button><br>';*/
                        echo '<input name="complete-order" type="submit" class="greenbutton" value="Completed Order"></button>';
                        echo '</form>';
                        echo '</div>';
                        echo '<div class="leftcontainer">';
                        echo '<div> MAP </div>';
                        echo '</div>';
                        echo '</div>';
                        echo '<br><br><br><br><br><br><br><br><br><br><br>';
                    }
                }
            }
        }
        ?>

    </div>
    <div class="div_footer">
        <br>
    </div>
</body>

</html>