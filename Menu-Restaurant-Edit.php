<?php
session_start();

$mysqli = new mysqli("localhost", "root", '', "uber");

$menuitemId  = $_GET['id'];


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


if (isset($_SESSION['id-restaurant']) and isset($_GET['id'])) {

    $query1 = "SELECT * FROM `menuitem` WHERE `MenuItemID` = '$menuitemId '";
    // print($query); 
    $result1 = $mysqli->query($query1);
    if (!$result1) {
        echo $mysqli->error;
    } else {
        if (mysqli_num_rows($result1) > 0) {
            $data1 = $result1->fetch_array();
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
    $query = "UPDATE `menuitem` SET  `FoodName` = '$name', `FoodType` = '$type', `Price` = '$price', `Calories` = '$calories', `Ingredient` = '$ingredient', `Portion` = '$portion', `FoodDescription`= '$FoodDescription' 
    WHERE `MenuItemID` = '$menuitemId'";
    // print($query); 
    $result = $mysqli->query($query);
    if (!$result) {
        echo $mysqli->error;
    } else {


        if (file_exists('foodimg/' . $menuitemId . '.jpg')) {
            unlink('foodimg/' . $menuitemId . '.jpg');
        }


        move_uploaded_file($_FILES["my_file"]["tmp_name"], 'foodimg/' . $menuitemId . '.jpg');
        header("Location: Menu-Restaurant.php");


    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="Menu-Restaurant-Edit-Styling.css">
    <link rel="Stylesheet" href="restaurant.css">


</head>

<body>
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

    <div class="AddMenuFormContainer">
        <div class="div_content" class="form">
            <form name="add-menuitem" action="" method="post" enctype="multipart/form-data">

                <div class="text_wrapper">
                    <label class="text_name" style="padding-right: 47px"> Name </label>
                    <input type="text" name="name" class="text_field" placeholder=" Name" <?php echo 'value= "' . $data1['FoodName'] . '"'  ?>><br>
                </div>

                <div class="text_wrapper">
                    <label class="text_type" style="padding-right: 53px"> Type </label>
                    <input type="text" name="type" class="text_field" placeholder=" Type" <?php echo 'value= "' . $data1['FoodType'] . '"'  ?>><br>
                </div>

                <div class="text_wrapper">
                    <label class="text_price" style="padding-right: 52px"> Price </label>
                    <input type="text" name="price" class="text_field" placeholder=" Price" <?php echo 'value= "' . $data1['Price'] . '"'  ?>><br>
                </div>

                <div class="text_wrapper">
                    <label class="text_calories" style="padding-right: 31px"> Calories </label>
                    <input type="text" name="calories" class="text_field" placeholder=" Calories" <?php echo 'value= "' . $data1['Calories'] . '"'  ?>><br>
                </div>

                <div class="text_wrapper">
                    <label class="text_ingredients" style="padding-right: 13px"> Ingredients </label>
                    <input type="text" name="ingredients" class="text_field" placeholder=" Ingredients" <?php echo 'value= "' . $data1['Ingredient'] . '"'  ?>><br>
                </div>


                <div class="text_wrapper">
                    <label class="text_portion" style="padding-right: 37px"> Portion </label>
                    <input type="text" name="portion" class="text_field" placeholder=" Portion" <?php echo 'value= "' . $data1['Portion'] . '"'  ?>><br>
                </div>

                <div class="text_wrapper">
                    <label class="text_portion"> Description </label> <br>
                    <textarea name="FoodDescription" rows="4" cols="50" class="text_area" placeholder=" Description" style="margin-left: 155px;"> <?php echo $data1['FoodDescription'] ?> </textarea>
                </div>
                <br><br>

                Select Image to upload:
                <input type="file" name="my_file" />

                <br><br>

                <div class="button">
                    <input type="submit" name="submit-add" value="Add" class="AddButton"></button>
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
        Footer


    </div>
</body>

</html>