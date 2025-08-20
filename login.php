<?php
session_start();
$connection = new mysqli("localhost", "root", "", "practice");
echo $connection ? "Connected" : "Not connected";
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "select * from users where email='$email' and password='$password'";
    $data = mysqli_query($connection, $query);
    $n = mysqli_num_rows($data);
    if ($n == 1){
        echo "Login Successfully";
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        header("location: profile.php");
        exit();
    }else if($n >= 1){
        echo "MULtiple user are there";
    }else{
        echo "Invalid Mail or password";
    }
}
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
    h1{
        text-align: center;
        color: blue;
    }
    form {
        width: 300px;
        margin: 20px auto;
        padding: 15px;
        border: 1px solid #ccc;
        border-radius: 8px;
    }
    form input, 
    form button {
        display: block;     
        width: 100%;         
        padding: 10px;
        margin-bottom: 10px;  
        box-sizing: border-box;
    }
</style>
<body>
    <form method="POST">
        <h1>Login</h1>
        <input type="email" name="email" placeholder="Enter Your mail">
        <input type="password" name="password" placeholder="Enter Your Password">
        <button type="submit" name="submit">login</button>
    </form>
</body>
</html>