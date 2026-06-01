<?php
include __DIR__ . '/../../config/db.php';

$result = mysqli_query($conn, "SELECT * FROM prescriptions");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Prescriptions</title>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th {
            background: #004cff;
            color: white;
        }

        .btn {
            padding: 5px 10px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            margin: 2px;
            display: inline-block;
        }

        .add { background: green; }
        .edit { background: orange; }
        .delete { background: red; }
    </style>
</head>

<body>

<h2>Prescriptions List</h2>

<a href="add.php" class="btn add">Add Prescription</a>

<br><br>

<table>
    <tr>
        <th>ID</th>
        <th>Appointment ID</th>
        <th>Diagnosis</th>
        <th>Medications</th>
        <th>Notes</th>
        <th>Actions</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>

    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['appointment_id'] ?></td>
        <td><?= $row['diagnosis'] ?></td>
        <td><?= $row['medications'] ?></td>
        <td><?= $row['notes'] ?></td>

        <td>
            <!-- EDIT -->
            <a href="edit.php?id=<?= $row['id'] ?>" class="btn edit">
                Edit
            </a>

            <!-- DELETE -->
            <a href="delete.php?id=<?= $row['id'] ?>"
               class="btn delete"
               onclick="return confirm('Are you sure you want to delete?')">
                Delete
            </a>
        </td>
    </tr>

    <?php } ?>

</table>

</body>
</html>