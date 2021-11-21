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
?>

<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="client.css">
</head>



<body>

<div class="header" style="font-family: 'Kanit', sans-serif; z-index:999; cursor: pointer;" onclick="location.href='Client-Main.php'">
        Uber Eats
    </div>


    <div class="header_details">
        <?php
        echo   "<div class='profilepic' style='width: 145px;
    height: 145px;
    left: 126px;
    top: 198px;
    background: url(clientimg/" . $data['ClientID'] .  ".jpg);
    border-radius: 202px;
    background-size: contain;
    /*margin-top: -45px;*/
    margin-top: 1%;
    margin-left: 4%;
    align-items: center';>";
        ?>
    </div>
    <div class="textgroup">
        <div class="headerbox">
            <label style="padding: 20px;">
                <?php
                echo  $data['FName'] . " " . $data['LName'];
                ?>
            </label>
        </div>
        <div class="headerbox">
            <label style="padding: 20px;">
                <?php
                echo  $data['ClientID'];
                ?>
            </label>
        </div><br>
        <div class="headerboxlong" style="left: -150px; position: relative;">
            <label style="padding: 20px; ">
                <?php
                echo  $data['Address'];
                ?>
            </label>
        </div><br>
        <a class="editprofile" href="Edit-Acc-Client.php" style="text-decoration: none; "> Edit Profile -></a>
    </div>
    </div>
    <div class="underheadbar">
        <div class="buttoncontainer">
            <button class="previousordersgrey" style="cursor:default;"> Previous Orders</button>
        </div>
    </div>
    <div class="bigbuttoncontainer">
        <div class="tablecontainer">
            <table class="tablehistory">
                <tr>
                    <th>Ordering ID</th>
                    <th> Driver </th>
                    <th> Restaurant </th>
                    <th> Destination </th>
                    <th> Date </th>
                    <th> Departure Time </th>
                    <th> Arrival Time </th>
                    <th> Price </th>
                    <th> Rating To Driver </th>
                    <th> Rating To Restaurant </th>

                    <?php

                 

                    if ($mysqli->connect_errno) {
                        echo $mysqli->connect_error;
                    }
                    if (isset($_SESSION['id-client'])) {
                        $clientid = $_SESSION['id-client'];

                        $query = "SELECT DISTINCT `foodordering`.`FoodOrderingID` AS 'ID', concat(`driver`.`FName`,' ',`driver`.`LName`) AS `DName`, `restaurant`.`Name` AS 'RName',`Foodordering`.*,`FoodPayment`.*, TIME(`Foodordering`.`Accepting_TimeStamp`) AS 'starttime', DATE(`Foodordering`.`Accepting_TimeStamp`) AS 'orderdate',TIME(`Foodordering`.`Arrival_TimeStamp`) AS 'arrivetime'
                        FROM `client`,`driver`,`restaurant`,`foodordering`,`foodpayment`,`menuiteminrestaurant`,`ordereditem` 
                        WHERE `client`.`ClientID` = $clientid
                        AND `foodordering`.`ClientID` = `client`.`ClientID`
                        AND `foodordering`.`FoodOrderingID` = `foodpayment`.`FoodOrderingID`
                        AND `foodordering`.`DriverID` = `driver`.`DriverID`
                        AND `foodordering`.`FoodOrderingID` = `ordereditem`.`FoodOrderingID`
                        AND `ordereditem`.`MenuItemInRestaurantID` = `MenuItemInRestaurant`.`MenuItemInRestaurantID`
                        AND `MenuItemInRestaurant`.`RestaurantID` = `Restaurant`.`RestaurantID`";
                        // print($query); 
                        $result = $mysqli->query($query);
                        if (!$result) {
                            echo $mysqli->error;
                        } else {
                            if (mysqli_num_rows($result) > 0) {
                                $_SESSION['id-client'] =  $clientid;
                                $x = 1;
                                while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
                                    // Do stuff with $data
                                    echo "<tr>";
                                    echo '<td>' . $data['ID'] . '</td>';
                                    echo '<td>' . $data['DName'] . '</td>';
                                    echo '<td>' . $data['RName'] . '</td>';
                                    echo '<td>' . $data['DestinationAddress'] . '</td>';
                                    echo '<td>' . $data['orderdate'] . ' </td>';
                                    echo '<td>' . $data['starttime'] . ' </td>';
                                    echo '<td>' . $data['arrivetime'] . '</td>';
                                    echo '<td>' . $data['ClientPrice'] . '</td>';
                                    echo '<td>' . $data['RatingFromClientDriver'] . '</td>';
                                    echo '<td>' . $data['RatingFromClientRestaurant'] . '</td>';
                                    echo  "</tr>";
                                    $x++;
                                }
                            }
                        }
                    }
                    ?>
                </tr>
            </table>
        </div>
        <div class="bottombuttoncontainer">
            <button class="backicon" type="submit"><a href="Client-Main.php"><img src="Client Picture\backicon.png"></a></button>
            <!--<button class="darkbutton"> Look for a Ride </button>-->

        </div>
    </div>




    <div class="div_footer">
        <br>
    </div>
</body>

</html>