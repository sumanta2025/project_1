<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body class="display">
    <link rel="stylesheet" href="display.css">
    <nav>
        <ul>
            <li><a href="project.html">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>
    </nav>
    <div class="table">
        <table>
            <thead>
                <tr>
                    <th class="" id="sl">Sl no </th>
                    <th class="" id="">Name </th>
                    <th class="" id="">Gender </th>
                    <th class="" id="">Date of birth </th>
                    <th class="" id="">Address </th>
                    <th class="" id="">Category </th>
                    <th class="" id="">Price </th>
                    <th class="" id="">per day/per match </th>
                    <th class="" id="">Mobile </th>
                    <th class="" id="">Photo </th>
                    <th class="" id="">career statistics </th>
                    <th class="" id="">Date of submit </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $server = "localhost";
                $username = "root";
                $password = "";
                $db = "project";
                $con = mysqli_connect($server, $username, $password, $db);
                $selectquery = "select * from project where `level` is not null";
                $query = mysqli_query($con, $selectquery);
                while ($result = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?php echo $result['slno'] ?></td>
                        <td><?php echo $result['Name'] ?></td>
                        <td><?php echo $result['Gender'] ?></td>
                        <td><?php echo $result['Date of birth'] ?></td>
                        <td><?php echo $result['Address'] ?></td>
                        <td><?php echo $result['Category'] ?></td>
                        <td><?php echo $result['Price'] ?></td>
                        <td><?php echo $result['per day/per match'] ?></td>
                        <td><?php echo $result['Mobile'] ?></td>
                        <td><img src="<?php echo $result['Photo'] ?>" width="90" height="100"></td>
                        <td><div class="stat"><?php echo $result['level'] ?> level player<br>
                            Match:- <?php echo $result['match played'] ?> &nbsp;
                            Total run:- <?php echo $result['total run'] ?><br>
                            Average:- <?php echo $result['average'] ?> &nbsp;
                            Highest score:- <?php echo $result['highest score'] ?><br>
                            Wicket taken:- <?php echo $result['wicket taken'] ?> &nbsp;
                            Economy:- <?php echo $result['economy'] ?>
                        </div>
                        </td>
                        <td><?php echo $result['Date of submit'] ?></td>
                    </tr>
                <?php
                }
        
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>