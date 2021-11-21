<?php
session_start();

$mysqli = new mysqli("localhost", "root", '', "uber");

if ($mysqli->connect_errno) {
    echo $mysqli->connect_error;
}

if (isset($_SESSION['id-driver']) and isset($_POST["register-vehicle-submit"])) {
    $driverid = $_SESSION['id-driver'];

    $LicensePlate = $_POST['LicensePlate'];
    $VehicleType = $_POST['VehicleType'];
    $VehicleBrand = $_POST['VehicleBrand'];
    $VehicleModel = $_POST['VehicleModel'];
    $VehicleColor = $_POST['VehicleColor'];
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
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
                <h1 style="font-size: 25px; font-weight: bold; letter-spacing: 7px;">Uber Eats</h1>
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

            <form name="Vehicle Registration" class="VehicleRegistration" method="post">
                <div class="VehicleForm">
                    <div class="row WelcomeToUber">
                        <h3>Welcome to Uber!</h3>
                    </div>

                    <div class="row">
                        <div class="VehicleTypeContainer">
                            <select name="VehicleType" class="VehicleType" style="border-radius: 15px; border: none; padding: 4px; margin: 15px; padding-left: 20px; padding-right: 20px;">
                                <option>Type</option>
                                <option value="Car">Car</option>
                                <option value="Motorcycle">Motorcycle</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <select name="VehicleBrand" class="VehicleBrand" style="border-radius: 15px; border: none; padding: 4px; margin: 15px; padding-left: 20px; padding-right: 20px;">
                                <option>Brand</option>
                                <option value="BMW">BMW</option>
                                <option value="Daewoo">Daewoo</option>
                                <option value="Ford">Ford</option>
                                <option value="Holden">Holden</option>
                                <option value="Honda">Honda</option>
                                <option value="Hyundai">Hyundai</option>
                                <option value="Isuzu">Isuzu</option>
                                <option value="Kia">Kia</option>
                                <option value="Lexus">Lexus</option>
                                <option value="Mazda">Mazda</option>
                                <option value="Mitsubishi">Mitsubishi</option>
                                <option value="Nissan">Nissan</option>
                                <option value="Peugeot">Peugeot</option>
                                <option value="Subaru">Subaru</option>
                                <option value="Suzuki">Suzuki</option>
                                <option value="Toyota">Toyota</option>
                                <option value="Volkswagen">Volkswagen</option>
                                <option value="Yamaha">Yamaha</option>

                            </select>
                        </div>

                        <div class="col">
                            <select name="VehicleModel" class="VehicleModel" style="border-radius: 15px; border: none; padding: 4px; margin: 15px; padding-left: 20px; padding-right: 20px;">
                                <option>Model</option>
                                <option value="0">Model</option>
                                <option class="318i" value="318i">318i</option>
                                <option class="lanos" value="Lanos">Lanos</option>
                                <option class="courier" value="Courier">Courier</option>
                                <option class="falcon" value="Falcon">Falcon</option>
                                <option class="festiva" value="Festiva">Festiva</option>
                                <option class="fiesta" value="Fiesta">Fiesta</option>
                                <option class="focus" value="Focus">Focus</option>
                                <option class="laser" value="Laser">Laser</option>
                                <option class="ranger" value="Ranger">Ranger</option>
                                <option class="territory" value="Territory">Territory</option>
                                <option class="astra" value="Astra">Astra</option>
                                <option class="barina" value="Barina">Barina</option>
                                <option class="captiva" value="Captiva">Captiva</option>
                                <option class="colorado" value="Colorado">Colorado</option>
                                <option class="commodore" value="Commodore">Commodore</option>
                                <option class="cruze" value="Cruze">Cruze</option>
                                <option class="rodeo" value="Rodeo">Rodeo</option>
                                <option class="viva" value="Viva">Viva</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="VehicleColor">
                            <select name="VehicleColor" class="VehicleColor" style="border-radius: 15px; border: none; padding: 4px; margin: 15px; padding-left: 20px; padding-right: 20px;">
                                <option>Color</option>
                                <option value="White">White</option>
                                <option value="Gray">Gray</option>
                                <option value="Black">Black</option>
                                <option value="Gold">Gold</option>
                                <option value="Silver">Silver</option>
                                <option value="Red">Red</option>
                                <option value="Blue">Blue</option>
                                <option value="Orange">Orange</option>
                                <option value="Yellow">Yellow</option>
                                <option value="Green">Green</option>

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
                            <input name="day" type="text" class="ProductionDate" id="ProductionDate" placeholder="Production Date" style="border-radius: 15px; padding: 4px; text-indent: 10px; margin: 15px; margin-right: -95%;">
                        </div>

                        <div class="col">
                            <input name="month" type="text" class="ProductionMonth" id="ProductionMonth" placeholder="Production Month" style="border-radius: 15px; padding: 4px; text-indent: 10px; margin: 15px;  ">
                        </div>

                        <div class="col">
                            <input name="year" type="text" class="ProductionYear" id="ProductionYear" placeholder="Production Year" style="border-radius: 15px; padding: 4px; text-indent: 10px; margin: 15px; margin-left: -95%;">
                        </div>
                    </div>
                </div>


        </div>

        <div class="row">
            <div class="SumbitButtonContainer">
                <input type="submit" name='register-vehicle-submit' class="SubmitButton" id="SubmitButton" value="Submit">
            </div>
        </div>
        </form>

        <div class="row">
            <div class="TermsAndAgreementContainer">
                <a href="#"><label class="TermsAndAgreement" style="font-weight: bold; letter-spacing: 5px; font-size: 17px;">Terms and Agreement</label></a>
            </div>
    </section>

    <section class="Footer">
        <div class="row">
            <div class="FooterContainer">
                <h1></h1>
            </div>
        </div>
    </section>
</body>

</html>