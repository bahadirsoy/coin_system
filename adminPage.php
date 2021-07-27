<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="CSS/adminPage.css">
    <link rel="stylesheet" href="js/adminPage.js">

    <title>Coin System</title>

</head>

<body>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Welcome <?php echo $_SESSION['username']; ?>
                    </a>
                </li>
                <li>
                    <a href="#">Departmanlar</a>
                </li>
                <li>
                    <a href="#">Yeni Departman Ekle</a>
                </li>
                <li>
                    <a href="">Çıkış yap</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

    </div>
    <!-- /#wrapper -->
</body>

</html>