<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$servername = "139.255.11.84";
$user = "student";
$pass = "isbmantap"; 
$dbname = "webdev_mtc";

$conn = new mysqli($servername, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $name = $_POST['w3lName'];
    $email = $_POST['w3lSender'];
    $subject = $_POST['w3lSubject'];
    $message = $_POST['w3lMessage'];

    $sql = "INSERT INTO contactMe (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";


    if ($conn->query($sql) === true) {
        header('Location: ../contact.html');
        exit();
    } else {
        // Insert failed
        echo ("Error: " . $sql . "<br>" . $conn->error);
    }
}

$conn->close();
?>