<?php
session_start();
/*Leon's Database*/
$mysqli = new mysqli("localhost", "root", 'Wirz140328', "uber");

/*Junior's Database
$mysqli = new mysqli("localhost", "root", '', "uber");*/

if ($mysqli->connect_errno) {
    echo $mysqli->connect_error;
}
if (isset($_SESSION['id-client'])) {
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
    background: url(Client\ Picture/" . $data['ClientID'] .  ".jpg);
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
            <button class="previousordersgrey"> Previous Orders</button>
        </div>
    </div>
    <div class="bigbuttoncontainer">
        <div class="tablecontainer">
            <table class="tablehistory">
                <tr>
                    <th>Ordering ID</th>
                    <th> Driver </th>
                    <th> Restaurant </th>
                    <th> Destination </th>
                    <th> Date </th>
                    <th> Departure Time </th>
                    <th> Arrival Time </th>
                    <th> Price </th>
                    <th> Rating </th>

                    <?php
                    
                    /*Leon's Database*/
                    $mysqli = new mysqli("localhost", "root", 'Wirz140328', "uber");

                    /*Junior's Database
                    $mysqli = new mysqli("localhost", "root", '', "uber");*/

                    if ($mysqli->connect_errno) {
                        echo $mysqli->connect_error;
                    }
                    if (isset($_SESSION['id-client'])) {
                        $clientid = $_SESSION['id-client'];

                        $query = "SELECT * FROM `client` WHERE `ClientID` = '$clientid'";
                        // print($query); 
                        $result = $mysqli->query($query);
                        if (!$result) {
                            echo $mysqli->error;
                        } else {
                            if (mysqli_num_rows($result) > 0) {
                                $_SESSION['id-client'] =  $clientid;
                                $x = 1;
                                while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
                                    // Do stuff with $data
                                    echo  "<tr>";
                                    echo '<td>Ordering ID</td>';
                                    echo '<td> Driver </td>';
                                    echo '<td> Restaurant </td>';
                                    echo '<td> Destination </td>';
                                    echo '<td> Date </td>';
                                    echo '<td> Departure Time </td>';
                                    echo '<td> Arrival Time </td>';
                                    echo '<td> Price </td>';
                                    echo '<td> Rating </td>';
                                    echo  "</tr>";
                                    $x++;
                                }
                            }
                        }
                    }
                    ?>
                </tr>
            </table>
        </div>
        <div class="bottombuttoncontainer">
            <button class="backicon" type="submit"><img src="Client Picture\backicon.png"></button>
            <button class="darkbutton"> Look for a Ride </button>

        </div>
    </div>




    <div class="div_footer">
        Footer


    </div>
</body>

</html>