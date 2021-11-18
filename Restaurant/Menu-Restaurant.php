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
                <label> Chipotle California</label>
            </div>
            <div class="headerbox">
                <label> 51654897421354</label>
            </div>
            <br>
            <div class="bottombox">
                <label> Opening days</label>
            </div>
            <div class="bottombox">
                <label> Opening times</label>
            </div><br>
            <a class="editprofile" href=""> Edit Profile -></a>
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
                <tr>
                    <td>25 </td>
                    <td> Beese Churger </td>
                    <td> Hamburger</td>
                    <td> 295</td>
                    <td> 129</td>
                    <td> Patty, Bread, Lettuce, Sauce, Cheese </td>
                    <td> 593 </td>
                    <td> 250 g</td>
                    <td>Beautiful burger with amazing Texture</td>
                </tr>
            </table>

        </div>
        <div class="edittext">
            Edit
        </div>
        <div class="bottombuttoncontainer">
            <div class="darkbgbuttoncontainer">
                <button class="darkbutton"> Add Item </button>&nbsp; &nbsp;
                <! –– for Spacing inbetween buttons ––>
                <button class="darkbutton"> Delete Item </button>
            </div>
        </div>
    </div>
    <div class="div_footer">
        Footer


    </div>
</body>

</html>