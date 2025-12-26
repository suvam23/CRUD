<?php
include 'db.php';
include 'header.php';
$id = $_GET['id'];

$sql = "SELECT * FROM students WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "UPDATE students SET name=?, email=?, course=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $email, $course, $id]);

    header("Location: index.php");
}
?>

<form method="post">
    <h3>Edit Student</h3>
    Name: <input type="text" name="name" value="<?= $student['name']; ?>"><br><br>
    Email: <input type="email" name="email" value="<?= $student['email']; ?>"><br><br>
    Course: <input type="text" name="course" value="<?= $student['course']; ?>"><br><br>
    <button name="update">Update</button>
</form>
<?php include 'footer.php'; ?>