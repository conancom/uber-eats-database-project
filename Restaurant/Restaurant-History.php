<?php
session_start();
$mysqli = new mysqli("localhost", "root", 'Wirz140328', "uber");


if ($mysqli->connect_errno) {
    echo $mysqli->connect_error;
}


if (isset($_SESSION['id-restaurant'])) {
    $restaurantid = $_SESSION['id-restaurant'];

    $query = "SELECT * FROM `restaurant` WHERE `RestaurantID` = '$restaurantid'";
    // print($query); 
    $result = $mysqli->query($query);
    if (!$result) {
        echo $mysqli->error;
    } else {
        if (mysqli_num_rows($result) > 0) {
            $data = $result->fetch_array();
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="restaurant.css">
</head>



<body>

    <div class="header">
        Header
    </div>


    <div class="header_details">
        <?php
        echo   "<div class='profilepic' style=' 
        width: 175px;
        height: 175px;
        left: 126px;
        top: 198px;
        background: url(profileimg/" . $restaurantid . ".jpg);
        border-radius: 202px;
        background-size: cover;
        margin-top: 1%;
        margin-left: 4%;
        align-items: center;';>";
        ?>
    </div>
    <div class="textgroup">
        <div class="headerbox">
            <label><?php echo $data['Name'] ?> </label>
        </div>
        <div class="headerbox">
            <label> <?php echo $data['RestaurantID'] ?> </label>
        </div>
        <br>
        <div class="bottombox">
            <label> <?php echo $data['Opening_Times'] ?></label>
        </div>
        <div class="bottombox">
            <label> <?php echo $data['Opening_Days'] ?></label>
        </div><br>
        <a class="editprofile" href="Edit-Acc-Restaurant.php"> Edit Profile -></a>
    </div>
    </div>


    <div class="underheadbar">
        <div class="buttoncontainer">
            <button class="previousorders" onclick="location.href='Menu-Restaurant.php'"> Menu List </button>\ &nbsp; &nbsp;
            <! –– for Spacing inbetween buttons ––>
                <button class="previousordersonsame"> Previous Orders </button>
        </div>
    </div>



    <div class="bigcontainerhistory">
        <div class="history_container">

            <?php
            if (isset($_SESSION['id-restaurant'])) {
                $id = $_SESSION['id-restaurant'];

                $query = "SELECT *, `foodordering`.`FoodOrderingID` AS 'orderid' 
                FROM `foodordering`,`ordereditem`,`menuiteminrestaurant`,`restaurant`, `foodpayment`
                WHERE `foodordering`.`FoodOrderingID` = `ordereditem`.`FoodOrderingID`
                AND  `foodordering`.`FoodOrderingID` = `foodpayment`.`FoodOrderingID`
                AND `ordereditem`.`MenuItemInRestaurantID` = `menuiteminrestaurant`.`MenuItemInRestaurantID`
                AND `menuiteminrestaurant`.`RestaurantID` = `restaurant`.`RestaurantID`
                AND `restaurant`.`RestaurantID` = '$id'
                GROUP BY `ordereditem`.`FoodOrderingID`";
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
                            AND `MenuItemInRestaurant`.`MenuItemID` = `menuitem`.`MenuItemID` 
                            GROUP BY `MenuItemInRestaurant`.`MenuItemID`";
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