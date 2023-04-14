<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $servername = 'localhost';
    $db = "cloudi-fi";
    $username = "root";
    $password = "";
    
    try {
        // $conn = mysqli_connect($servername, $username, $password);
        $conn = mysqli_connect($servername, $username, $password, $db);
        echo "Success";
    } catch (Exception $e) {
        echo "<script> alert('Sorry!!! Could not connect to database. Try some time later'); 
        window.location.href = 'signup.html';
        </script>";
        die("Couldn't connect" . mysqli_connect_error());
    }


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
    $password = password_hash($password, PASSWORD_BCRYPT);
    if (!$password) {
        die("Some error occurred." . "
        <script>
        alert('Some error occured. Try again !!!');
        window.location.href='signup.html';
        </script>   
        ");
    }

    try {
        $sql = "INSERT INTO `users` (`name`, `email`, `phone_number`, `user_name`, `password`) VALUES ('$name', '$email', '$pnumber', '$username', '$password')";
        $result = mysqli_query($conn, $sql);

        echo "<br>";
    
        if ($result) echo "Registered Succesfully <script> alert('You have been registered successfully !!!') 
        window.location.href = 'index.php'</script>";
        else echo "<script> window.location.href = 'signup.html'</script>";
    } catch (Exception $e) {
        echo "Registered Succesfully <script> alert('This Username already exists. Try different username') 
        window.location.href = 'signup.html'</script>";
    }

    
}

?>