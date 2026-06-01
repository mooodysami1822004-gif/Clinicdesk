<?php
include __DIR__ . '/../../config/db.php';

$id = $_GET['id'];

$sql = "DELETE FROM prescriptions WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

header("Location: index.php?page=prescriptions");
exit;
?>