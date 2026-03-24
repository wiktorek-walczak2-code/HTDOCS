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
    <ol>
    <!-- skrypt b -->
    </ol>
    <form action="" method="post">
        <label for="book_id">Id książki</label>
        <input type="number" name="book_id_f" id="book_id">
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
        <!-- skrypt d -->
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