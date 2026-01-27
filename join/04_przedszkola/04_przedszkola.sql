
-- 1.  Wykonaj zapytania sql wyszukujące odpowiedzi na poniższe pytania:
-- A. Ile jest chętnych do przyjęcia do poszczególnych przedszkoli? Wyświetl nazwę przedszkola i ilość chętnych.

SELECT Nazwa_przedszkola, COUNT(*)
FROM dzieci INNER JOIN przedszkola ON dzieci.id_przedszkola=przedszkola.id_przedszkola
GROUP BY Nazwa_przedszkola;

-- B. Ilu jest chętnych do przyjęcia do poszczególnych przedszkoli, uwzględnij wyłącznie trzylatków

SELECT Nazwa_przedszkola, COUNT(*)
FROM dzieci INNER JOIN przedszkola ON dzieci.id_przedszkola=przedszkola.id_przedszkola
WHERE wiek=3
GROUP BY Nazwa_przedszkola;

-- C. Wyświetl imiona i nazwiska dzieci, które mają na liście preferencji przedszkole mające w nazwie "Zuch". 

SELECT imie , nazwisko , Nazwa_przedszkola
FROM dzieci INNER JOIN przedszkola ON dzieci.id_przedszkola=przedszkola.id_przedszkola
WHERE Nazwa_przedszkola LIKE '%zuch%';
 
-- D. Wyświetl imiona i nazwiska dzieci, które chodzą do przedszkola o identyfikatorze 16, 14, 8,28, 27 . Użyj operatora IN.

SELECT imie , nazwisko id_przedszkola
FROM dzieci 
WHERE id_przedszkola IN(16,14,8,28,27);


-- E. Zmodyfikuj zapytanie z części D tak, aby zamiast numerów przedszkoli były wyświetlane ich nazwy.

SELECT imie , nazwisko , Nazwa_przedszkola
FROM dzieci INNER JOIN przedszkola USING(id_przedszkola)
WHERE id_przedszkola IN(16,14,8,28,27);

 
-- F. Policz, ilu jest kandydatów do poszczególnych przedszkoli (wystarczą identyfikatory, uwzględnij tylko chłopców. Dane uporządkuj malejąco według ilości chętnych. Wyświetl tylko te wiersze, w których  ta ilość jest większa od 15.

SELECT Nazwa_przedszkola, COUNT(*)
FROM dzieci INNER JOIN przedszkola ON dzieci.id_przedszkola=przedszkola.id_przedszkola
WHERE plec='chlopiec'
GROUP BY Nazwa_przedszkola
HAVING COUNT(*) > 15
ORDER BY COUNT(*) desc;

-- G. Policz, ilu jest chętnych do poszczególnych przedszkoli. Wyświetl nazwy przedszkoli i liczbę miejsc w przedszkolach. Czy są takie przedszkola, w których liczba chętnych jest różna od ilości miejsc? 
 
SELECT Nazwa_przedszkola, liczba_miejsc, COUNT(*)
FROM dzieci INNER JOIN przedszkola ON dzieci.id_przedszkola=przedszkola.id_przedszkola
GROUP BY Nazwa_przedszkola
HAVING COUNT(*) != liczba_miejsc;

-- H. Utwórz uporządkowaną alfabetycznie według nazwisk, listę pięcioletnich dziewczynek, które są zapisane do przedszkola Smerf lub Stokrotka.

SELECT imie,nazwisko,Nazwa_przedszkola,wiek
FROM dzieci INNER JOIN przedszkola USING(id_przedszkola)
WHERE wiek=5 
AND plec='dziewczynka' 
AND (Nazwa_przedszkola LIKE '%smerf%' OR Nazwa_przedszkola LIKE '%stokrotka%')
ORDER BY nazwisko;

-- I.  Podaj nazwy czterech przedszkoli, które mają największą ilość chętnych (uporządkowane malejąco według ilości chętnych) 

SELECT Nazwa_przedszkola, COUNT(*) as ilosc_chetnych
FROM przedszkola INNER JOIN dzieci USING(id_przedszkola)
GROUP BY Nazwa_przedszkola
ORDER BY ilosc_chetnych desc
LIMIT 4;