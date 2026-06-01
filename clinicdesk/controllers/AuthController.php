<?php

session_start();
include __DIR__ . "/../config/db.php";

$email = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($conn,
"SELECT * FROM users WHERE email='$email' AND password='$password'");

$user = mysqli_fetch_assoc($query);

if($user){

    $_SESSION['user'] = $email;

    header("Location: ../views/dashboard/index.php");
    exit;

} else {

    header("Location: ../views/auth/login.php?error=1");
    exit;
}