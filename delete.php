
<?php

    require_once ('/db.sql');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titolo = $_POST['titolo'];
    $autore = $_POST['autore'];
    $genere = $_POST['genere'];
    $prezzo = $_POST['prezzo'];
    $anno = $_POST['anno'];

    $sql = "DELETE FROM libreria.libri WHERE titolo=:titolo";
    try{
        $stm = $db->prepare($sql);
        $stm->bindValue(':titolo', '');
        if($stm->execute())
            $stm->closeCursor();
        else
            throw new PDOException('ERROR nella query');
    }catch(Exception $e){
        logError($e);
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

