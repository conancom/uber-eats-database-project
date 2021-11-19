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


if (isset($_POST['submit-remove']) and isset($_SESSION['id-restaurant'])) {
    $id  = $_SESSION['id-restaurant'];



    $query2 = "SELECT *, `menuitem`.`MenuItemID` AS 'itemId'
    FROM `restaurant`,`foodordering`,`foodpayment`,`menuiteminrestaurant`,`ordereditem`, `menuitem`
    WHERE `restaurant`.`RestaurantID` = '$id'
    AND `MenuItemInRestaurant`.`RestaurantID` = `Restaurant`.`RestaurantID`
    AND `MenuItemInRestaurant`.`MenuItemID` = `menuitem`.`MenuItemID`
    GROUP BY `menuitem`.`MenuItemID`;";

    // print($query); 
    $result2 = $mysqli->query($query2);
    if (!$result) {
        echo $mysqli->error;
    } else {

        if (mysqli_num_rows($result) > 0) {
            $x = 1;
            while ($data2 = $result2->fetch_array(MYSQLI_ASSOC)) {
                // Do stuff with $
                $itemtoremove = 'itemtoremove' . $data2['itemId'];
                if (isset($_POST[$itemtoremove])) {
                    $itemtoremove = $_POST[$itemtoremove];
                    $query1 = "UPDATE `menuiteminrestaurant` SET `RestaurantID` = NULL WHERE `MenuItemID` = '$itemtoremove' ";
                    $insert = $mysqli->query($query1);
                    if (!$insert) {
                        echo $mysqli->error;
                    } else {
                        header("Location: Menu-Restaurant.php");
                    }
                }
            }
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

    <div class="header">
        Header
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
            <button class="menulistonmenulist"> Menu List </button>\ &nbsp; &nbsp;
            <! –– for Spacing inbetween buttons ––>
                <button class="previousorders" onclick="location.href='Restaurant-History.php'"> Previous Orders </button>
        </div>
    </div>

    <div class="bigbuttoncontainer">
        <form name="form" method="post">
            <div class="tablecontainer">


                <table class="tablemenu">
                    <tr>
                        <th></th>
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
                                    echo '<td> <input type="checkbox" name="itemtoremove' . $data['itemId'] . '" value="' . $data['itemId'] . '"/></td>';
                                    echo '<td>' . $data['itemId'] . '</td>';
                                    echo '<td> ' . $data['FoodName'] . '</td>';
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
                Edit
            </div>
            <div class="bottombuttoncontainer">
                <div class="darkbgbuttoncontainer">
                    <button class="darkbutton"> Add Item </button>&nbsp; &nbsp;
                    <! –– for Spacing inbetween buttons ––>
                        <input name="submit-remove" type="submit" value="Delete Items" class="deletebutton" />
                </div>
            </div>
        </form>
    </div>

    <div class="div_footer">
        Footer


    </div>
</body>

</html>