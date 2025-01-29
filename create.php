<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aggiungi Libro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Aggiungi un Nuovo Libro</h1>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library_db";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO library_db.books (title, author, genre, price, year) VALUES (:title, :author, :genre, :price, :year)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':title', $_POST['title']);
        $stmt->bindValue(':author', $_POST['author']);
        $stmt->bindValue(':genre', $_POST['genre']);
        $stmt->bindValue(':price', $_POST['price']);
        $stmt->bindValue(':year', $_POST['year']);

        $stmt->execute();
        echo "<p>Nuovo libro aggiunto con successo!</p>";
    } catch(PDOException $e) {
        echo "<p>Errore: " . $e->getMessage() . "</p>";
    }

    $conn = null;
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="title">Titolo:</label>
    <input type="text" id="title" name="title" required><br>
    <label for="author">Autore:</label>
    <input type="text" id="author" name="author" required><br>
    <label for="genre">Genere:</label>
    <input type="text" id="genre" name="genre" required><br>
    <label for="price">Prezzo:</label>
    <input type="number" id="price" name="price" required><br>
    <label for="year">Anno di Pubblicazione:</label>
    <input type="number" id="year" name="year" required><br>
    <input type="submit" value="Aggiungi Libro">
</form>
<nav>
    <ul>
        <li><a href="create.php">Aggiungi Libro</a></li>
        <li><a href="read.php">Visualizza Libri</a></li>
        <li><a href="update.php">Aggiorna Prezzo</a></li>
        <li><a href="delete.php">Rimuovi Libro</a></li>
    </ul>
</nav>
</body>
</html>
