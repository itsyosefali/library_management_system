<!DOCTYPE html>
<html>

<head>
  <title>View Books</title>
  <link rel="stylesheet" href="style.css">
  <style>
    /* Additional CSS styling for the book list */
    .book-list {
      margin-top: 20px;
    }

    .book-list table {
      width: 100%;
      border-collapse: collapse;
    }

    .book-list table th,
    .book-list table td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    .book-list table th {
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
    <h2>View Books</h2>

    <div class="book-list">
      <table>
        <thead>
          <tr>
            <th>Title</th>
            <th>Author</th>
          </tr>
        </thead>
        <tbody>
          <?php
         $servername = "localhost";
        $username = "root";
        $password = "123";
        $dbname = "library_management_system";
          $conn = new mysqli($servername, $username, $password, $dbname);
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }

          // Retrieve books from the database
          $sql = "SELECT * FROM books";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  echo "<tr><td>" . $row["title"] . "</td><td>" . $row["author"] . "</td></tr>";
              }
          } else {
              echo "<tr><td colspan='2'>No books found.</td></tr>";
          }

          $conn->close();
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
