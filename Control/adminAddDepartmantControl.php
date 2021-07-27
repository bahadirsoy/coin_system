<?php

require "../SharedPHP/databaseConnection.php";

$departmantName = trim($_POST['departmantName']);
$username = trim($_POST['username']);
$password = trim($_POST['password']);

if (!isset($departmantName) || !isset($departmantName) || !isset($username) || !isset($password) || $username==="" || $password==="") {
    header("Location: ../adminAddDepartmant.php?result=empty&departmantName=".$departmantName."&username=".$username);
    exit();
} else{
    exit("asd");
}