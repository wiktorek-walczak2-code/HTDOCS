<?php
$link = new mysqli('localhost','root','','w3schools');
$sql="SELECT supplierID, supplierName
FROM suppliers;";
$result = $link -> query($sql);
$suppliers = $result -> fetch_all(1);

$supplierID_f = $_POST['supplierID']??NULL;
if($supplierID_f){
    $sql="
    SELECT productName, price
    FROM products
    WHERE supplierID=$supplierID_f;
    ";
    $result = $link -> query($sql);
    $products = $result -> fetch_all(1);

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
    <form action="" method="post">
        <select name="supplierID" id="supplierID">
            <!-- <option value="supplierID">supplierName</option> -->
            <?php
            foreach($suppliers as $supplier){
                echo "<option value='{$supplier['supplierID']}'>{$supplier['supplierName']}</option>";
            }
            ?>
        </select>
        <button>Wyślij</button>
    </form>

    <ul>
        <!-- <li>productName - price</li> -->
         <?php
         if($supplierID_f){
         foreach($products as $product){
            echo "<li>{$product['productName']} - {$product['price']}</li>";
         }}
         ?>
    </ul>
</body>
</html>

<?php
$link -> close();
?>