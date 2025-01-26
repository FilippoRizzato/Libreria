
<?php
try {
    include 'db_connection.php';
} catch (Exception $e) {
    echo "Errore nell'includere il file di connessione al database: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titolo = $_POST['titolo'];
    $autore = $_POST['autore'];
    $genere = $_POST['genere'];
    $prezzo = $_POST['prezzo'];
    $anno = $_POST['anno'];

    $sql = "INSERT INTO libri (titolo, autore, genere, prezzo, anno) VALUES (:titolo, :autore, :genere, :prezzo, :anno)";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':titolo', $titolo);
    $stmt->bindValue(':autore', $autore);
    $stmt->bindValue(':genere', $genere);
    $stmt->bindValue(':prezzo', $prezzo);
    $stmt->bindValue(':anno', $anno);

    if ($stmt->execute()) {
        echo "Nuovo libro aggiunto con successo";
    } else {
        echo "Errore durante l'inserimento del libro";
    }
}
?>

<form method="post" action="create.php">
    Titolo: <input type="text" name="titolo" required><br>
    Autore: <input type="text" name="autore" required><br>
    Genere: <input type="text" name="genere" required><br>
    Prezzo: <input type="number" step="0.01" name="prezzo" required><br>
    Anno: <input type="number" name="anno" required><br>
    <input type="submit" value="Aggiungi libro">
</form>
