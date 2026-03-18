<?php
$link = new mysqli('localhost','root','','w3schools');
// var_dump($_POST['productname_f'])
$productname_f = $_POST['productname_f']??NULL;
$price_f = $_POST['price_f']??NULL;
if($productname_f && $price_f){
    $sql="INSERT INTO products
    (productname , price)
    VALUES
    ('$productname_f' , $price_f);";
    $result = $link -> query($sql);
}

$productid_f = $_POST['productid_f']??NULL;
$newprice_f = $_POST['newprice_f']??NULL;
if($productid_f && $newprice_f){
    $sql="UPDATE products
    SET price = $newprice_f
    WHERE productid=$productid_f;";
    $result = $link -> query($sql);
    var_dump($sql);
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
    <h2>Nowy produkt</h2>
    <form action="" method="post">
        <label for="productname">Podaj nazwe produktu</label>
        <input type="text" name="productname_f" id="productname">
        <label for="price">Podaj cene</label>
        <input type="number" name="price_f" id="price">
        <button>Wyślij</button>
    </form>

    <form action="" method="post">
        <label for="productid">Podaj id produktu</label>
        <input type="number" name="productid_f" id="productid">
        <label for="newprice">Podaj nową cene</label>
        <input type="number" name="newprice_f" id="newprice">
        <button>Wyślij</button>
    </form>

    
</body>
</html>

<?php
$link -> close();
?>