<!DOCTYPE html>

<html>

<!--Php Sections-->
<?php
/* 
Functions:
- Address: Find Food Button
- Previous Orders: Show and allows users to press on it and re-order (Reuse code for ordering)
*/

session_start();
$mysqli = new mysqli("localhost", "root", '', "uber");

if ($mysqli->connect_errno) {
    echo $mysqli->connect_error;
}


if (isset($_POST["submit-find-food"]) and isset($_SESSION['id-client'])) {
    $address = $_POST['Address'];
    /*$clientid = $_SESSION['ClientID'];*/ /*Messenger to another page in an array form*/
    $clientid = $_SESSION['id-client'];

    $query = "UPDATE `client` SET `Address` = '$address' WHERE `ClientID` = '$clientid'";
    // print($query); 
    $result = $mysqli->query($query);
    if (!$result) {
        echo $mysqli->error;
    } else {
        /*$data = $result->fetch_array();*/
        $_SESSION['id-client'] = $clientid;
        header("Location: Food-Main-2.php");
    }
}
/**/
?>

<!--HTML Sections-->

<head>
    <link rel="stylesheet" href="Food-Main-Styling.css">

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

    <section class="Main">
        <div class="row">
            <form name="uber-eat-address" action="#" method="POST">
                <div class="ImageContainer">

                    <div class="AddressBox">

                        <?php
                    
                        if (isset($_SESSION['id-client'])) {
                            /*$clientid = $_SESSION['ClientID'];*/ /*Messenger to another page in an array form*/
                            $clientid = $_SESSION['id-client'];

                            $query = "SELECT * FROM `client` WHERE `ClientID` = '$clientid'";
                            // print($query); 
                            $result = $mysqli->query($query);
                            if (!$result) {
                                echo $mysqli->error;
                            } else {
                                $data1 = $result->fetch_array();
                                $_SESSION['id-client'] = $clientid;
                                echo '<input type="text" id="Address" name="Address" placeholder="Address" size="20" value="' .$data1['Address']. '">';
                            }
                        }
                        ?>
                    </div>

                    <div class="FindFood">
                        <input type="submit" name="submit-find-food" placeholder="Find Food" value="Find Food">
                    </div>
                </div>
            </form>
        </div>
    </section>
    
    <!--
    <section class="Footer">
        <div class="row">
            <div class="LogoContainer">
                <h1 style="color: white; padding-left: 15px;">U b e r</h1>
            </div>
        </div>
    </section>
    -->
</body>

</html>


<!--
    Old HTML Codes

            <div class="col-md-4">
                <div class="PrevOrderContainer">
                    <img src="UI Pictures/pexels-1.jpg" alt="Previous Order 1">
                </div>
            </div>

            <div class="col-md-4">
                <div class="PrevOrderContainer">
                    <img src="UI Pictures/pexels-2.jpg" alt="Previous Order 2">
                </div>
            </div>

            <div class="col-md-4">
                <div class="PrevOrderContainer">
                    <img src="UI Pictures/pexels-3.jpg" alt="Previous Order 3">
                </div>
            </div>

-->