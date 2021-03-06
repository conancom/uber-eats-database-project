<?php
/*
    Funtion:
    - Address Box (DONE)
    - Delete Category and Restaurant Nav Bar (DONE)
    - Shopping Cart (JavaScript)
    - Menu Layout ()
*/

session_start();
$resid = $_GET['id'];
$_SESSION['restaurant-id'] = $resid;

$mysqli = new mysqli("localhost", "root", '', "uber");
if ($mysqli->connect_errno) {
    echo $mysqli->connect_error;
}

?>

<!DOCTYPE html>

<html>

<head>
    <link rel="Stylesheet" href="Food-Main-3-Styling.css">

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

            <?php
            $clientid = $_SESSION['id-client'];
            /*$restaurantID = $_SESSION['restaurant-id'];*/

            $query = "SELECT `Address` FROM `client` WHERE `ClientId` = '$clientid'";
            $result = $mysqli->query($query);

            $address = $result->fetch_array();

            echo '<div class="col AddressBoxCol">';
            echo '  <div class="AddressBox" style="width: 100%; height: 45px; background-color: rgba(255, 255, 255, 1.0); border-radius: 10px;">';
            echo '      <label id="Address" class="Address" style="padding-left: 10px; overflow-x: hidden;">' . $address['Address'] . '</label> ';
            echo '  </div>';
            echo '</div>';
            ?>
            <!--
                <div class="col AddressBoxCol">
                    <div class="AddressBox">
                        <input type="text" id="Address" name="Address" placeholder="Address" size="20">
                    </div>
                </div>
                -->
            <div class="col-2 CategoryCol">
                <div class="Category" style="position: relative;">
                    <!--
                        <p>Category ></p>
                        -->
                </div>
            </div>
            <div class="col-2 RestaurantCol">
                <div class="Restaurant" style="position: relative; ">
                    <!--    
                        <p>Restaurant ></p>
                        -->
                </div>
            </div>
            <div class="col-2 PromotionCol">
               
            </div>
        </div>
    </section>

    <section class="MenuSelections">
        <?php

        $resid = $_GET['id'];
        
        $query2 = "SELECT Menuiteminrestaurant.*, Menuitem.*, `Menuiteminrestaurant`.`MenuItemID` AS 'idmenuitem' FROM `Menuiteminrestaurant`, `Menuitem` WHERE `Menuiteminrestaurant`.`RestaurantID` = $resid AND `Menuiteminrestaurant`.`MenuItemID` = `MenuItem`.`MenuItemID`";
        $result2 = $mysqli->query($query2);
   
        $rest = array(); /*Storing the name indexing*/
        $index = 0;
        $count = 0;
        while ($row2 = $result2->fetch_array()) {

            if ($count == 0) {
                echo '<div class="row MenuRow">';
            }
            echo '  <div class="col-md-4">';
            echo '      <div class="MenuContainer">';
            echo '          <div class="row">';
            echo '              <div class="col">';
            echo '                  <img src="restaurantimg/menu/' . $row2['MenuItemID'] . '.jpg" alt="Menu Picture">';
            echo '              </div>';
            echo '              <div class="col MenuName">';
            echo '                  <h2 style="padding-top: 10px; font-size: 20px;">' . $row2['FoodName'] . '</h2>';
            echo '                  <br>';
            echo '                  <h3 style="font-size: 19px;">' . $row2['Price'] . '</h3>';
            echo '                  <br>';
            $link =         "'Food-Main-4.php?id=" .$row2['idmenuitem']."'";
            echo '                  <button name="' . $row2['MenuItemID'] . '" class="AddCartButton" value="' . $row2['MenuItemID'] . '" onclick="javascript:location.href='.$link.'"> Add to Cart</button>';
            echo '              </div>';
            echo '          </div>';
            echo '      </div>';
            echo '</div>';
            if ($count == 2) {
                echo '</div>';
                $count = 0;
            } else {
                $count++;
            }
        }



        ?>
    
    </section>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>

</html>

<!--
Old HTML Code

        <div class="col-md-4">
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

        <div class="row MenuRow">
            <div class="col-md-4">
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

            <div class="col-md-4">
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

            <div class="col-md-4">
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

        <div class="row MenuRow">

            <div class="col-md-4">
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

            <div class="col-md-4">
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

            <div class="col-md-4">
                <div class="MenuContainer">
                    <div class="row">
                        <div class="col">
                            <img src="UI Pictures/pexels-engin-akyurt-2703468.jpg" alt="Menu Picture">
                        </div>

                        <div class="col MenuName" id="MenuName">

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