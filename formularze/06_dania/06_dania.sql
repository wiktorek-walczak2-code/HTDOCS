INSERT INTO dania (typ,nazwa,cena)
VALUES
(4,'herbata',3);



SELECT typy_dan.nazwa as nazwa_typu, dania.nazwa as nazwa_dania, dania.cena
FROM dania INNER JOIN typy_dan ON dania.typ=typy_dan.id;



SELECT id, nazwa
FROM typy_dan;