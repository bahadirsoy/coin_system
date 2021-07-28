<!DOCTYPE html>
<html lang="en">

<head>

    <?php
        require "SharedHTML/head.php";
        require "SharedPHP/databaseConnection.php";
    ?>

    <link rel="stylesheet" href="CSS/navbar.css">

</head>

<body>

    <?php
        require "SharedHTML/mainSidebar.php";
        $sessionId = $_SESSION['id'];
        
        $sql = "SELECT * FROM departman WHERE id = '$sessionId'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            $row = $result->fetch_assoc();
            $departmantName = $row['departmantName'];
            $username = $row['username'];

        } else {
            echo "0 results";
        }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-10 mt-3">
                <div class="mb-3">
                    <label for="departmantName" class="form-label">Departman Adı</label>
                    <form
                        action="Actions/mainUpdateDepartmantAction.php?id=<?php echo $sessionId; ?>&field=departmantName"
                        method="POST">
                        <input value="<?php echo $departmantName; ?>" type="text" class="form-control"
                            id="departmantName" name="departmantName" placeholder="Departmant Adı">
                        <button type="submit" class="btn btn-info btn-sm mt-1">Güncelle</button>
                    </form>
                </div>

                <div class="mb-3">
                    <label for="userName" class="form-label">Username</label>
                    <form
                        action="Actions/mainUpdateDepartmantAction.php?id=<?php echo $sessionId; ?>&field=username"
                        method="POST">
                        <input value="<?php echo $username; ?>" type="text" class="form-control"
                            id="userName" name="userName" placeholder="Username">
                        <button type="submit" class="btn btn-info btn-sm mt-1">Güncelle</button>
                    </form>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <form
                        action="Actions/mainUpdateDepartmantAction.php?id=<?php echo $sessionId; ?>&field=password"
                        method="POST">
                        <input type="text" class="form-control"
                            id="password" name="password" placeholder="Password">
                        <button type="submit" class="btn btn-info btn-sm mt-1">Güncelle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>