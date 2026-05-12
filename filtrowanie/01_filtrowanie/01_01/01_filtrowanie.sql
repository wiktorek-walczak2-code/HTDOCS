SELECT productName, price
FROM products
WHERE price BETWEEN 10 AND 50;

SELECT MAX(CEIL(price)) as max_price
FROM products;
