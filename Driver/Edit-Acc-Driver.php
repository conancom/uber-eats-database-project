<!DOCTYPE html>
<html>

<head>
    <title>CSS326 Sample</title>
    <link rel="stylesheet" href="Edit-Acc-Driver-Styling.css">
</head>


<body>
    <div id="wrapper">
        <div id="div_header">
            Header
        </div>
        <div id="div_subhead">

        </div>

        <div id="div_content" class="form">
            <form action="user.php" method="post">
                <h1>Setting the World in Motion</h1>
                <!--%%%%% Main block %%%%-->
                <!--Form -->
                <div id="div_subcontent" class="form">

                    <form action="user.php" method="post">
                        <h2>Welcome to Uber!</h2>

                        <div class="center">
                            <input type="email" value="Email"><br><br>
                            <input type="password" value="Password"><br><br>
                            <input type="confirm password" value="Confirm Password"><br><br>
                            <input type="first name" value="First Name"><br><br>
                            <input type="last name" value="Last name"><br><br>

                            <label>Gender</label>
                            <input type="radio" name="gender" value="male" checked>Male
                            <input type="radio" name="gender" value="female">Female
                            <input type="radio" name="gender" value="others">Others<br><br>

                            <input type="occupation" value="Occupation"><br><br>
                            <input type="phone number" value="Phone Number"><br><br>
                            <input type="driver license id" value="Driver License ID"><br><br>
                            <input type="birth date" value="Birth Date">
                            <input type="birth month" value="Birth Month">
                            <input type="birth year" value="Birth Year"><br><br><br>

                        </div>
                    </form>
                </div>

                <div class="center">
                    <button type="submit" value="Submit" class="Submit">Submit</button><br><br>
                    <label>Terms and Agreement</label>
                </div>

        </div>
        <!-- end div_content -->
    </div>
    <!-- end div_main -->

    <div id="div_footer">
        Footer
    </div>

    </div>
</body>

</html>