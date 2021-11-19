<?php
session_start();

$mysqli = new mysqli("localhost", "root", 'Wirz140328', "uber");

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
        background: url(profileimg/" . $restaurantid . ".jpg);
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
            <form name="add-menuitem" action="" method="post">
                <div class="text_wrapper" style="margin-top:25;">
                    <label class="text_itemdi" style="padding-right: 35px;">Item ID</label>
                    <input type="text" name="itemid" class="text_field" placeholder=" Item ID"><br>
                </div>

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
                    <label class="text_amountsold"> Amount Sold </label>
                    <input type="text" name="amountsold" class="text_field" placeholder=" Amount Sold"><br>
                </div>

                <div class="text_wrapper">
                    <label class="text_portion" style="padding-right: 37px"> Portion </label>
                    <input type="text" name="portion" class="text_field" placeholder=" Portion"><br>
                </div>

                <div class="text_wrapper">
                    <label class="text_portion"> Description </label> <br>
                    <textarea name="w3review" rows="4" cols="50" class="text_area" placeholder=" Description" style="margin-left: 155px;"></textarea>
                </div>

                <div class="button">
                    <button type="submit" name="submit" value="Add" class="AddButton">Confirm</button>
                </div>
            </form>

            <div id="div_footer">

            </div>
        </div>

    </div>

    <div class="edittext">
        Edit
    </div>
    <div class="buttonbox">
        <button class="AddItemButton"> Add Item </button>
        <button class="DeleteItemButton"> Delete Item </button>
    </div>
    </div>

    <div class="div_footer">
        Footer


    </div>
</body>

</html>