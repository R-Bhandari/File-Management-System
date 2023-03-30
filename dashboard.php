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
      <a href="#">Log Out</a>
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
          <form action="" method="post">
            <input type="file" name="file" id="file" required />
            <input type="submit" value="Upload" id="file-upload" />
          </form>
        </div>
      </div>
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