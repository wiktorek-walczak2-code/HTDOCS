<?php
$link = new mysqli('localhost','root','','w3schools');
$sql = "SELECT MAX(CEIL(price)) as max_price
FROM products;";
$result = $link -> query($sql);
$max_price = $result -> fetch_assoc();
$max_price = $max_price['max_price'];


$min_price_f=$_POST['min-price']??0;
$max_price_f=$_POST['max-price']??$max_price;

$sql="SELECT productName, price
FROM products
WHERE price BETWEEN $min_price_f AND $max_price_f;";
$result = $link -> query($sql);
$products = $result -> fetch_all(1);


// var_dump($_POST['max-price']);


?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="min-price">Minimum</label>
        <input type="number" name="min-price" id="min-price" min=0
        max=<?= $max_price?> value=0>
        <label for="max-price">Maximum</label>
        <input type="number" name="max-price" id="max-price" min=0
        max=<?= $max_price?> value=<?= $max_price?>>
        <button>Wyślij</button>
    </form><br>
    <table>
        <tr>
            <th>Nazwa produktu</th>
            <th>Cena produktu</th>
        </tr>
        <!-- <tr>
            <td>productName</td>
            <td>price</td>
        </tr> -->
        <?php
        foreach($products as $product){
            echo "
            <tr>
                <td>{$product['productName']}</td>
                <td>{$product['price']}</td>
            </tr>
            ";
        }
        ?>
    </table>
</body>
</html>

<?php
$link -> close();
?>