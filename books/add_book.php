<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library_management_system";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$bookTitle = $_POST['title'];
$bookAuthor = $_POST['author'];
$sql = "INSERT INTO books (title, author) VALUES ('$bookTitle', '$bookAuthor')";
if ($conn->query($sql) === TRUE) {
    echo "Book added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
