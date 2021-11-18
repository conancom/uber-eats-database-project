<?php
session_start();
$mysqli = new mysqli("localhost", "root", 'Wirz140328', "uber");


if ($mysqli->connect_errno) {
	echo $mysqli->connect_error;
}


if (isset($_SESSION['id-restaurant'])) {
    $restaurantid = $_SESSION['id-restaurant'];
	
	$query = "SELECT * FROM `restaurant` WHERE `RestaurantID` = '$restaurantid'";
	// print($query); 
	$result = $mysqli->query($query);
	if (!$result) {
		echo $mysqli->error;
	} else {
		if (mysqli_num_rows($result) > 0) {
			$data = $result->fetch_array();
		}
	}
}
?>



<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="restaurant.css">
</head>



<body>

    <div class="header">
        Header
    </div>


    <div class="header_details">
        <div class=" profilepic">
        </div>
        <div class="textgroup">
            <div class="headerbox">
                <label><?php echo $data['Name'] ?> </label>
            </div>
            <div class="headerbox">
                <label> <?php echo $data['RestaurantID'] ?> </label>
            </div>
            <br>
            <div class="bottombox">
                <label> <?php echo $data['Opening_Times'] ?></label>
            </div>
            <div class="bottombox">
                <label> <?php echo $data['Opening_Days'] ?></label>
            </div><br>
            <a class="editprofile" href="Edit-Acc-Restaurant.php"> Edit Profile -></a>
        </div>
    </div>

    <div class="underheadbar">
        <div class="buttoncontainer">
            <button class="previousorders"> Menu List </button>\ &nbsp; &nbsp;
            <! –– for Spacing inbetween buttons ––>
            <button class="previousorders"> Previous Orders </button>
        </div>
    </div>


    <div class="bigbuttoncontainer">
        <div class="ordercontainer">

            <div class="orderidbox">
                Order ID
            </div>
            <table class="ordertable">
                <tr>
                    <th>SL NO.</th>
                    <th>REQUEST ORDERED</th>
                    <th>QUANTITY</th>
                    <th>PRICE</th>
                </tr>
                <tr>
                    <td> 1 </td>
                    <td> 1265 </td>
                    <td> 69420 </td>
                    <td> 5.9 </td>
                </tr>
            </table>
            <div class="totalpricebox">
                Total Price
            </div>
            <div class="statusbox">
                Status
            </div>
        </div>
    </div>

    <div class="div_footer">
        Footer
    </div>
</body>

</html>