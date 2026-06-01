<?php
include __DIR__ . '/../../config/db.php';

$id = $_GET['id'];

// جلب البيانات الحالية
$result = mysqli_query($conn, "SELECT * FROM prescriptions WHERE id=$id");
$row = mysqli_fetch_assoc($result);

// عند الضغط على حفظ التعديل
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $appointment_id = $_POST['appointment_id'];
    $diagnosis = $_POST['diagnosis'];
    $medications = $_POST['medications'];
    $notes = $_POST['notes'];

    mysqli_query($conn, "
        UPDATE prescriptions SET
            appointment_id='$appointment_id',
            diagnosis='$diagnosis',
            medications='$medications',
            notes='$notes'
        WHERE id=$id
    ");

    header("Location: index.php");
    exit;
}
?>

<h2>Edit Prescription</h2>

<form method="POST">

    <input type="text" name="appointment_id"
           value="<?= $row['appointment_id'] ?>" required><br><br>

    <input type="text" name="diagnosis"
           value="<?= $row['diagnosis'] ?>" required><br><br>

    <input type="text" name="medications"
           value="<?= $row['medications'] ?>" required><br><br>

    <textarea name="notes"><?= $row['notes'] ?></textarea><br><br>

    <button type="submit" style="background: blue; color:white; padding:5px 10px;">
        Update
    </button>

</form>