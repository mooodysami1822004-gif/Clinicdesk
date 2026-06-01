<?php
include __DIR__ . '/../../config/db.php';

$id = $_GET['id'];

// حذف مباشر
mysqli_query($conn, "DELETE FROM specializations WHERE id=$id");

// رجوع مباشر للصفحة
header("Location: index.php");
exit;
?>