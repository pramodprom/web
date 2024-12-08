<?php
include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $biodata = $_POST['biodata'];

    $sql = "INSERT INTO users (username, password, biodata) VALUES ('$username', '$password', '$biodata')";
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful! <a href='index.html'>Login Here</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
