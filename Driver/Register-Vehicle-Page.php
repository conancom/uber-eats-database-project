<?php
session_start();
$mysqli = new mysqli("127.0.0.1", "root", '', "uber");


if ($mysqli->connect_errno) {
    echo $mysqli->connect_error;
}

if (isset($_SESSION['id-driver']) and isset($_POST["register-vehicle-submit"])) {
    $driverid = $_SESSION['id-driver'];

    if (strlen($month) == 1) {
        $dateofbirth = "$year-0$month-$day";
    } else {
        $dateofbirth = "$year-$month-$day";
    }

    $query = "INSERT INTO `vehicle` (`DriverID`, `LicensePlate`, `VehicleType`, `VehicleBrand`, `VehicleModel`, `VehicleColor`) VALUES ('$driverid', '$LicensePlate', '$VehicleType', '$VehicleBrand', '$VehicleModel', '$VehicleColor');";
    print $query;
    $insert = $mysqli->query($query);
    if (!$insert) {
        echo $mysqli->error;
    } else {
        header("Location: Login-Page-Driver.php");
        }
    }

?>

<!DOCTYPE html>

<html>

<head>
    <link rel="Stylesheet" href="Register-Vehicle-Page-Styling.css">

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
            <div class="HeaderContainer">
                <h1>Header</h1>
            </div>
        </div>
    </section>

    <section class="RegisterForm">
        <div class="RegisterFormContainer">
            <div class="HeadingContainer">
                <div class="row">
                    <h1>Setting the world in motion</h1>
                </div>
            </div>

            <form name="Vehicle Registration" class="VehicleRegistration">
                <div class="VehicleForm">
                    <div class="row WelcomeToUber">
                        <h3>Welcome to Uber!</h3>
                    </div>

                    <div class="row">
                        <div class="VehicleTypeContainer">
                            <select name="VehicleType" class="VehicleType" style="border-radius: 15px; border: none; padding: 4px; margin: 15px; padding-left: 20px; padding-right: 20px;">
                      <option>Vehicle Type</option>
                    </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <select name="VehicleBrand" class="VehicleBrand" style="border-radius: 15px; border: none; padding: 4px; margin: 15px; padding-left: 20px; padding-right: 20px;">
                          <option>Vehicle Brand</option>
                        </select>
                        </div>

                        <div class="col">
                            <select name="VehicleModel" class="VehicleModel" style="border-radius: 15px; border: none; padding: 4px; margin: 15px; padding-left: 20px; padding-right: 20px;">
                          <option>Vehicle Model</option>
                        </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="VehicleColor">
                            <select name="VehicleColor" class="VehicleColor" style="border-radius: 15px; border: none; padding: 4px; margin: 15px; padding-left: 20px; padding-right: 20px;">
                      <option>Vehicle Color</option>
                    </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="LicenseContainer">
                            <input name="LicensePlate" type="text" class="LicensePlate" id="LicensePlate" placeholder="License Plate" style="border-radius: 15px; padding: 4px; text-indent: 42px; margin: 15px; ">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <input name ="name" type="text" class="ProductionDate" id="ProductionDate" placeholder="Production Date" style="border-radius: 15px; padding: 4px; text-indent: 10px; margin: 15px; margin-right: -95%;">
                        </div>

                        <div class="col">
                            <input type="text" class="ProductionMonth" id="ProductionMonth" placeholder="Production Month" style="border-radius: 15px; padding: 4px; text-indent: 10px; margin: 15px;  ">
                        </div>

                        <div class="col">
                            <input type="text" class="ProductionYear" id="ProductionYear" placeholder="Production Year" style="border-radius: 15px; padding: 4px; text-indent: 10px; margin: 15px; margin-left: -95%;">
                        </div>
                    </div>
                </div>

           
        </div>

        <div class="row">
            <div class="SumbitButtonContainer">
                <button name = 'register-vehicle-submit' class="SubmitButton" id="SubmitButton">Submit Button</button>
            </div>
        </div>
        </form>

        <div class="row">
            <div class="TermsAndAgreementContainer">
                <a href="#"><label class="TermsAndAgreement">Terms and Agreement</label></a>
            </div>
    </section>

    <section class="Footer">
        <div class="row">
            <div class="FooterContainer">
                <h1>Footer</h1>
            </div>
        </div>
    </section>
</body>

</html>