<?php
$link = new mysqli('localhost','root','','filmy');

$name_f = $_POST['name_f'] ?? null;
$surname_f = $_POST['surname_f'] ?? null;

if($name_f && $surname_f){
    $sql = "INSERT INTO rezyserzy(imie,nazwisko)
            VALUES ('$name_f','$surname_f');";
    $result = $link -> query($sql);
}


$sql = "SELECT * FROM rezyserzy;";
$result = $link -> query($sql);
$directors = $result -> fetch_all(1);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
        <?php
        foreach ($directors[0] as $key => $value) {
            echo  "<th> $key </th>";
        }
        ?>
        </tr>
        <?php
        foreach ($directors as $director){
            echo "<tr>";
            foreach ($director as $value){
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>

    <h3>Wpisz dane o nowym rezyserze</h3>
    <form action="" method="post">
        <label for="name">imie</label>
        <input type="text" name="name_f" id="name"><br>
        <label for="surname">nazwisko</label>
        <input type="text" name="surname_f" id="surname">
        <button>Wyślij</button>
    </form>
</body>
</html>

<?php
$link -> close();
?>
