<?php
$link = new mysqli('localhost','root','','szkola');

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_POST['id_f'])){
        $id_f = $_POST['id_f'];
        $sql = "update uczen
                set miejsce_urodzenia='Bydgoszcz'
                where id=$id_f;";
                $result = $link -> query($sql);
    }
    ?>
</body>
</html>

<?php
$link -> close();
?>