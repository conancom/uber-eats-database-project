<!DOCTYPE html>

<?php
session_start();
/*Leon's Database
$mysqli = new mysqli("localhost", "root", '', "uber");
*/
/*Junior's Database*/
$mysqli = new mysqli("localhost", "root", '', "uber");

if ($mysqli->connect_errno) {
	echo $mysqli->connect_error;
}
?>
<html>

<head>
    <link rel="Stylesheet" type="text/css" href="Food-Tracking-Styling.css">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="Tracking-Script.js"></script>

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

    <div class="row">
        <div class="col-4 ">
            <div class="Details">
                <div class="row DetailHeading">
                    <h2 style="text-align: center;">Driver Details</h2>
                </div>
                <?php

                $query = 'SELECT * FROM foodordering, driver, ordereditem WHERE foodordering.status = "Picking up Food" AND foodordering.foodordertingid = foodpayment.foodorderingid AND foodordering.foodorderingid = orderedfood.foodorderingid AND foodordering.driverid = driver.driverid AND vehicle.driverID = driver.driverid';
                $result = $mysqli->query($query);

                echo '<div class="row DriverPicture">';
                echo '  <img src="UI Pictures/pexels-nappy-3214023.jpg" alt="Driver Profile Picture">';
                echo '</div>';
                echo '<div class="DriverInformationContainer">';
                echo '  <div class="row">';
                echo '      <div class="row">';
                echo '          <p>Name: ' . $result['FName'] . ' ' . $result['LName'] . '</p>';
                echo '      </div>';
                echo '      <div class="row">';
                echo '          <p>Vehicle: ' . $result['VehicleBrand'] . '</p>';
                echo '      </div>';
                echo '      <div class="row">';
                echo '          <p>Rating: ' . $result['Rating'] . '</p>';
                echo '      </div>';

                ?>
            </div>
        </div>

        <div class="row CallButton">
            <button>Call</button>
        </div>
    </div>
    </div>

    <div class="col-8 Map">
        <div id="floating-panel">
            <b>Start: </b>
            <select id="start">
                <option value="chicago, il">Chicago</option>
                <option value="st louis, mo">St Louis</option>
                <option value="joplin, mo">Joplin, MO</option>
                <option value="oklahoma city, ok">Oklahoma City</option>
                <option value="amarillo, tx">Amarillo</option>
                <option value="gallup, nm">Gallup, NM</option>
                <option value="flagstaff, az">Flagstaff, AZ</option>
                <option value="winona, az">Winona</option>
                <option value="kingman, az">Kingman</option>
                <option value="barstow, ca">Barstow</option>
                <option value="san bernardino, ca">San Bernardino</option>
                <option value="los angeles, ca">Los Angeles</option>
            </select>
            <b>End: </b>
            <select id="end">
                <option value="chicago, il">Chicago</option>
                <option value="st louis, mo">St Louis</option>
                <option value="joplin, mo">Joplin, MO</option>
                <option value="oklahoma city, ok">Oklahoma City</option>
                <option value="amarillo, tx">Amarillo</option>
                <option value="gallup, nm">Gallup, NM</option>
                <option value="flagstaff, az">Flagstaff, AZ</option>
                <option value="winona, az">Winona</option>
                <option value="kingman, az">Kingman</option>
                <option value="barstow, ca">Barstow</option>
                <option value="san bernardino, ca">San Bernardino</option>
                <option value="los angeles, ca">Los Angeles</option>
            </select>
        </div>
        <div id="map"></div>

        <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7GLAny42CpzS5yeRs_QhEHRpWfwO91Ns&callback=initMap"></script>
        <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCurNekcoY8lBoPLMJNIkB1MfHTltAq4UQ&callback=initMap&v=weekly&channel=2" async></script>-->
    </div>
    </div>
</body>

</html>