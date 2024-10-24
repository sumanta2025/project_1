<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<link rel="stylesheet" href="placardlist.css">
<nav>
        <ul><div id="home">
            <li><a href="project.html">Home</a></li>
             </div>
        </ul>
    </nav>
</body>

</html>
<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "project";

$con = mysqli_connect($server, $username, $password, $db);

$selectquery = "select * from placard";

$query = mysqli_query($con, $selectquery);

// $result= mysqli_fetch_array($query);
while ($result = mysqli_fetch_array($query)) {
?>
    <tr>
        <td class="placard2">
        <img src="<?php echo $result['placard_list'] ?>" width="auto" height="320">
        </td>
    </tr>

<?php
}
?>