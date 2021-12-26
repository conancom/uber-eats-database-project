<?php
session_start();

$mysqli = new mysqli("localhost", "root", '', "uber");

if ($mysqli->connect_errno) {
    echo $mysqli->connect_error;


}
if (isset($_SESSION['id-client'])) {

    if(isset($_SESSION['order-id'])){
    
        unset($_SESSION['restaurant-id']);
        unset($_SESSION['order-id']);
    }


    $clientid = $_SESSION['id-client'];
   $_SESSION['id-client'] =  $clientid;
    $query = "SELECT * FROM `client` WHERE `ClientID` = '$clientid'";
    // print($query); 
    $result = $mysqli->query($query);
    if (!$result) {
        echo $mysqli->error;
    } else {
        if (mysqli_num_rows($result) > 0) {
            $data = $result->fetch_array();
            $_SESSION['id-client'] =  $clientid;
        }
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="client.css">
</head>

<body>

<div class="header" style="font-family: 'Kanit', sans-serif; z-index:999; cursor: pointer;" onclick="location.href='Client-Main.php'">
        Uber Eats
    </div>

    <div class="header_details">
    <?php
    echo   "<div class='profilepic' style='width: 145px;
    height: 145px;
    left: 126px;
    top: 198px;
    background: url(clientimg/" .$data['ClientID'].  ".jpg);
    border-radius: 202px;
    background-size: contain;
    /*margin-top: -45px;*/
    margin-top: 1%;
    margin-left: 4%;
    align-items: center';>";
    ?>
        </div>
        <div class="textgroup">
            <div class="headerbox">
                <label style="padding: 20px;">
                    <?php
                    echo  $data['FName'] . " " . $data['LName'];
                    ?>
                </label>
            </div>
            <div class="headerbox">
                <label style="padding: 20px;">
                    <?php
                    echo  $data['ClientID'];
                    ?>
                </label>
            </div><br>
            <div class="headerboxlong" style="position: relative; left: -145px;">
                <label style="padding: 20px;">
                    <?php
                    echo  $data['Address'];
                    ?>
                </label>
            </div><br>
            <a class="editprofile" href="Edit-Acc-Client.php" style="text-decoration: none;"> Edit Profile -></a>
        </div>
    </div>
    <div class="underheadbar">
        <div class="buttoncontainer">
            <button class="previousorders" onclick="window.location.href='Client-History.php'"> Previous Orders</button> 
        </div>
    </div>

    
        <div class="bigbuttoncontainer">
            <button class="orderfood" onclick="window.location.href='Food-Main.php'"> Order Food</button>
        </div>
    
    
   

    <div class="div_footer">
        <br>
    </div>
</body>

</html>