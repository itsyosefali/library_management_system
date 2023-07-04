<!DOCTYPE html>
<html>

<head>
  <title>Borrow Book</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .borrowed-book-list {
      margin-top: 20px;
    }

    .borrowed-book-list table {
      width: 100%;
      border-collapse: collapse;
    }

    .borrowed-book-list table th,
    .borrowed-book-list table td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    .borrowed-book-list table th {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body>
  <header>
    <h1>Library Online</h1>
  </header>

  <nav>
    <ul>
      <li><a href="index.html">Home</a></li>
      <li><a href="books.php">View Books</a></li>
      <li><a href="borrow.php">Borrow Book</a></li>
    </ul>
  </nav>

  <main>
    <h2>Borrow Book</h2>

    <form action="add_borrow.php" method="POST">
      <label for="book_id">Book ID:</label>
      <input type="text" id="book_id" name="book_id" required>

      <label for="borrower_name">Borrower Name:</label>
      <input type="text" id="borrower_name" name="borrower_name" required>

      <input type="submit" value="Borrow Book">
    </form>

    <div class="borrowed-book-list">
      <h3>Borrowed Books</h3>
      <table>
        <thead>
          <tr>
            <th>Book ID</th>
            <th>Book Title</th>
            <th>Borrower Name</th>
            <th>Borrow Date</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "library_management_system";

          $conn = new mysqli($servername, $username, $password, $dbname);
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }

          $sql = "SELECT * FROM borrowed_books";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  echo "<tr><td>" . $row["book_id"] . "</td><td>" . getBookTitle($row["book_id"], $conn) . "</td><td>" . $row["borrower_name"] . "</td><td>" . $row["borrow_date"] . "</td></tr>";
              }
          } else {
              echo "<tr><td colspan='4'>No books borrowed.</td></tr>";
          }

          $conn->close();

          function getBookTitle($bookId, $connection) {
              $sql = "SELECT title FROM books WHERE id = '$bookId'";
              $result = $connection->query($sql);

              if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                  return $row["title"];
              } else {
                  return "Unknown";
              }
          }
          ?>
        </tbody>
      </table>
    </div>
  </main>

  <footer>
    <p>&copy; 2023 Library Online. All rights reserved.</p>
  </footer>
</body>

</html>
