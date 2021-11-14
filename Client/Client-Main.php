<?php
session_start();
/*Leon's Database
$mysqli = new mysqli("localhost", "root", 'Wirz140328', "uber");*/ 

/*Junior's Database*/ 
$mysqli = new mysqli("localhost", "root", '', "uber");

if ($mysqli->connect_errno) {
    echo $mysqli->connect_error;
}
if (isset($_SESSION['id-artist'])) {
    $clientid = $_SESSION['id-client'];

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

    <div class="header">
        Header
    </div>


    <div class="header_details">
    <?php
    echo   "<div class='profilepic' style='width: 145px;
    height: 145px;
    left: 126px;
    top: 198px;
    background: url(Client\ Picture/" .$data['ClientID'].  ".jpg);
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
                <label>
                    <?php
                    echo  $data['FName'] . " " . $data['LName'];
                    ?>
                </label>
            </div>
            <div class="headerbox">
                <label>
                    <?php
                    echo  $data['ClientID'];
                    ?>
                </label>
            </div><br>
            <div class="headerboxlong">
                <label>
                    <?php
                    echo  $data['Address'];
                    ?>
                </label>
            </div><br>
            <a class="editprofile" href=""> Edit Profile -></a>
        </div>
    </div>
    <div class="underheadbar">
        <div class="buttoncontainer">
            <button class="previousorders"> Previous Orders</button>
        </div>
    </div>

    <form>
        <div class="bigbuttoncontainer">
            <button class="orderfood" type="submit"> Order Food</button>
        </div>
    </form>
    
    <?php 
    
    if(isset($_POST['submit'])){
        header("Location: D:\Online Lecture\Year 3\CSS326 Database Systems Programming\Project Uber\Uber Source Code\css326\Uber EatsFood-Main.php");
        exit;
    }

    ?>

    <div class="div_footer">
        Footer


    </div>
</body>

</html>