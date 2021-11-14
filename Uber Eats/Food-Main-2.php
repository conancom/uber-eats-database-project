<!DOCTYPE html>

<?php 

session_start();
/*Leon's Database
$mysqli = new mysqli("localhost", "root", 'Wirz140328', "uber");*/ 

/*Junior's Database*/ 
$mysqli = new mysqli("localhost", "root", '', "uber");

?>


<html>

<head>

    <!--This page should be a php-->
    <link rel="stylesheet" href="Food-Main-2-Styling.css">

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

                $query = "SELECT `Address` FROM `client` WHERE `ClientId` = '$clientid'";
                $result = $mysqli->query($query);

                $address = $result->fetch_array();

                echo '<div class="col AddressBoxCol">';
                echo '  <div class="AddressBox">';
                echo '      <input type="text" id="Address" name="Address" placeholder='.$address['Address'].' size="20">';
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
                    <a href="">
                        <p>Category ></p>
                    </a>
                </div>
            </div>
            <div class="col-2 RestaurantCol">
                <div class="Restaurant" style="position: relative; ">
                    <a href="">
                        <p>Restaurant ></p>
                    </a>
                </div>
            </div>
            <div class="col-2 PromotionCol">
                <div class="Promotion" style="position: relative; padding-right: 10px;">
                    <a href="">
                        <p>Promotion ></p>
                    </a>
                </div>
            </div>

        </div>
    </section>

    <section class="MainSelections">
        <div class="row OrderRow FirstRow">
            <div class="col-md-4">
                <h3>Restaurant Name</h3>
                <div class="RestaurantContainer">
                    <img src="UI Pictures/pexels-1.jpg" alt="Previous Order 1">
                </div>
            </div>

            <div class="col-md-4">
                <h3>Restaurant Name</h3>
                <div class="RestaurantContainer">
                    <img src="UI Pictures/pexels-2.jpg" alt="Previous Order 2">
                </div>
            </div>

            <div class="col-md-4">
                <h3>Restaurant Name</h3>
                <div class="RestaurantContainer">
                    <img src="UI Pictures/pexels-3.jpg" alt="Previous Order 3">
                </div>
            </div>
        </div>

        <div class="row OrderRow MiddleRow">

            <div class="col-md-4">
                <h3>Restaurant Name</h3>
                <div class="RestaurantContainer">
                    <img src="UI Pictures/pexels-1.jpg" alt="Previous Order 1">
                </div>
            </div>

            <div class="col-md-4">
                <h3>Restaurant Name</h3>
                <div class="RestaurantContainer">
                    <img src="UI Pictures/pexels-2.jpg" alt="Previous Order 2">
                </div>
            </div>

            <div class="col-md-4">
                <h3>Restaurant Name</h3>
                <div class="RestaurantContainer">
                    <img src="UI Pictures/pexels-3.jpg" alt="Previous Order 3">
                </div>
            </div>
        </div>

        <div class="row OrderRow LastRow" style="margin-bottom: 50px;">

            <div class="col-md-4">
                <h3>Restaurant Name</h3>
                <div class="RestaurantContainer">
                    <img src="UI Pictures/pexels-1.jpg" alt="Previous Order 1">
                </div>
            </div>

            <div class="col-md-4">
                <h3>Restaurant Name</h3>
                <div class="RestaurantContainer">
                    <img src="UI Pictures/pexels-2.jpg" alt="Previous Order 2">
                </div>
            </div>

            <div class="col-md-4">
                <h3>Restaurant Name</h3>
                <div class="RestaurantContainer">
                    <img src="UI Pictures/pexels-3.jpg" alt="Previous Order 3">
                </div>
            </div>
        </div>
    </section>

</body>

</html>