<?php
$link = new mysqli('localhost','root','','w3schools');
$shipper_id_f = $_POST['shipper-id']??NULL;
if($shipper_id_f){
    $sql="
    SELECT orderdate
    FROM orders
    WHERE shipperid=$shipper_id_f;
    ";
    $result = $link -> query($sql);
    $orderdates = $result -> fetch_all(1);
}

$sql="
    SELECT shipperid, shippername
    FROM shippers;
    ";
$result = $link -> query($sql);
$shippers = $result -> fetch_all(1);
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

        <!-- <label>
            <input type="radio" name="shipper-id" value='1'>
            Speedy Express
        </label>
        <label>
            <input type="radio" name="shipper-id" value='2'>
            United Package
        </label>
        <label>
            <input type="radio" name="shipper-id" value='3'>
            Federal Shipping
        </label> -->

        <?php
        foreach($shippers as $shipper){
            echo "
                <label>
                <input type='radio' name='shipper-id' value='{$shipper['shipperid']}'>
                {$shipper['shippername']}
                </label>
            ";
        }
        ?>
        
        <button>Wyślij</button>

    </form>

    <!-- <ol>
        <li>[orderdate]</li>
    </ol> -->
    <ol>
    <?php
    if($shipper_id_f){
        foreach($orderdates as $orderdate){
            echo "
            <li>{$orderdate['orderdate']}</li>
            ";
        }
    }
    ?>
    </ol> 
</body>
</html>


<?php
$link -> close();
?>