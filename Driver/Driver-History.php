<?php
session_start();
/*Leon's Database*/
$mysqli = new mysqli("localhost", "root", 'Wirz140328', "uber");

/*Junior's Database
$mysqli = new mysqli("localhost", "root", '', "uber");*/

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
?>

<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="driver.css">
</head>



<body>

    <div class="header">
        Header
    </div>


    <div class="header_details">
        <?php
        echo   "<div class='profilepic' style=' width: 145px;
        height: 145px;
        left: 126px;
        top: 198px;
        background: url(Driver\ Picture/" . $data['DriverID'] . ".jpg);
        border-radius: 202px;
        background-size: cover;
        /*margin-top: -45px;*/
        margin-top: 1.5%;
        margin-left: 4%;
        align-items: center;';>";
        ?>
    </div>
    <div class="textgroup">
        <div class="headerbox">
            <label> <?php
                    echo  $data['FName'] . " " . $data['LName'];
                    ?></label></label>
        </div>
        <div class="headerbox">
            <label> <?php
                    echo  $data['DriverID'];
                    ?></label>
        </div><br>
        <div class="licensebox">
            <label> <?php
                    echo  $data['LicensePlate'];
                    ?></label>
        </div>
        <div class="headerboxlong">
            <label> <?php
                    echo $data['VehicleType'] . " " . $data['VehicleBrand'] . " " . $data['VehicleModel'] . " " . $data['VehicleColor'];
                    ?></label>
        </div><br>
        <a class="editprofile" href="Edit-Acc-Driver.php"> Edit Profile -></a>
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
                <?php
                echo  "       " . $data['DRating'];
                ?> Rating
                Driving Since<?php
                                echo   "       " . $data['startdate'];
                                ?>
            </div>
            <button class="previousordersonhistory"> Previous Trips </button>

        </div>
    </div>

    <div class="bigcontainerhistory">
        <div class="history_container">
            <div class="grid-container">
                <div class="grid-item1">
                    On October 2021, 12:50 <br>
                    Price: $25.00<br>
                    Total Time taken: 20 mins<br>
                    Pick up: Burger King Rattanatibhet <br>
                    Destination: 99-161, Surasak, Sriracha, Chonburi <br>
                    Details: <br>
                    2 burgers <br>
                    1 french fries <br>
                    2 500ml Coca Cola <br>
                </div>
                <div class="grid-item2">
                    Type of Payment <br>
                    Cash
                </div>
                <div class="grid-item3"></div>
            </div>
        </div>
    </div>

    <div class="div_footer">
        Footer


    </div>
</body>

</html>