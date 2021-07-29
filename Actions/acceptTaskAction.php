<?php

require "../SharedPHP/databaseConnection.php";

$taskId = $_GET['taskId'];

$sql = "UPDATE task SET isInProcess='1' WHERE id='$taskId'";

if ($conn->query($sql) === TRUE) {
    header("Location: ../mainTaskDemands.php?result=success");
} else {
    echo "Error updating record: " . $conn->error;
}