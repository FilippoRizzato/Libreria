<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$db = new PDO('mysql:host=localhost;dbname=itis','root','',[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ]);
//var_dump($db);
$query='INSERT INTO studenti(matricola_studente,nome,cognome,media,data_iscrizione) VALUES(:matricola_studente,:nome,:cognome,:media,NOW())';
try{
    $stm = $db->prepare($query);
    $stm->bindValue(':matricola_studente', '00010');
    $stm->bindValue(':nome', 'Lucy');
    $stm->bindValue(':cognome', 'Taylor');
    $stm->bindValue(':media', 8);
    if($stm->execute())
        $stm->closeCursor();
    else
        throw new PDOException('ERROR nella query');
}catch(Exception $e){
    logError($e);
}
?>

</body>
</html>
