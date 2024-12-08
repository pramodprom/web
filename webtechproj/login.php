<?php
include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['biodata'] = $row['biodata'];
            header("Location: biodata.php");
        } else {
            echo "Invalid password. <a href='index.html'>Try Again</a>";
        }
    } else {
        echo "No user found. <a href='index.html'>Register Here</a>";
    }
}
$conn->close();
?>
