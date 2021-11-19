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


if (isset($_SESSION['id-restaurant']) and isset($_POST['complete-order'])) {
    $restaurantid = $_SESSION['id-restaurant'];
    $orderid = $_POST['id'];
    $query2 = "UPDATE `foodordering` SET `foodordering`.`Status` = 'Picked Up' WHERE `foodordering`.`FoodOrderingID` = '$orderid'";
    //print $query;
    $insert2 = $mysqli->query($query2);
    if (!$insert2) {
        echo $mysqli->error;
    } else {
        $_SESSION['id-order'] = $orderid;
        header("Location: Restaurant-Main.php");
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
                <button class="previousorders" onclick="location.href='Restaurant-History.php'"> Previous Orders </button>
        </div>
    </div>


    <div class="bigbuttoncontainer">

        <?php

        if (isset($_SESSION['id-restaurant'])) {
            $restaurantid = $_SESSION['id-restaurant'];
            $query = "SELECT *, `foodordering`.`FoodOrderingID` AS 'orderid' 
            FROM `foodordering`,`ordereditem`,`menuiteminrestaurant`,`restaurant`, `foodpayment`
            WHERE (`foodordering`.`Status` <> 'Picked Up' AND `foodordering`.`Status` <> 'Complete') 
            AND `foodordering`.`FoodOrderingID` = `ordereditem`.`FoodOrderingID`
            AND  `foodordering`.`FoodOrderingID` = `foodpayment`.`FoodOrderingID`
            AND `ordereditem`.`MenuItemInRestaurantID` = `menuiteminrestaurant`.`MenuItemInRestaurantID`
            AND `menuiteminrestaurant`.`RestaurantID` = `restaurant`.`RestaurantID`
            AND `restaurant`.`RestaurantID` = '$restaurantid'
            GROUP BY `ordereditem`.`FoodOrderingID`";
            // print($query); 
            $result = $mysqli->query($query);
            if (!$result) {
                echo $mysqli->error;
            } else {
                if (mysqli_num_rows($result) > 0) {
                    $x = 1;
                    while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
                        echo ' <div class="ordercontainer">';
                        echo '<div class="orderidbox">';
                        echo 'Order ID: ' . $data['orderid'];
                        echo '</div>';
                        echo '<table class="ordertable">';
                        echo ' <tr>';
                        echo ' <th> Menu Item ID</th>';
                        echo '<th> Name</th>';
                        echo '<th> Quantity </th>';
                        echo '<th> Special Request</th>';
                        echo '</tr>';

                        $orderID = $data['orderid'];
                        $query1 = "SELECT *, count(`menuiteminrestaurant`.`MenuItemID`) AS amount
                        FROM `foodordering`,`ordereditem`,`menuiteminrestaurant`,`restaurant`,`menuitem`
                        WHERE `foodordering`.`FoodOrderingID` = '$orderID'
                        AND  `foodordering`.`FoodOrderingID` = `ordereditem`.`FoodOrderingID`
                        AND `ordereditem`.`MenuItemInRestaurantID` = `menuiteminrestaurant`.`MenuItemInRestaurantID`
                        AND  `menuiteminrestaurant`.`MenuItemID` = `menuitem` .`MenuItemID`
                        GROUP BY `menuiteminrestaurant`.`MenuItemID`;";
                        // print($query); 
                        $result1 = $mysqli->query($query1);
                        if (!$result1) {
                            echo $mysqli->error;
                        } else {
                            if (mysqli_num_rows($result1) > 0) {
                                $x = 1;
                                while ($data1 = $result1->fetch_array(MYSQLI_ASSOC)) {
                                    echo ' <tr>';
                                    echo '<td> ' . $x . ' </td>';
                                    echo ' <td>' . $data1['FoodName'] . '</td>';
                                    echo '<td>' . $data1['amount'] . '</td>';
                                    echo '<td>' . $data1['SpecialRequest'] . '</td>';
                                    echo '</tr>';
                                    $x++;
                                }
                            }
                        }


                        echo '</table>';
                        echo '<div class="totalpricebox">';
                        echo 'Total Price: ' . $data['RestaurantCommission'];
                        echo '</div>';
                        echo '<div class="statusbox">';
                        echo '   Status: ' . $data['Status'];
                        echo ' </div>';

                        echo '<form name="submit-pickup" action="#" method="post">';
                        echo '<input type="hidden" name="id" value="' . $data['FoodOrderingID'] . '">';
                        /*echo '<button class="redbutton"> Reject</button><br>';*/
                        echo '<input name="complete-order" type="submit" class="greenbutton" value="Picked Up" ></button>';
                        echo '</form>';


                        echo ' </div>';
                        echo ' <br><br><br><br><br><br><br><br><br><br>';
                    }
                }
            }
        }
        ?>
    </div>



    <div class="div_footer">
        Footer
    </div>
</body>

</html>