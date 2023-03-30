<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $servername = 'localhost';
    $db = "cloudi-fi";
    $username = "root";
    $password = "";
    $relation = 'users';

    try {
        $conn = mysqli_connect($servername, $username, $password, $db);
    } catch (Exception $e) {
        echo "<script> alert('Sorry!!! Could not connect to database. Try some time later'); 
        window.location.href = 'index.html';
        </script>";
        die("Couldn't connect" . mysqli_connect_error());
    }

    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $q1 = "SELECT `user_name`, `password` FROM $relation WHERE `user_name` = '$username'";
    
    $log = mysqli_query($conn, $q1);
    $rows = mysqli_num_rows($log);
    echo $rows;

    if ($rows) {
        $user = mysqli_fetch_assoc($log);
        if (password_verify($password, $user['password'])) {
            echo "<script> window.location.href = 'dashboard.php' </script>";
        }else {
            echo "<script> alert('Password is Wrong');
            window.location.href = 'index.html';
            </script>";
        }
    } else {
        echo "<script> alert('No such username exist. Kindly check your username or register yourself');
        window.location.href = 'index.html';
        </script>";
    }

}
?>