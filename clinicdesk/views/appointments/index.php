<?php
include __DIR__ . "/../../config/db.php";

$result = mysqli_query($conn,
"SELECT * FROM appointments");
?>

<!DOCTYPE html>
<html>

<head>

<title>Appointments</title>

<style>

body{
    font-family:Arial;
    background:#f4f4f4;
}

.container{
    width:90%;
    margin:40px auto;
    background:white;
    padding:20px;
    border-radius:10px;
}

table{
    width:100%;
    border-collapse:collapse;
}

table th,
table td{
    border:1px solid #ccc;
    padding:10px;
    text-align:center;
}

table th{
    background:#005eff;
    color:white;
}

.btn{
    padding:5px 10px;
    color:white;
    text-decoration:none;
    border-radius:5px;
}

.add{
    background:green;
}

.status{
    padding:5px 10px;
    border-radius:5px;
    color:white;
}

.pending{
    background:orange;
}

.done{
    background:green;
}

</style>

</head>

<body>

<div class="container">

<h1 style="text-align:center;">

Appointments List

</h1>

<a href="add.php"
class="btn add">

Add Appointment

</a>

<br><br>

<table>

<tr>

<th>ID</th>
<th>Patient Name</th>
<th>Doctor ID</th>
<th>Date</th>
<th>Status</th>

</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>

<td><?= $row['id'] ?></td>

<td><?= $row['patient_name'] ?></td>

<td><?= $row['doctor_id'] ?></td>

<td><?= $row['appointment_date'] ?></td>

<td>

<span class="status pending">

<?= $row['status'] ?>

</span>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>

</html>