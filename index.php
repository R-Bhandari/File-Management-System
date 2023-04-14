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
        window.location.href = 'index.php';
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
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            echo "<script> window.location.href = 'dashboard.php' </script>";
        }else {
            echo "<script> alert('Password is Wrong');
            window.location.href = 'index.php';
            </script>";
        }
    } else {
        echo "<script> alert('No such username exist. Kindly check your username or register yourself');
        window.location.href = 'index.php';
        </script>";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RDRS | FMS</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="/images/favicon.ico">
</head>
<body>
    <section class="login">
        <div class="login-box">
            <h1>Cloudi-fi</h1>
            <div class="form-login">
                <h2>Login</h2>
                <form action="index.php" method="post" id="login-form">
                    <!-- <label for="">Username</label> -->
                    <input type="text" name="username" id="username" placeholder="Enter Your Username" required>
                    
                    <!-- <label for="">Password</label> -->
                    <input type="password" name="password" id="password" placeholder="Enter Your Password" required>
    
                    <input type="submit" value="Login" id="form-submit">
                </form>
                <p>Don't have an account? <a href="signup.html" id="signup-link">Sign up</a></p>
            </div>
        </div>
    </section>
    <section class="footer">
        <div class="footer-content">
            <p>Designed and prepared by <br> Ragahv, Divyansh, Ritik, Sambhav, Priyanshu</p>
        </div>
    </section>
</body>
<script src="script.js"></script>
</html>