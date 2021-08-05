<!DOCTYPE html>
<html lang="en">

<head>

    <?php
        session_start();

        require "SharedHTML/head.php";
        require "SharedPHP/databaseConnection.php";
    ?>

    <link rel="stylesheet" href="CSS/adminPageSidebar.css">
    <link rel="stylesheet" href="js/adminPage.js">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-2">
                <?php 
                    require "SharedHTML/adminSidebar.php";
                ?>
            </div>
            <div class="col-10">
                <?php

                $targetId = $_GET['id'];

                $sql = "SELECT *, task.id AS taskId, datediff(curdate(), date) AS dateDiff
                FROM departman, task 
                WHERE departman.id = '$targetId' AND (task.demandingId = '$targetId' OR task.consumerId = '$targetId')
                AND isInProcess = '1'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {

                    $demandingName = $row['departmantName'];
                    $consumerId = $row['consumerId'];
                    $title = $row['title'];
                    $description = $row['description'];
                    $coin = $row['coin'];
                    $dateDiff = $row['dateDiff'];
                    $taskId = $row['taskId'];

                    $sql2 = "SELECT departmantName
                    FROM departman
                    WHERE id = '$consumerId'";

                    $result2 = $conn->query($sql2);
                    $row2 = $result2->fetch_assoc();
                    $consumerName = $row2['departmantName'];

                    if(($demandingName == $consumerName)){
                        $demandingId = $row['demandingId'];
                        $sql2 = "SELECT departmantName
                        FROM departman
                        WHERE id = '$demandingId'";

                        $result2 = $conn->query($sql2);
                        $row2 = $result2->fetch_assoc();
                        $consumerName = $row2['departmantName'];
                        $taskId = $row['taskId'];
                        
                        echo "
                        <div class='card mt-4'>
                            <div class='card-body d-flex justify-content-between'>
                                <div>
                                    <span class='card-text fw-bold'>".$consumerName."</span>
                                    <i class='fas fa-arrow-right mx-4'></i>
                                    <span class='card-text fw-bold'>".$demandingName."</span>
                                </div>

                                <div>
                                    <span class='fw-bold'>".strtoupper($title).": </span>
                                    ".$description."
                                </div>

                                <div class='mr-5'>
                                    ".$coin."
                                </div>
                                
                            </div>
                            <div class='card-footer text-muted'>
                                ".$dateDiff." gün önce"."
                            </div>
                        </div>
                        ";
                    } else{

                    echo "
                    <div class='card mt-4'>
                        <div class='card-body d-flex justify-content-between'>
                            <div>
                                <span class='card-text fw-bold'>".$demandingName."</span>
                                <i class='fas fa-arrow-right mx-4'></i>
                                <span class='card-text fw-bold'>".$consumerName."</span>
                            </div>

                            <div>
                                <span class='fw-bold'>".strtoupper($title).": </span>
                                ".$description."
                            </div>

                            <div class='mr-5'>
                                ".$coin."
                            </div>
                            
                        </div>
                        <div class='card-footer text-muted'>
                            ".$dateDiff." gün önce"."
                        </div>
                    </div>
                    ";
                    
                    }
                }
                } else {
                    echo "
                    <div class='container'>
                        <div class='alert alert-warning mt-5' role='alert' style='font-size: 30px;'>
                            Kabul edilmiş iş yok
                        </div>
                    </div>
                    ";
                }

                ?>
            </div>
        </div>
    </div>

    

</body>

</html>