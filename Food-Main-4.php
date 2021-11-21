<?php

/*
Function:
- Recommendations (DONE)
- Order Details 
- Payment

*/
session_start();

/*Leon's Database
    $mysqli = new mysqli("localhost", "root", 'Wirz140328', "uber");*/

/*Junior's Database*/
$mysqli = new mysqli("localhost", "root", '', "uber");

if ($mysqli->connect_errno) {
    echo $mysqli->connect_error;
}
if (isset($_SESSION['order-id']) and isset($_GET['id'])) {

    $orderid = $_SESSION['order-id'];
    $itemid = $_GET['id'];
    $_SESSION['menuitem-id'] = $itemid;
    $resid = $_SESSION['restaurant-id'];
    $clientid = $_SESSION['id-client'];

    $query4 = "INSERT INTO `ordereditem` (`FoodOrderingID`, `MenuItemInRestaurantID`, `OrderOfItem`, `SpecialRequest`) 
    VALUES ('$orderid', '$itemid', '1', 'none')";


    $result4 = $mysqli->query($query4);
    if (!$result4) {
        echo $mysqli->error;
    } else {
        //unset($_SESSION['order-id']);
        header("Location: Food-Main-4.php");
    }
}

if (isset($_GET['id']) and !isset($_SESSION['order-id'])) {

    $itemid = $_GET['id'];
    $_SESSION['menuitem-id'] = $itemid;
    $resid = $_SESSION['restaurant-id'];
    $clientid = $_SESSION['id-client'];

    $_SESSION['menuitem-id'] = $itemid;
    $query = "SELECT * FROM `client` WHERE `ClientID` = '$clientid'";
    $result = $mysqli->query($query);

    if (!$result) {
        echo $mysqli->error;
    } else {
        if (mysqli_num_rows($result) > 0) {
            $data = $result->fetch_array();
            $address = $data['Address'];
            $query2 = "SELECT * FROM `restaurant` WHERE `RestaurantID` = '$resid'";
            $result2 = $mysqli->query($query2);

            if (!$result2) {
                echo $mysqli->error;
            } else {
                if (mysqli_num_rows($result2) > 0) {
                    $data2 = $result2->fetch_array();
                    $restaurantaddress = $data2['Location'];

                    $query3 = "INSERT INTO `foodordering` (`ClientID`, `DriverID`, `AcceptingAddress`, `DestinationAddress`, `RideDuration`, `Status`) 
                    VALUES ('$clientid',NULL,  'non', '$address', '$restaurantaddress', 'Looking for Driver')";
                    $result3 = $mysqli->query($query3);
                    if (!$result3) {
                        echo $mysqli->error;
                    } else {
                        $_SESSION['order-id'] = $mysqli->insert_id;

                        $orderedid = $_SESSION['order-id'];
                        $query4 = "INSERT INTO `ordereditem` (`FoodOrderingID`, `MenuItemInRestaurantID`, `OrderOfItem`, `SpecialRequest`) 
                        VALUES ('$mysqli->insert_id', '$itemid', '1', 'none')";


                        $result4 = $mysqli->query($query4);
                        if (!$result4) {
                            echo $mysqli->error;
                        } else {

                            $query5 = "SELECT * FROM `menuitem`
                            WHERE `MenuItemID` = $itemid ";

                            $result5 = $mysqli->query($query5);
                            if (!$result5) {
                                echo $mysqli->error;
                            } else {
                                $data2 = $result5->fetch_array();

                                $price = $data2['Price'] + (($data2['Price'] / 100) * 7);
                                $drivercom = (($data2['Price'] / 100) * 3);
                                $rescom = $data2['Price'];
                                $query6 = "INSERT INTO `foodpayment` (`FoodOrderingID`, `ClientPrice`,
                                `Distance_Restaurant_to_Client`, `DriverCommission`, `RestaurantCommission`,
                                `PaymentMethod`, `MoneySaved`, `RatingFromClientDriver`, `RatingFromClientRestaurant`, `Tip`) 
                                VALUES ('$orderedid', '$price', '0', '$drivercom', '$rescom', 'Cash', '0', '5', '5', '0')";

                                $result6 = $mysqli->query($query6);
                                if (!$result6) {
                                    echo $mysqli->error;
                                } else {
                                    $orderedid = $_SESSION['order-id'];
                                    header("Location: Food-Main-4.php");
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

?>

<!DOCTYPE html>

<html>

<head>
    <link rel="Stylesheet" href="Food-Main-4-Styling.css">

    <!--Bootstrap-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <!--Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <section class="Header">
        <div class="row">
            <div class="LogoContainer">
                <h1 style="color: white; padding-left: 15px;">U b e r</h1>
            </div>
        </div>
    </section>

    <section class="CategoryRow">
        <div class="row">

            <div class="col">
                <div class="CartContainer">
                    <h2>Cart</h2>
                </div>
            </div>

        </div>
    </section>

    <section class="RecomAndDetails">
        <?php

        $resid = $_SESSION['restaurant-id'];
        $clientid = $_SESSION['id-client'];
        $restaurantID =  $resid;
        $query = "SELECT MenuItemInRestaurant.*, MenuItem.*, `Menuiteminrestaurant`.`MenuItemID` AS 'idmenuitem'  FROM Menuiteminrestaurant, MenuItem, Restaurant 
        WHERE Menuiteminrestaurant.MenuItemID = MenuItem.MenuItemID
        AND Restaurant.RestaurantID = Menuiteminrestaurant.RestaurantID
        AND Restaurant.RestaurantID = '$restaurantID'
        ORDER BY MenuItem.AmountSold
        LIMIT 0,3";

        $result = $mysqli->query($query);

        $restinformation = array(); /*Storing the name indexing*/
        $index = 0;
        echo '<div class="row">';
        echo '  <div class="col-3">';
        echo '      <h3 class="RecommendHeading">Recommendations</h3>';
        while ($row = $result->fetch_array()) {

            echo '      <div class="row RecommendRow">';
            echo '          <div class="MenuContainer">';
            echo '              <div class="row">';
            echo '                  <div class="col">';
            echo '                      <img src="restaurantimg/menu/' . $row['MenuItemID'] . '.jpg" alt="Menu Picture">';
            echo '                  </div>';
            echo '              <div class="col MenuName">';
            echo '                  <h2 style="padding-top: 10px; font-size: 20px;">' . $row['FoodName'] . '</h2>';
            echo '                  <br>';
            echo '                  <h3 style="font-size: 19px;">' . $row['Price'] . '</h3>';
            echo '                  <br>';
            $link =         "'Food-Main-4.php?id=" . $row['MenuItemID'] . "'";
            echo '                  <button name="' . $row['MenuItemID'] . '" class="AddCartButton" value="' . $row['MenuItemID'] . '" onclick="javascript:location.href=' . $link . '"> Add to Cart</button>';
            echo '              </div>';
            echo '          </div>';
            echo '      </div>';
            echo '  </div>';
        }

        echo '</div>';

        ?>

        <div class="col-9" style="padding-left: 50px;">

            <h3>Order Details</h3>
            <div class="OrderDetailContainer">
                <div class="row">
                    <div class="col-4">
                        <div class="DetailContainer">
                            <h3>Your Order</h3>
                            <table style="padding-left: 10px;">

                            <?php
                            if (isset($_SESSION['order-id'])) {

                                $orderid = $_SESSION['order-id'];
                                
                               
                                $resid = $_SESSION['restaurant-id'];
                                $clientid = $_SESSION['id-client'];
                            
                                $query = "SELECT `MenuItem`.* FROM `ordereditem`,`MenuItemInRestaurant`,`MenuItem` WHERE `ordereditem`.`FoodOrderingID` = $orderid
                                AND `ordereditem`.`MenuItemInRestaurantID` = `MenuItemInRestaurant`.`MenuItemInRestaurantID`
                                AND `MenuItemInRestaurant`.`MenuItemID` = `MenuItem`.`MenuItemID` ";
                            
                            
                                $result = $mysqli->query($query);
                                if (!$result) {
                                    echo $mysqli->error;
                                } else {
                                    $x = 1;
                                    while( $data = $result->fetch_array()){
                                       echo' <tr>';
                                       echo'<td style="padding-left: 30px; padding-right: 30px;"> ' . $x.'.'.$data['FoodName'].' </td>';
                                       echo'</tr>';
                                       $x ++;
                                    }
                                }
                            } 
                            ?>
                            </table>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="DetailContainer">
                            <h3>Payment</h3>
                            <table>

                            <?php
                            if (isset($_SESSION['order-id'])) {

                                $orderid = $_SESSION['order-id'];
                                
                               
                                $resid = $_SESSION['restaurant-id'];
                                $clientid = $_SESSION['id-client'];
                            
                                $query = "SELECT `MenuItem`.* FROM `ordereditem`,`MenuItemInRestaurant`,`MenuItem` WHERE `ordereditem`.`FoodOrderingID` = $orderid
                                AND `ordereditem`.`MenuItemInRestaurantID` = `MenuItemInRestaurant`.`MenuItemInRestaurantID`
                                AND `MenuItemInRestaurant`.`MenuItemID` = `MenuItem`.`MenuItemID` ";
                            
                            
                                $result = $mysqli->query($query);
                                if (!$result) {
                                    echo $mysqli->error;
                                } else {
                                    $x = 1;
                                    while( $data = $result->fetch_array()){
                                       echo' <tr>';
                                       echo'<td style="padding-left: 120px; padding-right: 120px;">'.$data['Price'].' </td>';
                                       echo'</tr>';
                                       $x ++;
                                    }
                                    
                                }
                            } 
                            ?>
                                
                            </table>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="DetailContainer">
                            <h3>Delivery</h3>
                            <table>

                            <?php
                            if (isset($_SESSION['order-id'])) {

                                $orderid = $_SESSION['order-id'];
                                
                               
                                $resid = $_SESSION['restaurant-id'];
                                $clientid = $_SESSION['id-client'];
                            
                                $query = "SELECT * FROM `client` WHERE `ClientID` = '$clientid';";
                            
                            
                                $result = $mysqli->query($query);
                                if (!$result) {
                                    echo $mysqli->error;
                                } else {
                                    $x = 1;
                                    while( $data = $result->fetch_array()){
                                       echo' <tr>';
                                       echo'<td style="padding-left: 75px; padding-right: 75px;">'.$data['Address'].' </td>';
                                       echo'</tr>';
                                       $x ++;
                                    }
                                    
                                }
                            } 
                            ?>
                                
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="Checkout">
                        <button class="CheckoutButton"  onclick="location.href='Food-Tracking.php'"> Checkout</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</body>

</html>

<!--

Old HTML Code

<div class="row RecommendRow">
            <div class="MenuContainer">
                <div class="row">
                    <div class="col">
                        <img src="UI Pictures/pexels-engin-akyurt-2703468.jpg" alt="Menu Picture">
                    </div>

                    <div class="col MenuName">

                        <h2 style="padding-top: 10px;">Carbonara</h2>
                        <br>
                        <h3>125 Baht</h3>
                        <br>
                        <button class="AddCartButton"> Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row RecommendRow">
            <div class="MenuContainer">
                <div class="row">
                    <div class="col">
                        <img src="UI Pictures/pexels-engin-akyurt-2703468.jpg" alt="Menu Picture">
                    </div>

                    <div class="col MenuName">

                        <h2 style="padding-top: 10px;">Carbonara</h2>
                        <br>
                        <h3>125 Baht</h3>
                        <br>
                        <button class="AddCartButton"> Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
        </div>

-->