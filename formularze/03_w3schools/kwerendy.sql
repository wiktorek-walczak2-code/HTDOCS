INSERT INTO products
(productname , price)
VALUES
('YumJuice' , 10);



UPDATE products
SET price = 100
WHERE productid=1;

DELETE FROM products
WHERE productid=1;