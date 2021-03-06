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


if (isset($_SESSION['id-restaurant']) and isset($_POST['submit-add'])) {
    $restaurantid = $_SESSION['id-restaurant'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $calories = $_POST['calories'];
    $ingredient = $_POST['ingredients'];
    $portion = $_POST['portion'];
    $FoodDescription = $_POST['FoodDescription'];
    $query = "INSERT 
    INTO `menuitem` (`FoodName`, `FoodType`, `Price`, `Calories`, `Ingredient`, `AmountSold`, `Portion`, `FoodDescription`) 
    VALUES ('$name', '$type', '$price', '$calories', '$ingredient', '$portion', '$portion', '$FoodDescription') ";
    // print($query); 
    $result = $mysqli->query($query);
    if (!$result) {
        echo $mysqli->error;
    } else {
        move_uploaded_file($_FILES["my_file"]["tmp_name"], 'restaurantimg/menu/' . mysqli_insert_id($mysqli) . '.jpg');
        $insertedid =mysqli_insert_id($mysqli);
        $query1 = "INSERT INTO `menuiteminrestaurant` (`MenuItemID`, `RestaurantID`, `LimitedTimeDate`, `Discount`) 
        VALUES ('$insertedid', '$restaurantid', NULL, '0') ";
        // print($query); 
        $result1 = $mysqli->query($query1);
        if (!$result1) {
            echo $mysqli->error;
        } else {
            header("Location: Menu-Restaurant.php");

        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="Menu-Restaurant-Add-Styling.css">
    <link rel="Stylesheet" href="restaurant.css">


</head>

<body>
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
            <a class="editprofile" href="Edit-Acc-Restaurant.php" style="text-decoration: none;"> Edit Profile -></a>
        </div>
    </div>

    <div class="underheadbar">
        <div class="buttoncontainer">
            <button class="menulistonmenulist"> Menu List </button>\ &nbsp; &nbsp;
            <! ?????? for Spacing inbetween buttons ??????>
                <button class="previousorders" onclick="location.href='Restaurant-History.php'"> Previous Orders </button>
        </div>
    </div>

    <div class="AddMenuFormContainer">
        <div class="div_content" class="form">
            <form name="add-menuitem" action="" method="post" enctype="multipart/form-data">>

                <div class="text_wrapper">
                    <label class="text_name" style="padding-right: 47px"> Name </label>
                    <input type="text" name="name" class="text_field" placeholder=" Name"><br>
                </div>

                <div class="text_wrapper">
                    <label class="text_type" style="padding-right: 53px"> Type </label>
                    <input type="text" name="type" class="text_field" placeholder=" Type"><br>
                </div>

                <div class="text_wrapper">
                    <label class="text_price" style="padding-right: 52px"> Price </label>
                    <input type="text" name="price" class="text_field" placeholder=" Price"><br>
                </div>

                <div class="text_wrapper">
                    <label class="text_calories" style="padding-right: 31px"> Calories </label>
                    <input type="text" name="calories" class="text_field" placeholder=" Calories"><br>
                </div>

                <div class="text_wrapper">
                    <label class="text_ingredients" style="padding-right: 13px"> Ingredients </label>
                    <input type="text" name="ingredients" class="text_field" placeholder=" Ingredients"><br>
                </div>


                <div class="text_wrapper">
                    <label class="text_portion" style="padding-right: 37px"> Portion </label>
                    <input type="text" name="portion" class="text_field" placeholder=" Portion"><br>
                </div>

                <div class="text_wrapper">
                    <label class="text_portion"> Description </label> <br>
                    <textarea name="FoodDescription" rows="4" cols="50" class="text_area" placeholder=" Description" style="margin-left: 155px;"></textarea>
                </div>
                <br><br>

                <label style="color: white;">Select Image to upload:</label>
                <input  style="color: white; margin-left: 29%;" type="file" name="my_file" />

                <br><br>

                <div class="button">
                    <input type="submit" name="submit-add" value="Add" class="AddButton" ></button>
                </div>
            </form>

            <div id="div_footer">

            </div>
        </div>

    </div>

    <div class="edittext">

    </div>
    <div class="buttonbox">

    </div>
    </div>

    <div class="div_footer">
    <br>
    </div>
</body>

</html>