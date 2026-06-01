<?php
include __DIR__ . "/../../config/db.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = $_POST['name'];

    mysqli_query($conn,

    "INSERT INTO specializations(name)
    VALUES('$name')");

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Add Specialization</title>

</head>

<body>

<h2>Add Specialization</h2>

<form method="POST">

<input type="text"
name="name"
placeholder="Specialization Name">

<br><br>

<button type="submit">

Save

</button>

</form>

</body>

</html>