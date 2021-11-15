<!DOCTYPE html>

<?php
    /*
    Funtion:
    - Address Box (DONE)
    - Delete Category and Restaurant Nav Bar (DONE)
    - Shopping Cart (JavaScript)
    - Menu Layout ()
    */ 

    session_start();
    /*Leon's Database
    $mysqli = new mysqli("localhost", "root", 'Wirz140328', "uber");*/ 

    /*Junior's Database*/ 
    $mysqli = new mysqli("localhost", "root", '', "uber");
    $restaurantID = $_POST['restaurant'];

?>
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
                echo '      <label id="Address" class="Address" style="padding-left: 10px; overflow-x: hidden;">'.$address['Address'].'</label> ';
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
                    <div class="Promotion" style="position: relative; padding-right: 10px;">

                    <!--
                        <a href="">
                            <p>Promotion ></p>
                        </a>
                    -->

                    <button id="myBtn" style="border: none; background-color: #FFAD53; padding: 5px; border-radius: 10px; font-size: 25px;">Open Modal</button>
                    <!-- The Modal -->
                     <div id="myModal" class="modal">
                        <!-- Modal content -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <span class="close">&times;</span>
                                    <h2>Promotion</h2>
                                </div>
                                <div class="modal-body">
                                    <p>Promotion 1</p>
                                    <p>Promotion 2</p>
                                    <p>Promotion 3</p>
                                    <p>Promotion 4</p>
                                </div>
                                <div class="modal-footer">
                                    <h3>Uber Eats</h3>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <?php 



        ?>

        <section class="MenuSelections">
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