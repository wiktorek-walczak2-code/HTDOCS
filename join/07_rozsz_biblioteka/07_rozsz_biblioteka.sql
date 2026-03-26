-- 1. Biblioteka potrzebuje informacji o wypożyczeniach książek. Proszę podać autorów, tytuły książek i oraz daty ich wypożyczeń. 

SELECT imie, nazwisko, tytul, data_wypozyczenia
FROM Autorzy 
    INNER JOIN ksiazki ON autorzy.id=ksiazki.id_autor
    INNER JOIN wypozyczenia ON ksiazki.id=wypozyczenia.id_ksiazka;

-- 2. Dodaj nową książkę, aby mieć pewność, że są takie, które nigdy nie były wypożyczone. Wyświetl książki, które nigdy nie zostały wypożyczone.

INSERT INTO ksiazki
VALUES
(NULL,1,'Bajka',1,1);

-- 3. Utwórz zestawienie pokazujące ile razy zostały wypożyczone książki (tytuł, autor, ilość wypożyczeń). W zestawieniu uwzględnij także te książki, które nigdy nie były wypożyczone.

SELECT imie, nazwisko, tytul, COUNT(data_wypozyczenia) as Ile_razy_wypozyczono
FROM Autorzy 
    INNER JOIN ksiazki ON autorzy.id=ksiazki.id_autor
    LEFT JOIN wypozyczenia ON ksiazki.id=wypozyczenia.id_ksiazka
GROUP BY ksiazki.id;

-- 4. Które osoby figurujące w bazie jako czytelnicy, nie wypożyczyły ani razu choćby jednej książki?

SELECT imie, nazwisko
FROM czytelnicy LEFT JOIN wypozyczenia ON czytelnicy.id=wypozyczenia.id_czytelnik
WHERE data_wypozyczenia IS NULL;


-- 5.  Jacy czytelnicy nie są przypisani do żadnego wydziału



-- 6. Wyświetl ranking czytelników pokazujący wszystkich z informacja, ile razy wypożyczyli cokolwiek (lista ma zawierać wszystkich czytelników – nawet tych, którzy nic nie wypożyczyli)

SELECT imie, nazwisko, COUNT(data_wypozyczenia) as Ile_razy_wypozyczyl
FROM czytelnicy LEFT JOIN wypozyczenia ON czytelnicy.id=wypozyczenia.id_czytelnik
GROUP BY czytelnicy.id
ORDER BY Ile_razy_wypozyczyl DESC;