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

                                $departmantName = $row['departmantName'];

                                echo "
                                    <div class='col-lg-4 col-md-6 col-sm-12 mt-4'>
                                        <div class='card'>
                                            <div class='card-body'>
                                                <h5 class='card-title'>".$departmantName."</h5>
                                                <p class='card-text'>
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                                    Nam laboriosam tempore natus inventore aperiam praesentium vel voluptates voluptas cumque obcaecati!
                                                </p>
                                                <a href='#' class='btn btn-primary'>Aktivite</a>
                                                <a href='./mainTaskDemand.php' class='btn btn-warning'>Geçmiş</a>
                                            </div>
                                        </div>
                                    </div>
                                    ";
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