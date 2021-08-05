<?php

require "../SharedPHP/databaseConnection.php";

$username = trim($_POST['username']);
$password = trim($_POST['password']);

if (!isset($username) || !isset($password) || $username==="" || $password==="") {

    header("Location: ../signInPage.php?result=empty&username=".$username);
    exit();
  
} else{
    $sql = "SELECT * FROM Departman WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if(password_verify($password, $row['password'])){
            //Valid info start session
            session_start();

            $_SESSION['id']=$row['id'];
            $_SESSION['departmantName']=$row['departmantName'];
            $_SESSION['username']=$row['username'];
            $_SESSION['password']=$row['password'];
            $_SESSION['isAdmin']=$row['isAdmin'];
            
            if($_SESSION['isAdmin'] == 0){
                header("Location: ../mainPage.php");
            }
            else if($_SESSION['isAdmin'] == 1){
                header("Location: ../adminPage.php");
            } else{
                echo "Kullanıcı User ya da Admin değil";
            }
        } else{
            header("Location: ../signInPage.php?result=wrongPassword&username=".$username);
        }
    } else {
        header("Location: ../signInPage.php?result=wrongPassword&username=".$username);
    }
}