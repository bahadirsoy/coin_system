<!DOCTYPE html>
<html lang="en">

<head>

    <?php
        require "SharedHTML/head.php";
        require "SharedPHP/databaseConnection.php";
    ?>

    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css">

</head>

<body>

    <?php
        require "SharedHTML/mainSidebar.php";
        
        if(isset($_GET['result']))
        {
            if($_GET['result'] == "deleted")
            {
                echo "
                <div class='container'>
                    <div class='alert alert-info mt-2' role='alert'>
                        İstek iptal edildi.
                    </div>
                </div>
                ";
            } else if($_GET['result'] == "success")
            {
                echo "
                <div class='container'>
                    <div class='alert alert-success mt-2' role='alert'>
                        İstek kabul edildi.
                    </div>
                </div>
                ";
            }
        }
    ?>

    <?php

    $sessionId = $_SESSION['id'];

    $sql = "SELECT *, task.id AS taskId, datediff(curdate(), date) AS dateDiff
    FROM departman, task 
    WHERE departman.id = '$sessionId' AND (task.demandingId = '$sessionId' OR task.consumerId = '$sessionId')
    AND isInProcess = '0'";
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

        if($demandingName == $consumerName){
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

                    <div>
                        ".$coin."
                    </div>
                    
                    <div>
                        <a href='Actions/acceptTaskAction.php?taskId=".$taskId."' class='btn btn-primary'>Kabul et</a>
                        <a href='Actions/rejectTaskAction.php?taskId=".$taskId."' class='btn btn-danger'>Reddet</a>
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

                <div>
                    ".$coin."
                </div>
                
                <div>
                    <a href='Actions/cancelTaskAction.php?taskId=".$taskId."' class='btn btn-warning'>İptal et</a>
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
                İş isteği yok
            </div>
        </div>
        ";
    }

    ?>

    

</body>

</html>