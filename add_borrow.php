<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookId = $_POST["book_id"];
    $borrowerName = $_POST["borrower_name"];
    $borrowDate = date("Y-m-d"); 

      $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "library_management_system";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO borrowed_books (book_id, borrower_name, borrow_date) VALUES ('$bookId', '$borrowerName', '$borrowDate')";
    if ($conn->query($sql) === TRUE) {
        echo "Book borrowing record added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
