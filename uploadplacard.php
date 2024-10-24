<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="uploadplacard.css">
</head>
<body>
<nav>
    <ul>
        <div class="home">
      <li><a href="project.html">Home</a></li>
      
      </div>

    </ul>
  </nav>
    <center><h2>Upload the template below </h2></center> <div class="temp">
    <form action="uploadplacard.php" method="POST" enctype="multipart/form-data" class="placard_upload_form">
       <center>Upload template:<input type="file" name="placard1" value="">
        <input type="submit"value="submit"name="submit" class="submit"></center>
    </form></div>
</body>
</html>
<?php
     $server="localhost";
     $username="root";
     $password="";
     $db="project";
     
     $con = mysqli_connect($server,$username,$password,$db);
     
     if(!$con)
     {
         die("connection to the database is failed due to".mysqli_connect_error());
     } 
        else{
             echo "";
             
        }
     if(isset($_POST['submit'])|| isset($_FILES['placard1'])){
             
             $photo = $_FILES['placard1'];
     
             $filepath=$photo['tmp_name'];
             $filename=$photo['name'];
             $fileerror=$photo['error'];
             if($fileerror == 0){
                 $destfile= 'upload_placard/'.$filename;
                 move_uploaded_file($filepath,$destfile);
                 $insert="INSERT INTO `project`.`placard` (`placard_list`, `date of submit`) VALUES ('$destfile', current_timestamp());";
                 $query = mysqli_query($con,$insert);
             }
     }
     else{
         echo "";
     }
?>