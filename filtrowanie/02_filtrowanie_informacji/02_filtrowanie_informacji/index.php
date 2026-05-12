<?php
$link = new mysqli('localhost','root','','zgloszenia');
$status_f = $_POST['status']??NULL;
$personelid_f = $_POST['personel-id']??NULL;

if($status_f){
    $sql="
    SELECT id, imie, nazwisko
    FROM personel
    WHERE status='$status_f';
    ";
    $result = $link -> query($sql);
    $personel = $result -> fetch_all(1);
}

if($personelid_f){
    $sql="
        INSERT INTO rejestr
        VALUES
            (NULL,current_date,$personelid_f,14);
        ";
    $result = $link -> query($sql);
}

$sql="
    SELECT id, nazwisko
    FROM personel
    WHERE id NOT IN
        (SELECT id_personel
        FROM rejestr);
    ";
$result = $link -> query($sql);
$personel2 = $result -> fetch_all(1);



?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zgłoszenia</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Zgłoszenia wydarzeń</h1>
    </header>

    <main>
        <section class="left">
            <h2>Personel</h2>
            <form action="" method="post">
                <input type="radio" name="status" id="police" checked value="policjant">
                <label for="police">Policjant</label>
                <input type="radio" name="status" id="lifeguard" value="ratownik">
                <label for="lifeguard">Ratownik</label>
                <button>Pokaż</button>
            </form>
            
            <?php
            if($status_f){
                echo "<h3>Wybrano opcję: $status_f</h3>";
            }
            ?>

            <table>
                <tr>
                    <th>id</th>
                    <th>imie</th>
                    <th>nazwisko</th>
                </tr>
                <!-- skrypt 1 -->
                 <!-- <tr>
                    <td>id</td>
                    <td>imie</td>
                    <td>nazwisko</td>
                 </tr> -->
                 <?php
                 if($status_f){
                    foreach($personel as $person){
                        echo "
                        <tr>
                            <td>{$person['id']}</td>
                            <td>{$person['imie']}</td>
                            <td>{$person['nazwisko']}</td>
                        </tr>
                        ";
                    }
                 }
                 ?>

            </table>
        </section>

        <section class="right">
            <h2>Nowe zgłoszenie</h2>
            <ol>
                <!-- skrypt 2 -->
                 <!-- <li>id nazwisko</li> -->
                  <?php
                    foreach($personel2 as $person){
                        echo "<li>{$person['id']} {$person['nazwisko']}</li>";
                    }
                  ?>
            </ol>

            <form action="" method="post">
                <label for="personel-id">Wybierz id osoby z listy</label>
                <input type="number" name="personel-id" id="personel-id">
                <button>Dodaj zgłoszenie</button>
            </form>

        </section>
    </main>

    <footer>
        <p>Stronę wykonał: 20</p>
    </footer>


</body>
</html>

<?php
$link -> close();
?>