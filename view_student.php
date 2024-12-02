<?php include('../includes/db_connect.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>View Students</title>
</head>
<body>
    <h2>All Students</h2>
    <a href="add_student.php">Add Student</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Grade</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM students";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['age']}</td>
                        <td>{$row['grade']}</td>
                        <td>
                            <a href='edit_student.php?id={$row['id']}'>Edit</a> |
                            <a href='delete_student.php?id={$row['id']}'>Delete</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No students found!</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
