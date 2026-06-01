<?php

include __DIR__ . "/../../config/db.php";

$doctors_count =
mysqli_num_rows(mysqli_query($conn,
"SELECT * FROM doctors"));

$appointments_count =
mysqli_num_rows(mysqli_query($conn,
"SELECT * FROM appointments"));

$prescriptions_count =
mysqli_num_rows(mysqli_query($conn,
"SELECT * FROM prescriptions"));

$specializations_count =
mysqli_num_rows(mysqli_query($conn,
"SELECT * FROM specializations"));

?>

<!DOCTYPE html>
<html>

<head>

<title>Dashboard</title>

<style>

body{
    margin:0;
    font-family:Arial;
    background:#f4f4f4;
}

.sidebar{
    width:220px;
    height:100vh;
    background:#2c3e50;
    position:fixed;
    padding-top:20px;
}

.sidebar h2{
    color:white;
    text-align:center;
}

.sidebar a{
    display:block;
    color:white;
    padding:15px;
    text-decoration:none;
}

.sidebar a:hover{
    background:#34495e;
}

.content{
    margin-left:220px;
    padding:30px;
}

.box{
    background:white;
    padding:20px;
    border-radius:10px;
}

</style>

</head>

<body>

<div class="sidebar">

<h2>ClinicDesk</h2>

<a href="../doctors/index.php">Doctors</a>

<a href="../appointments/index.php">Appointments</a>

<a href="../prescriptions/index.php">Prescriptions</a>

<a href="../specializations/index.php">Specializations</a>

<a href="../auth/logout.php">Logout</a>

</div>

<div class="content">

<div class="box">

<h1>Dashboard</h1>

<hr><br>

<h3>Doctors:
<?= $doctors_count ?>
</h3>

<h3>Appointments:
<?= $appointments_count ?>
</h3>

<h3>Prescriptions:
<?= $prescriptions_count ?>
</h3>

<h3>Specializations:
<?= $specializations_count ?>
</h3>

</div>

</div>

</body>

</html>