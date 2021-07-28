<?php

require "../SharedPHP/databaseConnection.php";
session_start();

$consumerId = $_POST['consumerId'];
$title = trim($_POST['title']);
$description = trim($_POST['description']);
$coin = trim($_POST['coin']);

//exit($consumerId);

if (!isset($title) || !isset($description) || !isset($coin) || $title==="" || $description==="" || $coin==="") {
    header("Location: ../mainTaskDemand.php?result=empty");
    exit();
} else if($coin < 0){
    header("Location: ../mainTaskDemand.php?result=negativeCoin");
    exit();
} else{

    $demandingId = $_SESSION['id'];

    $sql = "INSERT INTO task
    VALUES (NULL, '$demandingId', '$consumerId', '$title', '$description', '$coin', '0')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../mainTaskDemand.php?result=success");
        exit();
    } else {
        echo "Veri tabanına yeni task eklerken hata oldu: " . $sql . "<br>" . $conn->error;
    }
}