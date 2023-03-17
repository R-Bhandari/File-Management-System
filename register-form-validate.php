<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $servername = 'localhost';
    $db = "cloudi-fi";
    $username = "root";
    $password = "";
    // $conn = mysqli_connect($servername, $username, $password);
    $conn = mysqli_connect($servername, $username, $password, $db);

    if (!$conn) die("Couldn't connect" . mysqli_connect_error());
    else echo "Success";

    // $sql = "CREATE DATABASE `cloudi-fi`";
    // $result = mysqli_query($conn, $sql);

    // if ($result) echo "Database Created";
    // else echo "Error : " . mysqli_error($conn);

    // $sql = "CREATE TABLE `$db`.`users` (`name` VARCHAR(25) NOT NULL , `email` VARCHAR(25) NOT NULL , `phone_number` INT(10) NOT NULL , `user_name` VARCHAR(25) NOT NULL , `password` VARCHAR(16) NOT NULL , PRIMARY KEY (`user_name`)) ENGINE = InnoDB";
    // $result = mysqli_query($conn, $sql);

    // if($result) echo "Table created";
    // else echo "Error : " . mysqli_error($conn);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pnumber = $_POST['pnumber'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `users` (`name`, `email`, `phone_number`, `user_name`, `password`) VALUES ('$name', '$email', '$pnumber', '$username', '$password')";
    $result = mysqli_query($conn, $sql);

    echo "<br>";

    if ($result) echo "Registered Succesfully <script> alert('You have been registered successfully !!!') 
    window.location.href = 'index.html'</script>";
    else echo "<script> window.location.href = 'signup.html'</script>";
    
}

?>