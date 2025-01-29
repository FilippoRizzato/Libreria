<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizza Libri</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Elenco dei Libri</h1>
<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "library_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT title, author, genre, price, year FROM books";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    echo "<table border='1'>
                <tr>
                    <th>Titolo</th>
                    <th>Autore</th>
                    <th>Genere</th>
                    <th>Prezzo</th>
                    <th>Anno di Pubblicazione</th>
                </tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                    <td>".$row['title']."</td>
                    <td>".$row['author']."</td>
                    <td>".$row['genre']."</td>
                    <td>".$row['price']."</td>
                    <td>".$row['year']."</td>
                </tr>";
    }

    echo "</table>";
} catch(PDOException $e) {
    echo "<p>Errore: " . $e->getMessage() . "</p>";
}

$conn = null;
?>
<nav>
    <ul>
        <li><a href="create_book.php">Aggiungi Libro</a></li>
        <li><a href="read_books.php">Visualizza Libri</a></li>
        <li><a href="update_book.php">Aggiorna Prezzo</a></li>
        <li><a href="delete_book.php">Rimuovi Libro</a></li>
    </ul>
</nav>
</body>
</html>

