<?php
$link = new mysqli('localhost','root','','ww');
$sql = "SELECT typy_dan.nazwa as nazwa_typu, dania.nazwa as nazwa_dania, dania.cena
FROM dania INNER JOIN typy_dan ON dania.typ=typy_dan.id;
";
$result = $link -> query($sql);
$dishes = $result -> fetch_all(1);

$sql = "SELECT id, nazwa
        FROM typy_dan;";
$result = $link -> query($sql);
$types = $result -> fetch_all(1);


?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista dań</h1>

    <ol>
        <!-- <li>[nazwa_typu] [nazwa_dania] - [cena]</li> -->
    <?php
    foreach($dishes as $dish){
        echo "
            <li>{$dish['nazwa_typu']} {$dish['nazwa_dania']} - {$dish['cena']}</li>"
            ;
    } 
    ?>
    </ol>

    <form action="dodawanie.php" method="post">
        <label for="dish-name">Podaj nazwe dania</label>
        <input type="text" name="dish-name" id="dish-name"><br>
        <label for="price">Podaj cene</label>
        <input type="number" name="price" id="price"><br>
        <select name="dish-type" id="dish-type">
            <!-- <option value="1">zupy</option> -->
             <?php
            foreach($types as $type){
                echo "
                <option value='{$type['id']}'>{$type['nazwa']}</option>
                ";
            }
             ?>
        </select><br>
        <button>Wyślij</button>
    </form>


</body>
</html>

<?php
$link -> close();
?>