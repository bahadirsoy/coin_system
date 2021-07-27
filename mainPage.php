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
    <nav>
        <ul class="d-flex justify-content-between">
            <div class="d-flex justify-content-start">
                <li><a class="active" href="#home">Ana Sayfa</a></li>
                <li><a href="#news">Geçmiş</a></li>
                <li><a href="#contact">Profil</a></li>
            </div>
            
            <div class="d-flex justify-content-start">
                <li><a class="" href="#contact">İstekler</a></li>
                <li><a class="" href="#contact">İstek Gönder</a></li>
            </div>
        </ul>
    </nav>

    <main>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <span class="display-3">Diğer Departmanlar</span>
                </div>

                <div class="col-12 mt-4">
                    <div class="row">
                        <?php

                            $sql = "SELECT * FROM departman";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                echo '
                                    <div class="col-4">
                                        <div class="card"">
                                            <img src="..." class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
                                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                        </div>
                                    </div>
                                    ';
                            }
                            } else {
                                echo "Veritabanından verileri çekerken sorun oldu.";
                            }
                            mysqli_close($conn);
                            
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>