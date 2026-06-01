<?php
include __DIR__ . '/../../config/db.php';

$result = mysqli_query($conn, "SELECT * FROM specializations");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Specializations</title>

    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
        th { background: #004cff; color: white; }

        .btn {
            padding: 5px 10px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .add { background: green; }
        .edit { background: orange; }
        .delete { background: red; }
    </style>
</head>

<body>

<h2>Specializations List</h2>

<a href="add.php" class="btn add">Add Specialization</a>

<br><br>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td>

                <!-- Edit -->
                <a href="edit.php?id=<?= $row['id'] ?>" class="btn edit">
                    Edit
                </a>

                <!-- Delete -->
                <a href="delete.php?id=<?= $row['id'] ?>" class="btn delete"
                   onclick="return confirm('Are you sure?')">
                    Delete
                </a>

            </td>
        </tr>
    <?php } ?>

</table>

</body>
</html>