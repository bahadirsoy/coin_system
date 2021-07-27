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
            <?php
                require "SharedHTML/adminSidebar.php";
            ?>

            <div class="col-10 mt-3">
                <div class="mb-3">
                    <label for="departmantName" class="form-label">Departman Adı</label>
                    <form
                        action="Actions/adminUpdateDepartmantAction.php?id=<?php echo $_GET['id']; ?>&field=departmantName"
                        method="POST">
                        <input value="<?php echo $_GET['departmantName'] ?>" type="text" class="form-control"
                            id="departmantName" name="departmantName" placeholder="Departmant Adı">
                        <button type="submit" class="btn btn-info btn-sm mt-1">Güncelle</button>
                    </form>
                </div>
                <div class="mb-3">
                    <label for="userName" class="form-label">Username</label>
                    <form
                        action="Actions/adminUpdateDepartmantAction.php?id=<?php echo $_GET['id']; ?>&field=username"
                        method="POST">
                        <input value="<?php echo $_GET['username'] ?>" type="text" class="form-control" id="userName"
                            name="userName" placeholder="Username">
                        <button type="submit" href="Actions/adminUpdateDepartmantAction.php?id=<?php echo $_GET['id']; ?>&field=username"
                            class="btn btn-info btn-sm mt-1">Güncelle</button>
                    </form>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <form
                        action="Actions/adminUpdateDepartmantAction.php?id=<?php echo $_GET['id']; ?>&field=password"
                        method="POST">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Password">
                        <button type="submit" href="Actions/adminUpdateDepartmantAction.php?id=<?php echo $_GET['id']; ?>&field=password"
                            class="btn btn-info btn-sm mt-1">Güncelle</button>
                    </form>
                </div>

                <form action="Control/adminAddDepartmantControl.php" method="POST">
                    <button type="submit" class="btn btn-primary btn-lg mt-3">Tümünü güncelle</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>