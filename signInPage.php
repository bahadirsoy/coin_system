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
            <ul class="list-group">
                <?php
                    if(isset($_GET['result'])){
                        if($_GET['result'] == "wrongPassword"){
                            echo "
                             <li class='list-group-item text-danger fw-bold'>Hatalı giriş</li>
                            ";
                        }
                    }
                ?>
            </ul>
            <!-- Login Form -->
            <form action="Control/signInControl.php" method="POST">
                <input type="text" id="username" class="fadeIn second" name="username" placeholder="Username"
                value="<?php if(isset($_GET['username'])) echo $_GET['username']; ?>">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
                <input type="submit" class="fadeIn fourth" value="Log In">
            </form>

        </div>
    </div>
</body>

</html>