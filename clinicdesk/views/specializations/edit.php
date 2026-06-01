<?php
include __DIR__ . '/../../config/db.php';

$id = $_GET['id'];

// جلب البيانات
$result = mysqli_query($conn, "SELECT * FROM specializations WHERE id=$id");
$row = mysqli_fetch_assoc($result);

// تحديث
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];

    mysqli_query($conn, "UPDATE specializations SET name='$name' WHERE id=$id");

    header("Location: index.php");
    exit;
}
?>

<h2>Edit Specialization</h2>

<form method="POST">
    <input type="text" name="name" value="<?= $row['name'] ?>" required>
    <button type="submit">Update</button>
</form>