<?php
session_start();
$connection = new mysqli("localhost", "root", "", "practice");
echo $connection ? "Connected" : "Not connected";
// isset($_POST['submit'])
if($_SERVER["REQUEST_METHOD"] == "POST"){ 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "insert into users(name, email, password) values(?, ?, ?);";
    $x = $connection->prepare($query);
    $x -> bind_param("sss", $name, $email, $password);
    if($x->execute()){
        echo "User information inserted";
        header("location: login.php");
        exit();
    }else{
        echo "Erro";
        exit();
    }
    $x->close();
}
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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
        <h1>Registration</h1>
        <input type="text" name="name" placeholder="Enter Your Name">
        <input type="email" name="email" placeholder="Enter Your mail">
        <input type="password" name="password" placeholder="Enter Your Password">
        <button type="submit" name="submit">Registration</button>
    </form>
</body>
</html>