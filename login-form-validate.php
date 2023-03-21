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

    $q1 = "SELECT 1 FROM $relation WHERE USER_NAME = $username";
    $q2 = "SELECT 1 FROM $relation WHERE PASSWORD = $password";

    $username = mysqli_query($conn, $q1);
    $password = mysqli_query($conn, $q2);

    if (!$username) {
        echo "<script> alert('Please sign up !!!');
        window.location.href = 'signup.html';
        </script>";
    } else if (!$password) {
        echo "<script> alert('Wrong Password !!!');
        window.location.href = 'index.html';
        </script>";
    } else {
        echo "<script> window.location.href = 'dashboard.html' </script>";
    }

}
?>