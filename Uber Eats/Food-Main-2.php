<!DOCTYPE html>

<?php 

session_start();
/*Leon's Database
$mysqli = new mysqli("localhost", "root", 'Wirz140328', "uber");*/ 

/*Junior's Database*/ 
$mysqli = new mysqli("localhost", "root", '', "uber");

/* 
Functions:
- Address Label Shows the stored address in Client Database
- Restaurants: Shows the restaurants stored in the Restaurant Database (Add information in the database first) (Query)

- Category: Drop Down Menu for Food Types (DELETED)
- Restaurant: Drop Down Menu for List of Restaurants (Query)
- Promotion: Pop-up for promotion showcases (DONE)
*/ 

?>


<html>

<head>

    <!--This page should be a php-->
    <link rel="stylesheet" href="Food-Main-2-Styling.css">

    <!--Bootstrap-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <!--Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>

<body>

    <section class="Header">
        <div class="row">
            <div class="LogoContainer">
                <h1 style="color: white; padding-left: 15px;">U b e r</h1>
            </div>
        </div>
    </section>

    <section class="CategoryRow">
        <div class="row">

            <?php 
                $clientid = $_SESSION['id-client'];

                $query = "SELECT `Address` FROM `client` WHERE `ClientId` = '$clientid'";
                $result = $mysqli->query($query);

                $address = $result->fetch_array();

                echo '<div class="col AddressBoxCol">';
                echo '  <div class="AddressBox" style="width: 750px; height: 45px; background-color: rgba(255, 255, 255, 1.0);">';
                echo '      <label id="Address" class="Address" style="padding-left: 10px;">'.$address['Address'].'</label> ';
                echo '  </div>';
                echo '</div>';
            ?>

            <div class="col-2 CategoryCol">
                <div class="Category" style="position: relative;">
                    <a href="">
                        <!--
                        <p>Category ></p>
                        -->
                    </a>
                </div>
            </div>
            <div class="col-2 RestaurantCol">
                <div class="Restaurant" style="position: relative; ">
                    <a href=""> 
                        <!--    
                        <p>Restaurant ></p>
                        -->
                    </a>
                </div>
            </div>
            <div class="col-2 PromotionCol">
                <div class="Promotion" style="position: relative; padding-right: 10px;">

                    <!--<a href="">
                        <p>Promotion ></p>
                    </a>-->

                    <button id="myBtn" style="border: none; background-color: #FFAD53; padding: 5px; border-radius: 10px; font-size: 25px;">Open Modal</button>
                    <!-- The Modal -->
                    <div id="myModal" class="modal">
                    <!-- Modal content -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <span class="close">&times;</span>
                                <h2>Promotion</h2>
                            </div>
                            <div class="modal-body">
                                <p>Promotion 1</p>
                                <p>Promotion 2</p>
                                <p>Promotion 3</p>
                                <p>Promotion 4</p>
                            </div>
                            <div class="modal-footer">
                                <h3>Uber Eats</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php 
    
        $query2 = "SELECT * FROM `restaurant`";
        $result2 = $mysqli->query($query2);

        /*
        $count = 0;
        while ($row2=$result2->fetch_array()) {
            $rowCount = 0;
            echo '<section class="MainSelections">';
            if ($count <= 3) {
                echo '<div class="row OrderRow FirstRow">';
                echo '  <div class="col-md-4">';
                echo '      <h3>'.$row2['Name'].'</h3>';
                echo '      <div class="RestaurantContainer">';
                echo '          <img src="UI Pictures/'.$row2[$rowCount].'.jpg" alt="Previous Order 1">';
                echo '       </div>';
                echo '  </div>';
                echo '</div>';
                $count = $count + 1;
                $rowCount = $rowCount + 1;
            } elseif ($count > 3 or $count == 6) {
                echo '<div class="row OrderRow MiddleRow">';
                echo '  <div class="col-md-4">';
                echo '      <h3>'.$row2['Name'].'</h3>';
                echo '      <div class="RestaurantContainer">';
                echo '          <img src="UI Pictures/'.$row2[$rowCount].'.jpg" alt="Previous Order 1">';
                echo '       </div>';
                echo '  </div>';
                echo '</div>';
                $count = $count + 1;
                $rowCount = $rowCount + 1;
            } elseif ($count > 6 or $count == 9) {
                echo '<div class="row OrderRow LastRow" style="margin-bottom: 50px;">';
                echo '  <div class="col-md-4">';
                echo '      <h3>'.$row2['Name'].'</h3>';
                echo '      <div class="RestaurantContainer">';
                echo '          <img src="UI Pictures/'.$row2[$rowCount].'.jpg" alt="Previous Order 1">';
                echo '       </div>';
                echo '  </div>';
                echo '</div>';
                $count = $count + 1;
                $rowCount = $rowCount + 1;
            } elseif ($count > 9) {
                break;
            }
            
            echo '</section>';
        }
        */

        $name = array(); /*Storing the name indexing*/ 
        $index = 0;
        while ($row2=$result2->fetch_array()) {
            $name[$index] = $row2;
            $index++;
        }

        $count = 0;
        $rowCount = 0;
        echo '<section class="MainSelections">';

        /*First Row*/ 
        echo '<div class="row OrderRow FirstRow">';
        echo '  <div class="col-md-4">';
        echo '      <h3>'.$name[$rowCount]['Name'].'</h3>';
        echo '      <div class="RestaurantContainer">';
        echo '          <img src="UI Pictures/'.$name[$rowCount]['RestaurantID'].'.jpg" alt="Previous Order 1">';
        echo '       </div>';
        echo '  </div>';

        $count = $count + 1;
        $rowCount = $rowCount + 1;
        /*echo '<label> '.$rowCount.'</label>';*/

        echo '  <div class="col-md-4">';
        echo '      <h3>'.$name[$rowCount]['Name'].'</h3>';
        echo '      <div class="RestaurantContainer">';
        echo '          <img src="UI Pictures/'.$name[$rowCount]['RestaurantID'].'.jpg" alt="Previous Order 2">';
        echo '      </div>';
        echo '  </div>';
        
        
        $count = $count + 1;
        $rowCount = $rowCount + 1;  
        
        echo '  <div class="col-md-4">';
        echo '      <h3>'.$name[$rowCount]['Name'].'</h3>';
        echo '      <div class="RestaurantContainer">';
        echo '          <img src="UI Pictures/'.$name[$rowCount]['RestaurantID'].'.jpg" alt="Previous Order 3">';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
        
        $count = $count + 1;
        $rowCount = $rowCount + 1;  
        
        /*Second Row*/
        echo '  <div class="row OrderRow MiddleRow">';
        echo '      <div class="col-md-4">';
        echo '          <h3>'.$name[$rowCount]['Name'].'</h3>';
        echo '          <div class="RestaurantContainer">';
        echo '              <img src="UI Pictures/'.$name[$rowCount]['RestaurantID'].'.jpg" alt="Previous Order 1">';
        echo '          </div>';
        echo '      </div>';

        $count = $count + 1;
        $rowCount = $rowCount + 1;  

        echo '      <div class="col-md-4">';
        echo '          <h3>'.$name[$rowCount]['Name'].'</h3>';
        echo '          <div class="RestaurantContainer">';
        echo '              <img src="UI Pictures/'.$name[$rowCount]['RestaurantID'].'.jpg" alt="Previous Order 1">';
        echo '          </div>';
        echo '      </div>';
                
        $count = $count + 1;
        $rowCount = $rowCount + 1;     
                    
        echo '      <div class="col-md-4">';
        echo '          <h3>'.$name[$rowCount]['Name'].'</h3>';
        echo '          <div class="RestaurantContainer">';
        echo '              <img src="UI Pictures/'.$name[$rowCount]['RestaurantID'].'.jpg" alt="Previous Order 1">';
        echo '          </div>';
        echo '      </div>';
        echo '  </div>';
            
        $count = $count + 1;
        $rowCount = $rowCount + 1;  
            
        /*Third Row*/
        echo '  <div class="row OrderRow MiddleRow">';
        echo '      <div class="col-md-4">';
        echo '          <h3>'.$name[$rowCount]['Name'].'</h3>';
        echo '          <div class="RestaurantContainer">';
        echo '              <img src="UI Pictures/'.$name[$rowCount]['RestaurantID'].'.jpg" alt="Previous Order 1">';
        echo '          </div>';
        echo '      </div>';

        $count = $count + 1;
        $rowCount = $rowCount + 1;

        echo '      <div class="col-md-4">';
        echo '          <h3>'.$name[$rowCount]['Name'].'</h3>';
        echo '          <div class="RestaurantContainer">';
        echo '              <img src="UI Pictures/'.$name[$rowCount]['RestaurantID'].'.jpg" alt="Previous Order 1">';
        echo '          </div>';
        echo '      </div>';
                
        $count = $count + 1;
        $rowCount = $rowCount + 1;     
                    
        echo '      <div class="col-md-4">';
        echo '          <h3>'.$name[$rowCount]['Name'].'</h3>';
        echo '          <div class="RestaurantContainer">';
        echo '              <img src="UI Pictures/'.$name[$rowCount]['RestaurantID'].'.jpg" alt="Previous Order 1">';
        echo '          </div>';
        echo '      </div>';
        echo '  </div>';
            
        $count = $count + 1;
        $rowCount = $rowCount + 1;  

        echo '</section>';
    ?>

    <script>

        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script

