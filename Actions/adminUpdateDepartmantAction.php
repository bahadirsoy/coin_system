<?php

require "../SharedPHP/databaseConnection.php";

$id = $_GET['id'];
$field = $_GET['field'];

switch($field){
    case "departmantName":

        $departmantName = $_POST['departmantName'];
        $sql = "UPDATE departman SET departmantName='$departmantName' WHERE id='$id'";

        if (mysqli_query($conn, $sql)) {
            header("Location: ../adminDepartmants.php?result=success");
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }

        break;

    case "username":
        
        $username = $_POST['userName'];
        $sql = "UPDATE departman SET username='$username' WHERE id='$id'";
        
        if (mysqli_query($conn, $sql)) {
            header("Location: ../adminDepartmants.php?result=success");
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }

        break;

    case "password":

        $password = $_POST['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE departman SET password='$hashedPassword' WHERE id='$id'";

        if (mysqli_query($conn, $sql)) {
            header("Location: ../adminDepartmants.php?result=success");
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    
        break;

    case "all":

        

        break;

    default:
        echo "adminUpdateDepartmantAction.php de switch defaulta girdi. Sıkıntı var";
        break;
}