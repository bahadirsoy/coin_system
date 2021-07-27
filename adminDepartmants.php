<?php
    session_start();

    require "SharedPHP/databaseConnection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <?php
        require "SharedHTML/head.php";
    ?>

    <link rel="stylesheet" href="CSS/adminPageSidebar.css">
    <link rel="stylesheet" href="js/adminPage.js">


</head>

<body>
    <div class="container">
        <div class="row">
            <?php
                require "SharedHTML/adminSidebar.php";
            ?>

    <?php
        $sql = "SELECT * FROM departman WHERE isAdmin = '0'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {

            echo '
            <div class="col-10 mt-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Departman Adı</th>
                            <th scope="col">Kullanıcı Adı</th>
                        </tr>
                    </thead>

                    <tbody>
            ';

            // output data of each row
            while($row = $result->fetch_assoc()) {

                $departmantName = $row['departmantName'];
                $username = $row['username'];

                echo "
                        <tr>
                            <td>$departmantName</td>
                            <td>$username</td>
                        </tr>
                ";
            }

            echo '
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            ';

        } else {
            echo "Bütün departmantları çeken sorguda hata var: adminDepartmants.php";
        }
    ?>
</body>

</html>