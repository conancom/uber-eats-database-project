<?php
session_start();
$mysqli = new mysqli("localhost", "root", '', "uber");


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



<body style="overflow-x: hidden;">

<div class="header" style="font-family: 'Kanit', sans-serif; z-index:999; cursor: pointer;" onclick="location.href='Restaurant-Main.php'">
        Uber Eats
    </div>

    <div class="header_details">
        <?php
        echo   "<div class='profilepic' style=' 
        width: 175px;
        height: 175px;
        left: 126px;
        top: 198px;
        background: url(restaurantimg/" . $restaurantid . ".jpg);
        border-radius: 202px;
        background-size: cover;
        margin-top: 1%;
        margin-left: 4%;
        align-items: center;';>";
        ?>
    </div>
    <div class="textgroup">
        <div class="headerbox">
            <label style="padding: 20px;"><?php echo $data['Name'] ?> </label>
        </div>
        <div class="headerbox">
            <label style="padding: 20px;"> <?php echo $data['RestaurantID'] ?> </label>
        </div>
        <br>
        <div class="bottombox">
            <label style="padding: 20px;"> <?php echo $data['Opening_Times'] ?></label>
        </div>
        <div class="bottombox">
            <label style="padding: 20px;"> <?php echo $data['Opening_Days'] ?></label>
        </div><br>
        <a class="editprofile" href="Edit-Acc-Restaurant.php" style="text-decoration: none; "> Edit Profile -></a>
    </div>
    </div>


    <div class="underheadbar">
        <div class="buttoncontainer">
            <button class="menulistonmenulist"> Menu List </button>\ &nbsp; &nbsp;
            <! –– for Spacing inbetween buttons ––>
                <button class="previousorders" onclick="location.href='Restaurant-History.php'"> Previous Orders </button>
        </div>
    </div>

    <div class="bigbuttoncontainer">
        <div class="tablecontainer">


            <table class="tablemenu">
                <tr>
                    <th>Item ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Calories</th>
                    <th>Ingredients</th>
                    <th>Amount Sold</th>
                    <th>Portion</th>
                    <th>Description</th>
                </tr>

                <?php

                if (isset($_SESSION['id-restaurant'])) {
                    $id  = $_SESSION['id-restaurant'];

                    $query = "SELECT *, `menuitem`.`MenuItemID` AS 'itemId'
                    FROM `restaurant`,`foodordering`,`foodpayment`,`menuiteminrestaurant`,`ordereditem`, `menuitem`
                    WHERE `restaurant`.`RestaurantID` = '$id'
                    AND `MenuItemInRestaurant`.`RestaurantID` = `Restaurant`.`RestaurantID`
                    AND `MenuItemInRestaurant`.`MenuItemID` = `menuitem`.`MenuItemID`
                    GROUP BY `menuitem`.`MenuItemID`;";
                    // print($query); 
                    $result = $mysqli->query($query);
                    if (!$result) {
                        echo $mysqli->error;
                    } else {
                        if (mysqli_num_rows($result) > 0) {

                            $x = 1;
                            while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
                                // Do stuff with $data
                                echo "<tr>";
                                echo '<td>' . $data['itemId'] . '</td>';
                                echo '<td> <a href="Menu-Restaurant-Edit.php?id=' . $data['itemId'] . '">' . $data['FoodName'] . '</td>';
                                echo '<td>' . $data['Type'] . '</td>';
                                echo '<td>' . $data['Price'] . '</td>';
                                echo '<td>' . $data['Calories'] . ' </td>';
                                echo '<td>' . $data['Ingredient'] . ' </td>';
                                echo '<td>' . $data['AmountSold'] . '</td>';
                                echo '<td>' . $data['Portion'] . '</td>';
                                echo '<td>' . $data['FoodDescription'] . '</td>';
                                echo  "</tr>";
                                $x++;
                            }
                        }
                    }
                }
                ?>

            </table>

        </div>
        <div class="edittext">
            <h2 style="letter-spacing: 5px; font-family: kanit;">Edit</h2>
        </div>
        <div class="bottombuttoncontainer">
            <div class="darkbgbuttoncontainer">
                <button class="darkbutton AddItemButton" onclick="location.href='Menu-Restaurant-Add.php'"> Add Item </button>&nbsp; &nbsp;
                <! –– for Spacing inbetween buttons ––>
                    <button class="darkbutton DeleteItemButton" onclick="location.href='Menu-Restaurant-Delete.php'"> Delete Item </button>
            </div>
        </div>
    </div>
    <div class="div_footer">
        <br>
    </div>
</body>

</html>