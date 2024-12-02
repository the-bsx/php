<?php include('../includes/db_connect.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Add Student</title>
</head>
<body>
    <h2>Add New Student</h2>
    <form method="POST" action="">
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Age:</label>
        <input type="number" name="age" required>
        <label>Grade:</label>
        <input type="text" name="grade" required>
        <button type="submit" name="submit">Add Student</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $grade = $_POST['grade'];

        $sql = "INSERT INTO students (name, age, grade, created_at) VALUES ('$name', $age, '$grade', NOW())";
        if ($conn->query($sql) === TRUE) {
            echo "New student added successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    }
    ?>
</body>
</html>
