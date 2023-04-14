<?php

session_start();
if (!isset($_SESSION['username'])) {
  header("location : index.php");
}

$servername = 'localhost';
$db = "cloudi-fi";
$username = "root";
$password = "";
$relation = 'files';

try {
  $conn = mysqli_connect($servername, $username, $password, $db);
} catch (Exception $e) {
  echo "<script> alert('Sorry!!! Could not connect to database. Try some time later'); 
      window.location.href = 'index.html';
      </script>";
  die("Couldn't connect" . mysqli_connect_error());
}

$userName = $_SESSION['username'];
// echo 'The username is : ' . $userName;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $targetDir = 'upload/';
  list($givenName, $extension) = explode('.', $_FILES['file']['name']);
  $_FILES['file']['name'] = time() . '.' . $extension;
  $fileName = $_FILES['file']['name'];
  // echo $fileName .'  '. $_FILES['file']['name'].' ' . $extension;
  $targetFile = $targetDir . basename($_FILES['file']['name']);
  // echo $targetFile;

  $sql = "INSERT INTO `files`(`user_name`, `file_name`, `given_name`, `extension`) VALUES ('$userName', '$fileName', '$givenName', '$extension')";
  try {
    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
      $result = mysqli_query($conn, $sql);
      echo "<script>
      alert('File uploaded successfully');
      </script>";
    }
  } catch (Exception $e) {
    echo "<script>
  alert('File is not uploaded successfully. Please try again later !!!');
  </script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard | Cloudify</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="shortcut icon" href="/images/favicon.ico" />
</head>

<body>
  <div class="nav-bar">
    <a href="logout.php">Log Out</a>
    <a href="#">Profile</a>
  </div>

  <div class="main-dashboard">
    <div class="side-bar">
      <h2>Dashboard</h2>
      <a href="#">Add File</a>
      <a href="#">View File</a>
    </div>

    <div class="display-area">
      <div class="add-file">
        <form action="dashboard.php" method="post" enctype="multipart/form-data">
          <input type="file" name="file" id="file" required />
          <input type="submit" value="Upload" id="file-upload" />
        </form>
      </div>
    </div>
  </div>

  <div class="view">
    <?php

    try {
      $sql = "select `given_name` from `files` where `user_name`='$userName'";
      $result = mysqli_query($conn, $sql);
      $rows = mysqli_num_rows($result);
      if ($rows > 0) {
        echo 'Some content is present <br>';
        while($row = mysqli_fetch_assoc($result)) {
          echo 'File present : ' . $row['given_name'];
          echo '<br>';
        }
      } else {
        echo 'Nothing is present';
      }
    }catch (Exception $e) {
      echo "Some error occured : ";
    }

    ?>

  </div>

  <!-- <div class="psuedo">
         <div class="topnav">
            <a href="#about">Log Out</a>
            <a href="#contact" id="user-profile">Profile</a>
        </div>
         <div id="mySidenav" class="sidenav" >
      <h2>  <a href="#">Dashboard</a></h2>
        <a href="#">Add File</a>
        <a href="#">View File</a>
        <form>
            <input type="submit" value="Log Out" id="form-submit">
        </form>
      </div> -->
  <!-- <div class="psuedo">

     </div> -->
  <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->

  <!-- <div id = "form_id420" class = "form_class420">
      <form id="addfile" class="dashboard-components">
    <input type="file" name="username" id="username" placeholder="Enter Your Username" required>
    <br>
    <input type="submit" value="Upload" id="file-submit">
      </form>
</div>
</div> -->
</body>
<script src="script.js"></script>

</html>