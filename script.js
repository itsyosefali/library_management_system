document.addEventListener("DOMContentLoaded", function() {
  // Fetch available books from the server
  fetch("books.php")
    .then(response => response.json())
    .then(data => {
      const booksList = document.getElementById("books");
      data.forEach(book => {
        const li = document.createElement("li");
        li.textContent = `${book.title} by ${book.author}`;
        booksList.appendChild(li);
      });
    })
    .catch(error => console.log(error));
});
