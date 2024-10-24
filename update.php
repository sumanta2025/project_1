<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="update.css">
</head>

<body>


  <nav>
    <ul>
      <li><a href="project.html" id="home1">Home</a></li>
      <div class="logout">
        <li><a href='logout.php'>Logout</a></li>
      </div>
    </ul>
  </nav>
  
  <div class="career">
    <form action="update.php" method="post" class="careerform">
      <center>
        <h5>register or update Your Career Info and price</h5>
      </center>
      State level player<input type="radio" name="state" id="state" value="state">District level player<input type="radio" name="state" id="state" value="district"><br>
      Category:
      <select class="sel" id="category" name="category" id="category">
        <option value="" disabled selected>--select--</option>
        <option value="Top order batsman">Top order batsman</option>
        <option value="Middle order batsman">Middle order batsman</option>
        <option value="Batsman + wicket keeper">Batsman + wicket keeper</option>
        <option value="Spin bowler">Spin bowler</option>
        <option value="Pace bowler">Pace bowler</option>
        <option value="Batting all-rounder">Batting all-rounder</option>
        <option value="Bowling all-rounder">Bowling all-rounder</option>
      </select><br>
      Total match played:<input type="number" name="newmplayed" id="mplayed" value="mplayed"> <br>
      Total run:<input type="number" name="newtrun" id="trun">
      Average:<input type="number" name="newavg" id="avg"> <br>
      Heighest score:<input type="number" name="newhs" id="hs"> <br>
      Total wicket taken:<input type="number" name="newtwicket" id="twicket">
      Economy:<input type="number" name="neweco" id="eco"><br>
      Price:<input type="number" name="price" id="price">
      per day<input type="radio" name="rate" id="rate" value="per day">per match<input type="radio" name="rate" id="rate" value="per match"><br>
      Password:<input type="password" name="newpassword" maxlength="6" id="pass2" placeholder="enter your current password to update information">
      <div class="btn">
        <input type="submit" name="submit" value="submit" class="butt">
      </div>
    </form>
  </div>
</body>

</html>

<?php
session_start();
?>


?>
<?php

$server = "localhost";
$username = "root";
$password = "";
$db = "project";

$con = mysqli_connect($server, $username, $password, $db);

if (!$con) {
  die("Connection to the database failed due to " . mysqli_connect_error());
} else {
  echo "";
}

if (isset($_POST['submit'])) {
  $level = $_POST['state'];
  $pass = $_POST['newpassword'];
  $match = $_POST['newmplayed'];
  $run = $_POST['newhs'];
  $average = $_POST['newavg'];
  $high_score = $_POST['newtwicket'];
  $wicket = $_POST['neweco'];
  $economy = $_POST['newtrun'];
  $category = $_POST['category'];
  $price = $_POST['price'];
  $rate = $_POST['rate'];



  $update = "UPDATE `project` SET `level`='$level',`category`='$category', `match played` = '$match',`total run` = '$run',`average` = '$average',`highest score` = '$high_score',`wicket taken` = '$wicket',`economy`= '$economy',`Price`='$price', `per day/per match`='$rate',`Date of submit` = current_timestamp()WHERE `password` = '$pass'";

  $query = mysqli_query($con, $update);

  if ($_SESSION['pass'] == $pass) {
    echo '<script>
              window.location.href="welcome.php";
              alert("Your new information is updated successfully")
      </script>';
  } else {
    echo '<script>
              window.location.href="update.php";
              alert("wrong password!!!")
      </script>';
  }
}
?>