</body>

</html>

<!--

    Old HTML Codes 

    
    <div class="col-md-4">
                <h3>Restaurant Name</h3>
                <div class="RestaurantContainer">
                    <img src="UI Pictures/pexels-2.jpg" alt="Previous Order 2">
                </div>
            </div>

            <div class="col-md-4">
                <h3>Restaurant Name</h3>
                <div class="RestaurantContainer">
                    <img src="UI Pictures/pexels-3.jpg" alt="Previous Order 3">
                </div>
            </div>
        </div>

        <div class="row OrderRow LastRow" style="margin-bottom: 50px;">

            <div class="col-md-4">
                <h3>Restaurant Name</h3>
                <div class="RestaurantContainer">
                    <img src="UI Pictures/pexels-1.jpg" alt="Previous Order 1">
                </div>
            </div>

            <div class="col-md-4">
                <h3>Restaurant Name</h3>
                <div class="RestaurantContainer">
                    <img src="UI Pictures/pexels-2.jpg" alt="Previous Order 2">
                </div>
            </div>

            <div class="col-md-4">
                <h3>Restaurant Name</h3>
                <div class="RestaurantContainer">
                    <img src="UI Pictures/pexels-3.jpg" alt="Previous Order 3">
                </div>
            </div>
        </div>
    </section>

    
            <div class="col AddressBoxCol">
                <div class="AddressBox">
                    <input type="text" id="Address" name="Address" placeholder="Address" size="20">
                </div>
            </div>
            
-->