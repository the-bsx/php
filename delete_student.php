<?php include('../includes/db_connect.php'); ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM students WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: view_students.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
