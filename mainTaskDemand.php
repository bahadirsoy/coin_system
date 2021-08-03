<?php
    require "SharedPHP/databaseConnection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php
        require "SharedHTML/head.php";
    ?>

    <link rel="stylesheet" href="CSS/navbar.css">

</head>

<body>

    <?php
        require "SharedHTML/mainSidebar.php";
    ?>

    <main>
        <div class="container mt-2">
            <div class="row">
                <?php
                    if(isset($_GET['result']))
                    {
                        if($_GET['result'] == "success")
                        {
                            echo "
                            <div class='alert alert-success fw-bold' role='alert'>
                                İş isteği başarılı
                            </div>
                        ";
                        }
                    }
                ?>
                <div class="col-12 mt-4">
                    <form action="Control/mainTaskDemandControl.php" method="POST">
                        <div class="mb-3">
                            <label for="consumerId" class="form-label">Kime</label>
                            <select class="form-control" name="consumerId" id="consumerId">
                                <option selected disabled>Departmant Seçiniz</option>
                                <?php

                                    $sessionId = $_SESSION['id'];

                                    $sql = "SELECT * FROM departman 
                                    WHERE isAdmin = '0' AND id != '$sessionId'
                                    ORDER BY departmantName";
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {

                                            $departmantName = $row['departmantName'];
                                            $departmantId = $row['id'];

                                            echo "
                                                <option value='".$departmantId."'>".$departmantName."</option>
                                            ";
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Başlık</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Açıklama</label>
                            <input type="text" class="form-control" name="description" id="description">
                        </div>
                        <div class="mb-3">
                            <label for="coin" class="form-label">Coin</label>
                            <input type="number" class="form-control" name="coin" id="coin">
                        </div>
                        <button type="submit" class="btn btn-primary">İş iste</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>