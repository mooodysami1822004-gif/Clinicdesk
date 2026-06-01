<?php
include __DIR__ . "/../../config/db.php";

$sid = $_GET['id'] ?? null;
$message = "";

/* جلب بيانات الطبيب */
$result = mysqli_query($conn, "SELECT * FROM doctors WHERE id='$sid'");
$row = mysqli_fetch_assoc($result);

/* جلب التخصصات */
$specs = mysqli_query($conn, "SELECT * FROM specializations");

/* عند التحديث */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $specialization_id = $_POST['specialization'];

    $sql = "UPDATE doctors SET 
        full_name='$full_name',
        email='$email',
        phone='$phone',
        specialization_id='$specialization_id'
        WHERE id='$sid'";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit;
    } else {
        $message = "خطأ في التحديث";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Doctor</title>
</head>
<body>

<h2>Edit Doctor</h2>

<?php if ($message) echo $message; ?>

<form method="POST">

    <input type="text" name="full_name"
           value="<?= $row['full_name'] ?>" required>
    <br><br>

    <input type="email" name="email"
           value="<?= $row['email'] ?>" required>
    <br><br>

    <input type="text" name="phone"
           value="<?= $row['phone'] ?>" required>
    <br><br>

    <select name="specialization" required>
        <option value="">Select Specialization</option>

        <?php while($spec = mysqli_fetch_assoc($specs)) { ?>
            <option value="<?= $spec['id'] ?>"
                <?= ($spec['id'] == $row['specialization_id']) ? 'selected' : '' ?>>
                <?= $spec['name'] ?>
            </option>
        <?php } ?>

    </select>

    <br><br>

    <button type="submit">Update</button>

</form>

</body>
</html>