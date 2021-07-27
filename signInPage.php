<!DOCTYPE html>
<html lang="en">

<head>

    <?php
        require "SharedHTML/head.php";
    ?>
    
    <link rel="stylesheet" href="CSS/signInPage.css">

</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">

            <!-- Login Form -->
            <form action="Control/signInControl.php" method="POST">
                <input type="text" id="username" class="fadeIn second" name="username" placeholder="Username">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
                <input type="submit" class="fadeIn fourth" value="Log In">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a>
            </div>

        </div>
    </div>
</body>

</html>