<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $servername = 'localhost';
    $db = "cloudi-fi";
    $username = "root";
    $password = "";
    $relation = 'users';

    $conn = mysqli_connect($servername, $username, $password, $db);

    if (!$conn) die("Coudln't Connect : " . mysqli_connect_error());
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $q1 = "SELECT * FROM $relation WHERE `user_name` = '$username' and `password` = '$password'";
    
    $log = mysqli_query($conn, $q1);
    $rows = mysqli_num_rows($log);
    echo $rows;

    if ($rows) {
        echo "<script> window.location.href = 'dashboard.html' </script>";
    } else {
        echo "<script> alert('Wrong username or password');
        window.location.href = 'index.html';
        </script>";
    }

}
?>