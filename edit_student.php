<?php include('../includes/db_connect.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Edit Student</title>
</head>
<body>
    <h2>Edit Student</h2>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM students WHERE id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>
    <form method="POST" action="">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
        <label>Age:</label>
        <input type="number" name="age" value="<?php echo $row['age']; ?>" required>
        <label>Grade:</label>
        <input type="text" name="grade" value="<?php echo $row['grade']; ?>" required>
        <button type="submit" name="update">Update</button>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $grade = $_POST['grade'];

        $sql = "UPDATE students SET name='$name', age=$age, grade='$grade' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            header("Location: view_students.php");
        } else {
            echo "Error: " . $conn->error;
        }
    }
    ?>
</body>
</html>
