<?php
include __DIR__ . "/../../config/db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $specialization_id = (int) $_POST['specialization_id'];

    $sql = "INSERT INTO doctors (full_name, email, phone, specialization_id)
            VALUES ('$full_name', '$email', '$phone', '$specialization_id')";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit;
    } else {
        $message = "خطأ في الإضافة";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Doctor</title>
</head>
<body>

<h2>إضافة طبيب</h2>

<?php if ($message) echo $message; ?>

<form method="POST">

    <input type="text" name="full_name" placeholder="Name" required>
    <br><br>

    <input type="email" name="email" placeholder="Email" required>
    <br><br>

    <input type="text" name="phone" placeholder="Phone" required>
    <br><br>

    <select name="specialization_id" required>

    <?php
    $query = mysqli_query($conn, "SELECT * FROM specializations");

    while ($row = mysqli_fetch_assoc($query)) {
        echo "<option value='{$row['id']}'>{$row['name']}</option>";
    }
    ?>

</select>
</select>

    <button type="submit">حفظ</button>

</form>

</body>
</html>