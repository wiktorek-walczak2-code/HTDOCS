INSERT INTO czytelnicy
VALUES
(NULL,'Zuzanna','Kowalska','');



SELECT ksiazki.id,ksiazki.tytul,autorzy.imie,autorzy.nazwisko
FROM ksiazki INNER JOIN autorzy ON ksiazki.id_autor=autorzy.id;



DELETE FROM ksiazki
WHERE id=37;



SELECT wypozyczenia.id,ksiazki.tytul,czytelnicy.nazwisko,wypozyczenia.data_oddania
FROM wypozyczenia 
    INNER JOIN ksiazki ON wypozyczenia.id_ksiazka=ksiazki.id 
    INNER JOIN czytelnicy ON wypozyczenia.id_czytelnik=czytelnicy.id;



UPDATE wypozyczenia
SET data_wypozyczenia = CURRENT_DATE
WHERE id=1;