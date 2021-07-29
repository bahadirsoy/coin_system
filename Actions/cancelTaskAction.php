<?php

require "../SharedPHP/databaseConnection.php";

$taskId = $_GET['taskId'];

$sql = "DELETE FROM task WHERE id='$taskId'";

if ($conn->query($sql) === TRUE) {
    header("Location: ../mainTasks.php?result=deleted");
} else {
    echo "Error deleting record: " . $conn->error;
}