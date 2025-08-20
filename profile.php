<?php
session_start();
$connection = new mysqli("localhost", "root", "", "practice");
echo $connection?"Connected":"Not connectd";
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$query = "select * from users where email='$email' and password='$password'";
$data = mysqli_query($connection, $query);
$x = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        h1{
            text-align: center;
            color : purple;
        }
        h2{
            text-align: center;
            color: grey;
        }
    </style>
</head>
<body>
    <h1>Wellcome  <?php echo $x['name']. "<br> Eamil = " . $x['email']?></h2>
</body>
</html>