<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="welcome.css">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

</head>

<body class="display">
<img class="bg3" src="projectimage15.webp" alt="project2img">
  
  <nav>
    <ul>
      <li><a href="project.html">Home</a></li>
      <li><a href="aboutus.html">About Us</a></li>
      <div class="logout">
        <li><a href='logout.php'>Logout</a></li>
      </div>

    </ul>
  </nav>

  <div class="table">

    <?php
    session_start();

    $n = $_SESSION['user'];
    $p = $_SESSION['pass'];

    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "project";

    $con = mysqli_connect($server, $username, $password, $db);

    $selectquery = "select * from project where (Password='$p' and name='$n');";

    $query = mysqli_query($con, $selectquery);

    while ($result = mysqli_fetch_array($query)) {
    ?>
      <h3 class="welname"><?php echo "Welcome " . $_SESSION['user'] . " !" ?></h3>
      <div class="upload_placard"><a href="update.php">career information</a></div>
      <div class="myinfo">
        
        <div class="info">
          <h5>Your Entire Information</h5>
          <?php echo "<a>NAME : </a>" . $result['Name'] ?><br>
          <?php echo "<a>GENDER : </a>" . $result['Gender'] ?><br>
          <?php echo "<a>DOB : </a>" . $result['Date of birth'] ?><br>
          <?php echo "<a>ADDRESS : </a>" . $result['Address'] ?><br>
          <?php echo "<a>PHONE : </a>" . $result['Mobile'] ?><br><br>
          <center><img src="<?php echo $result['Photo'] ?>" class="myimage"></center>
        </div>
        <div class="upload_placard" id="uploadplacard"><br><a href="uploadplacard.php">upload templates</a></div>
      </div>
    <?php
    }
    ?>
  </div>

  <?php
  if (isset($_SESSION['user'])) { 
  } else {
    header("Location:loginpage.php"); 
  }
  ?>
</body>
</html>