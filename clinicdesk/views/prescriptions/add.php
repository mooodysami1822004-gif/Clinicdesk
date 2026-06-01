<?php
include __DIR__ . '/../../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $appointment_id = $_POST['appointment_id'];
    $diagnosis = $_POST['diagnosis'];
    $medications = $_POST['medications'];
    $notes = $_POST['notes'];

    $sql = "INSERT INTO prescriptions (appointment_id, diagnosis, medications, notes)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss",
        $appointment_id,
        $diagnosis,
        $medications,
        $notes
    );

    if ($stmt->execute()) {
        header("Location: index.php?page=prescriptions");
        exit;
    } else {
        echo $conn->error;
    }
}
?>

<h2>Add Prescription</h2>

<form method="POST">

    <select name="appointment_id" required>
        <option value="">Select Appointment</option>

        <?php
        $apps = $conn->query("SELECT * FROM appointments");
        while ($a = $apps->fetch_assoc()) {
            echo "<option value='{$a['id']}'>Appointment #{$a['id']}</option>";
        }
        ?>
    </select>

    <br><br>

    <input type="text" name="diagnosis" placeholder="Diagnosis" required>

    <br><br>

    <input type="text" name="medications" placeholder="Medications" required>

    <br><br>

    <textarea name="notes" placeholder="Notes"></textarea>

    <br><br>

    <button type="submit">Save</button>

</form>