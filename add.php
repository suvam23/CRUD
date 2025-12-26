<?php
include 'db.php';
include 'header.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "INSERT INTO students (name, email, course) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $email, $course]);

    header("Location: index.php");
}
?>

<form method="post">
    <h3>Add Student</h3>
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Course: <input type="text" name="course" required><br><br>
    <button name="submit">Add Student</button>
</form>
<?php include 'footer.php'; ?>