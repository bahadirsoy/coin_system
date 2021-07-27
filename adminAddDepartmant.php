<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php
        require "SharedHTML/head.php";
    ?>

    <link rel="stylesheet" href="CSS/adminPageSidebar.css">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-2">
                <?php
                    require "SharedHTML/adminSidebar.php";
                ?>
            </div>

            <div class="col-10 mt-3">
                <form action="Control/adminAddDepartmantControl.php" method="POST">
                    <div class="mb-3">
                        <label for="departmantName" class="form-label">Departman Adı</label>
                        <input type="text" class="form-control" id="departmantName" name="departmantName" placeholder="Departmant Adı">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Ekle</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>