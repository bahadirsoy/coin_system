<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "coin_system";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // Check connection
    if (!$conn) {
      die("Veritabanına bağlanılamadı: " . mysqli_connect_error());
    }
?>