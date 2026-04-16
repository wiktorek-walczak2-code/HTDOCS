<?php
$link = new mysqli('localhost','root','','ww');
$dish_type_f = $_POST['dish-type']??NULL;
$price_f = $_POST['price']??NULL;
$dish_name_f = $_POST['dish-name']??NULL;
if($dish_name_f && $price_f && $dish_type_f){
    $sql = "INSERT INTO dania (typ,nazwa,cena)
            VALUES
            ($dish_type_f,'$dish_name_f',$price_f);";
    $result = $link -> query($sql);


    
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
    <h1>Dodawanie dania</h1>
    <?php
    if($result){
        echo "<p> Danie $dish_name_f zostało dodane</p>";
    }
    ?>
    <a href="06_dania.php">Powrót do strony głównej</a>
</body>
</html>

<?php
$link -> close();
?>