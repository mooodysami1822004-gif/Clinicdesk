<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "clinicdesk_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("DB Connection Failed");
}

?>