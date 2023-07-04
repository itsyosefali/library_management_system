<!DOCTYPE html>
<html>

<head>
  <title>View Books</title>
  <link rel="stylesheet" href="style.css">
  <style>
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

    .add-book-form {
      margin-top: 20px;
    }

    .add-book-form input[type="text"],
    .add-book-form input[type="submit"] {
      padding: 8px;
      font-size: 16px;
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
    
      <h3>Add Book</h3>
      <form action="add_book.php" method="POST">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>

        <label for="author">Author:</label>
        <input type="text" id="author" name="author" required>

        <input type="submit" value="Add Book">
      </form>
    </div>
     <div class="add-book-form">
    <div class="book-list">
      <h3>List of Books</h3>
      <table>
        <thead>
          <tr>
            <th>Book ID</th>
            <th>Title</th>
            <th>Author</th>
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

          $sql = "SELECT * FROM books";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  echo "<tr><td>" . $row["id"] . "</td><td>" . $row["title"] . "</td><td>" . $row["author"] . "</td></tr>";
              }
          } else {
              echo "<tr><td colspan='3'>No books available.</td></tr>";
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
