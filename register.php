<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crickfinder</title>
</head>

<body>

    
    <link rel="stylesheet" href="register.css">


    <div class="zzz"><img class="bg" src="projectimage8.jpg" alt="project2img">
        <nav>
            <ul><div id="home">
                <li><a href="project.html">Home</a></li>
                </div>
            </ul>
        </nav>

        <div class="xyz">
            <div class="ff">
                <h4>Enter Your Details</h4>
                <form action="register.php" method="post" enctype="multipart/form-data" class="form1">


                    Name:<input type="text" name="name" id="name">
                    Gender: male<input type="radio" name="mygender" class="mygender" value="male">female <input type="radio" name="mygender" class="mygender" value="female">other<input type="radio" name="mygender" class="mygender" value="other">&nbsp &nbsp

                    Date of birth:<input type="date" name="date" id="dob"><br>
                    Address:<br><textarea name="address" id="address" rows="2"></textarea><br>
                    Mobile:<input type="tel" name="mobile" id="mobile" maxlength="10">
                    Uplode photo:<input type="file" name="photo" id="photo" value=""><br>
                    Create a password:<input type="text" name="password" id="password" maxlength="6" placeholder="use 6 letter,number or symbol "> <br>
                    <div class="btn">
            <input type="submit" name="submit" value="submit" class="butt">

          </div>
                </form>
            </div>


        </div>

    </div>
</body>

</html>
<?php
    $server="localhost";
    $username="root";
    $password="";
    $db="project";
    
    $con = mysqli_connect($server,$username,$password,$db);
    error_reporting(0);
    
    if(!$con)
    {
        die("connection to the database is failed due to".mysqli_connect_error());
    } 
       else{
            echo "";
       }
    if(isset($_POST['submit'])|| isset($_FILES['photo'])){
            $name = $_POST['name'];
            $mygender = $_POST['mygender'];
            $date = $_POST['date'];
            $address = $_POST['address'];
            $mobile = $_POST['mobile'];
            $pass = $_POST['password'];
            $photo = $_FILES['photo'];
            $filepath=$photo['tmp_name'];
            $filename=$photo['name'];
            $fileerror=$photo['error'];
            if($fileerror == 0){
                $destfile= 'upload/'.$filename;
                move_uploaded_file($filepath,$destfile);
     
                $insert= "INSERT INTO `project`.`project` (`Name`, `Gender`, `Date of birth`, `Address`,`Mobile`, `Photo`, `password`,`Date of submit`) VALUES ('$name', '$mygender', '$date', '$address', '$mobile', '$destfile', '$pass',current_timestamp());";
                $query = mysqli_query($con,$insert);
            }
    }
    else{
        echo "";
    }
    
?>