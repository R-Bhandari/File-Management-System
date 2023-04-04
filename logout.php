<?php

// if(!isset($_SESSION['username'])) {
//     header('location : index.php');
// }

session_start();
session_unset();
session_destroy();
try {
    if (!isset($_SESSION['username'])) {
        echo "<script>
        alert('You have been logged out successfully');
        window.location.href = 'index.php';
        </script>";
    }
} catch (error) {
    echo "You have been logged out";
}

?>