<?php

require "../SharedPHP/databaseConnection.php";

$departmantName = trim($_POST['departmantName']);
$username = trim($_POST['username']);
$password = trim($_POST['password']);

if (!isset($departmantName) || !isset($departmantName) || !isset($username) || !isset($password) || $username==="" || $password==="") {
    header("Location: ../adminAddDepartmant.php?result=empty&departmantName=".$departmantName."&username=".$username);
    exit();
} else{
    $sql = "SELECT * FROM departman WHERE username='$username' OR departmantName='$departmantName'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);
        print_r($row);

    } else if (mysqli_num_rows($result) == 0){

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO departman
        VALUES (NULL, '$departmantName', '$username', '$hashed_password', '0')";

        if ($conn->query($sql)) {
            header("Location: ../adminAddDepartmant.php?result=success");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    } else{
        echo "1 den fazla sonuç geldi SQL'de hata var.";
    }
}