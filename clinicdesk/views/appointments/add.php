<?php
include __DIR__ . "/../../config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $patient_name = $_POST['patient_name'];
    $doctor_id = $_POST['doctor_id'];
    $appointment_date = $_POST['appointment_date'];
    $status = $_POST['status'];

    mysqli_query($conn,
    "INSERT INTO appointments
    (patient_name, doctor_id, appointment_date, status)

    VALUES

    ('$patient_name', '$doctor_id',
    '$appointment_date', '$status')
    ");

    header("Location: index.php");
    exit;
}
?>

<h2>Add Appointment</h2>

<form method="POST">

<input type="text"
name="patient_name"
placeholder="Patient Name">

<br><br>

<select name="doctor_id">

<?php

$doctors = mysqli_query($conn,
"SELECT * FROM doctors");

while($doctor = mysqli_fetch_assoc($doctors)) {

?>

<option value="<?= $doctor['id'] ?>">

<?= $doctor['full_name'] ?>

</option>

<?php } ?>

</select>

<br><br>

<input type="date"
name="appointment_date">

<br><br>

<select name="status">

<option value="Pending">Pending</option>

<option value="Completed">Completed</option>

<option value="Cancelled">Cancelled</option>

</select>

<br><br>

<button type="submit">

Save

</button>

</form>