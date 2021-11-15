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
            <?php

            /*Leon's Database*/
            $mysqli = new mysqli("localhost", "root", 'Wirz140328', "uber");

            /*Junior's Database
$mysqli = new mysqli("localhost", "root", '', "uber");*/

            if ($mysqli->connect_errno) {
                echo $mysqli->connect_error;
            }
            if (isset($_SESSION['id-driver'])) {
                $id = $_SESSION['id-driver'];

                $query = "SELECT *
                FROM `client`,`driver`,`restaurant`,`foodordering`,`foodpayment`,`menuiteminrestaurant`,`ordereditem` 
                WHERE `driver`.`DriverID` = $id
                AND `foodordering`.`DriverID` = `driver`.`DriverID`
                AND `foodordering`.`ClientID` = `client`.`ClientID`
                AND `foodordering`.`FoodOrderingID` = `foodpayment`.`FoodOrderingID`
                AND `foodordering`.`FoodOrderingID` = `ordereditem`.`FoodOrderingID`
                AND `ordereditem`.`MenuItemInRestaurantID` = `MenuItemInRestaurant`.`MenuItemInRestaurantID`
                AND `MenuItemInRestaurant`.`RestaurantID` = `Restaurant`.`RestaurantID` GROUP BY `foodordering`.`FoodOrderingID`";
                // print($query); 
                $result = $mysqli->query($query);
                if (!$result) {
                    echo $mysqli->error;
                } else {
                    if (mysqli_num_rows($result) > 0) {
                        $_SESSION['id-driver'] =  $id;
                        $x = 1;
                        while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
                            // Do stuff with $data
                            echo '<div class="grid-container">';
                            echo '<div class="grid-item1">';
                            $dt = DateTime::createFromFormat('Y', date("Y", strtotime($data['Arrival_TimeStamp'])));
                            $datetime1 = new DateTime();
                            $datetime2 = new DateTime($data['Arrival_TimeStamp']);
                            $interval = $datetime1->diff($datetime2);
                            echo ' On ' . date("d", strtotime($data['Arrival_TimeStamp'])) . ' ' . date("F", strtotime($data['Arrival_TimeStamp'])) . ' ' . $dt->format('Y') . ', ' . $interval->format('%h:%i') . '<br>';
                            echo '   Price: $' . $data['ClientPrice'] . '<br>';
                            echo '   Total Time taken: ' . $data['RideDuration'] . '<br>';
                            echo '  Pick up: ' . $data['Name'] . ', ' . $data['Location'] . '<br>';
                            echo '      Destination: ' . $data['DestinationAddress'] . '<br>';
                            echo '     Details: <br>';

                            $query2 = "SELECT *, COUNT(`MenuItemInRestaurant`.`MenuItemID`) AS 'amount'
                            FROM `ordereditem`,`foodordering`,`MenuItemInRestaurant`, `menuitem` 
                            WHERE `foodordering`.`FoodOrderingID` = `ordereditem`.`FoodOrderingID`
                            AND `ordereditem`.`MenuItemInRestaurantID` = `MenuItemInRestaurant`.`MenuItemInRestaurantID`
                            AND `MenuItemInRestaurant`.`MenuItemID` = `menuitem`.`MenuItemID` GROUP BY `MenuItemInRestaurant`.`MenuItemID`";
                            // print($query); 
                            $result2 = $mysqli->query($query2);
                            if (!$result2) {
                                echo $mysqli->error;
                            } else {
                                if (mysqli_num_rows($result2) > 0) {
                                    while ($data2 = $result2->fetch_array(MYSQLI_ASSOC)) {
                                        echo  $data2['amount'] . ' ' . $data2['FoodName'] . '<br>';
                                    }
                                }
                            }



                            echo '  </div>';
                            echo '  <div class="grid-item2">';
                            echo '      Type of Payment <br>';
                            echo       $data['PaymentMethod'];
                            echo '  </div>';
                            echo '  <div class="grid-item3"></div>';
                            echo '  </div>';
                            echo '  <br><br>';
                            $x++;
                        }
                    }
                }
            }
            ?>

        </div>
    </div>

    <div class="div_footer">
        Footer


    </div>
</body>

</html>