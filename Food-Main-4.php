<!DOCTYPE html>

<?php

/*
Function:
- Recommendations (DONE)
- Order Details 
- Payment

*/

use phpseclib\Crypt\Random;

session_start();
/*Leon's Database
    $mysqli = new mysqli("localhost", "root", 'Wirz140328', "uber");*/

/*Junior's Database*/
$mysqli = new mysqli("localhost", "root", '', "uber");
if ($mysqli->connect_errno) {
    echo $mysqli->connect_error;
}

?>

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
        $restaurantID =  $_SESSION['restaurant-id'];
        $query = "SELECT MenuItemInRestaurant.*, MenuItem.* FROM Menuiteminrestaurant, MenuItem, Restaurant 
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
            $restinformation[$index] = $row;
            $index++;
        
        echo '      <div class="row RecommendRow">';
        echo '          <div class="MenuContainer">';
        echo '              <div class="row">';
        echo '                  <div class="col">';
        echo '                      <img src="Restaurant/Menu/' . $row['MenuItemID'] . '.jpg" alt="Menu Picture">';
        echo '                  </div>';
        echo '              <div class="col MenuName">';
        echo '                  <h2 style="padding-top: 10px; font-size: 20px;">' . $row['FoodName'] . '</h2>';
        echo '                  <br>';
        echo '                  <h3 style="font-size: 19px;">' .$row['Price'] . '</h3>';
        echo '                  <br>';
        echo '                  <button class="AddCartButton"> Add to Cart</button>';
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
                            <table>
                                <tr>
                                    <td>1. Your Order</td>
                                </tr>
                                <tr>
                                    <td>2. Your Order</td>
                                </tr>
                                <tr>
                                    <td>3. Your Order</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="DetailContainer">
                            <h3>Payment</h3>
                            <table>
                                <tr>
                                    <td>1. Payment 1</td>
                                </tr>
                                <tr>
                                    <td>2. Payment 2</td>
                                </tr>
                                <tr>
                                    <td>3. Payment 3</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="DetailContainer">
                            <h3>Delivery</h3>
                            <table>
                                <tr>
                                    <td>1. Destination 1</td>
                                </tr>
                                <tr>
                                    <td>2. Destination 2</td>
                                </tr>
                                <tr>
                                    <td>3. Destination 3</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="Checkout">
                        <button class="CheckoutButton">Checkout</button>
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