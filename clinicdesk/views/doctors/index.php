<?php
include __DIR__ . "/../../config/db.php";

$result = mysqli_query($conn, "SELECT * FROM doctors");
?>

<!DOCTYPE html>
<html>

<head>

<title>Doctors</title>

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
    background:#004cff;
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

.edit{
    background:orange;
}

.delete{
    background:red;
}

</style>

</head>

<body>

<div class="container">

<h1 style="text-align:center;">
Doctors List
</h1>

<a href="add.php" class="btn add">

إضافة طبيب

</a>

<br><br>

<table>

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Specialization</th>
<th>Actions</th>

</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>

<td><?= $row['id'] ?></td>

<td><?= $row['full_name'] ?></td>

<td><?= $row['email'] ?></td>

<td><?= $row['phone'] ?></td>

<td>

<?php

$spec_id = $row['specialization_id'];

$spec_query = mysqli_query(
$conn,
"SELECT * FROM specializations WHERE id='$spec_id'"
);

$spec = mysqli_fetch_assoc($spec_query);

if($spec){
    echo $spec['name'];
} else {
    echo "No Specialization";
}

?>

</td>

<td>

<a href="edit.php?id=<?= $row['id'] ?>"
class="btn edit">

تعديل

</a>

<a href="delete.php?id=<?= $row['id'] ?>"
class="btn delete">

حذف

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>

</html>