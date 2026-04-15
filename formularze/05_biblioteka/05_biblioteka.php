<?php
$link = new mysqli('localhost','root','','biblioteka2');
$name_f = $_POST['name_f']??NULL;
$surname_f = $_POST['surname_f']??NULL;
if($name_f && $surname_f){
    $sql = "INSERT INTO czytelnicy
    VALUES
    (NULL,'$name_f','$surname_f','');";
    $link -> query($sql);
}

$book_id_f=$_POST['book-id']??NULL;
if($book_id_f){
    $sql="DELETE FROM ksiazki
        WHERE id=$book_id_f;";
    $link -> query($sql);
}

$sql="SELECT ksiazki.id,ksiazki.tytul,autorzy.imie,autorzy.nazwisko
    FROM ksiazki INNER JOIN autorzy ON ksiazki.id_autor=autorzy.id;";
$result=$link -> query($sql);
$books=$result -> fetch_all(1);

$sql="SELECT wypozyczenia.id,ksiazki.tytul,czytelnicy.nazwisko,wypozyczenia.data_oddania
    FROM wypozyczenia 
    INNER JOIN ksiazki ON wypozyczenia.id_ksiazka=ksiazki.id 
    INNER JOIN czytelnicy ON wypozyczenia.id_czytelnik=czytelnicy.id;";
$result=$link -> query($sql);
$rentals=$result -> fetch_all(1);
// var_dump($result)
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Dodawanie nowego czyelnika</h2>
    <form action="" method="post">
        <label for="name">Imie</label>
        <input type="text" name="name_f" id="name">
        <label for="surname">Nazwisko</label>
        <input type="text" name="surname_f" id="surname">
        <button>Wyślij</button>
    </form>

    <h2>Usuwanie książek</h2>
    <ul>
        <!-- <li>[id] [tytul] - [imie] [nazwisko]</li> -->
         <?php
         foreach($books as $book){
            echo "<li>{$book['id']} {$book['tytul']} - {$book['imie']} {$book['nazwisko']}</li>";
         }
         ?>
    </ul>
    <form action="" method="post">
        <label for="book-id">Id książki</label>
        <input type="number" name="book-id" id="book-id">
        <button>Wyślij</button>
    </form>

    <h2>Aktualizacja wypożeczeń</h2>
    <table>
        <tr>
            <th>id wypozyczenia</th>
            <th>tytul ksiazki</th>
            <th>naziwsko czytelnika</th>
            <th>data oddania</th>
        </tr>
        <!-- <tr>
            <td>[id]</td>
            <td>[tytul]</td>
            <td>[nazwisko]</td>
            <td>[data_oddania]</td>
        </tr> -->
        <?php
        foreach($rentals as $rental){
            echo "
            <tr>
                <td>{$rental['id']}</td>
                <td>{$rental['tytul']}</td>
                <td>{$rental['nazwisko']}</td>
                <td>{$rental['data_oddania']}</td>
            </tr>";
        }
        ?>
    </table>
    <form action="" method="post">
        <label for="borrowed_id">Id wypozyczenia</label>
        <input type="number" name="borrowed_id_f" id="borrowed_id">
        <button>Wyślij</button>
    </form>
</body>
</html>

<?php
$link -> close();
?>