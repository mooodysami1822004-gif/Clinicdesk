<?php
include __DIR__ . "/../../config/db.php";

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM doctors WHERE id=$id");

header("Location: index.php");
exit;
?>