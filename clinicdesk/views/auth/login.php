H<?php
session_start();
include __DIR__ . "/../../config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($conn,

    "SELECT * FROM users
    WHERE email='$email'
    AND password='$password'");

    if(mysqli_num_rows($query) > 0){

        $_SESSION['email'] = $email;

        header("Location: ../dashboard/index.php");
        exit;

    } else {

        $error = "Invalid Email or Password";

    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Login</title>

<style>

body{
    margin:0;
    padding:0;
    font-family:Arial;
    background:#0f172a;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.login-box{
    width:350px;
    background:white;
    padding:40px;
    border-radius:15px;
    box-shadow:0 0 20px rgba(0,0,0,0.3);
}

.login-box h1{
    text-align:center;
    margin-bottom:30px;
    color:#0f172a;
}

.input-box{
    margin-bottom:20px;
}

.input-box input{
    width:100%;
    padding:12px;
    border:1px solid #ccc;
    border-radius:8px;
    font-size:16px;
}

button{
    width:100%;
    padding:12px;
    background:#2563eb;
    color:white;
    border:none;
    border-radius:8px;
    font-size:16px;
    cursor:pointer;
}

button:hover{
    background:#1d4ed8;
}

.error{
    color:red;
    text-align:center;
    margin-bottom:15px;
}

</style>

</head>

<body>

<div class="login-box">

<h1>ClinicDesk</h1>

<?php if(isset($error)) { ?>

<p class="error">

<?= $error ?>

</p>

<?php } ?>

<form method="POST">

<div class="input-box">

<input type="email"
name="email"
placeholder="Email"
required>

</div>

<div class="input-box">

<input type="password"
name="password"
placeholder="Password"
required>

</div>

<button type="submit">

Login

</button>

</form>

</div>

</body>

</html>