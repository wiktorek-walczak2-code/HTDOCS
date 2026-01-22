<?php
$link = new mysqli('localhost','root','','szkola');
$sql = "SELECT * FROM uczen;";
$result = $link -> query($sql);
$students = $result -> fetch_all(1);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th,td{
            border:1px solid black;
        }
        table{
            border-collapse:collapse;
        }
    </style>
</head>
<body>
    <h1>Uczniowie</h1>
    <table>
        <tr>
            <th>id</th>
            <th>imie</th>
            <th>nazwisko</th>
        </tr>
        <!-- <tr>
            <td> [id] </td>
            <td> [imie] </td>
            <td> [nazwisko] </td>
        </tr> -->
        <?php
        foreach($students as $student){
            echo "<tr>
                  <td> {$student['id']} </td>
                  <td> {$student['imie']} </td>
                  <td> {$student['nazwisko']} </td>
                  </tr>";
        }
        
        ?>
    </table>

    <h3>Aktualizacja</h3>
    <form action="aktualizacja.php" method="post">
        <label for="id">Podaj id ucznia</label>
        <input type="text" name="id_f" id="id">
        <button>Wyślij</button>
    </form>

    <h3>Usuwanie</h3>
    <form action="usuwanie.php" method="post">
        <label for="id">Podaj id ucznia</label>
        <input type="text" name="id_f" id="id">
        <button>Wyślij</button>
    </form>

</body>
</html>


<?php
$link -> close();
?>