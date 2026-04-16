-- 1. Utwórz tabelę KatalogConfections zawierającą wszystkie dane o produktach z kategorii Confections

CREATE TABLE KatalogConfections AS 
SELECT products.*
FROM products INNER JOIN categories USING(categoryID)
WHERE categoryname='confections';

-- 2. ze względu na nowy podatek podnieś cenę wszystkich artykułów kategorii Confections o 20% w tabeli Products

UPDATE products
SET price=price*1.2 
WHERE categoryID IN(
    SELECT categoryID
    FROM categories
    WHERE categoryname='confections'
);

-- 3. Zmień nazwę tabeli KatalogConfections na KatalogTaniejJuzBylo 

ALTER TABLE KatalogConfections
RENAME TO KatalogTaniejJuzBylo; 

-- 4. Skopiuj do tabeli KatalogTaniejJuzBylo wszystkie produkty z kategorii Beverages

INSERT INTO KatalogTaniejJuzBylo
SELECT products.* 
FROM products INNER JOIN categories USING(categoryID)
WHERE categoryname='beverages';

-- 5. Do tabeli Archiwum przenieś dane z tabeli Orders dotyczące zamówień z 1996 roku (skopiuj - jeśli trzeba utwórz tabelę -i potem usuń)

CREATE TABLE archiwum AS
SELECT orders.*
FROM orders 
WHERE orderdate LIKE '1996%';

-- 6. Utwórz tabelę  Archiwum_Kontrahentów z danymi: nazwa dostawcy lub nazwa klienta, osoba do kontaktu, miasto, kraj z Włoch



-- 7. Usuń klientów i dostawców z Włoch z tabel Customers i Suppliers (dwoma zapytaniami)



-- 8. Do tabeli Archiwum_Kontrahentów dodaj kontrahentów z Niemiec i Francji

 

-- 9. Z tabeli Customers wybierz dane klientów z Niemiec i dodaj ich do tabeli Suppliers



-- 10. Utwórz tabelę Archiwum zawierającą wszystkie dane z tabeli Orders dotyczące zamówień z 1996 roku

 

-- 11. Usuń z tabeli Orders wszystkie zamówienia z 1996 roku



-- 12. Do tabeli Archiwum dodaj wszystkie dane dotyczące zamówień ze stycznia 1997 roku

