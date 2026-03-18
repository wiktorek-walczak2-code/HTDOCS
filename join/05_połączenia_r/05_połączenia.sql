-- 3. Które osoby figurujące w bazie jako czytelnicy, nie wypożyczyły ani razu choćby jednej książki? (tabele: Czytelnik, Wypożyczenia, pola w kwerendzie: Czytelnik_Imie, Czytelnik_Nazwisko, Data_wypozyczenia)

SELECT Czytelnik_Imie,Czytelnik_Nazwisko,Data_wypozyczenia
FROM czytelnik LEFT JOIN wypozyczenia ON czytelnik.id=wypozyczenia.czytelnik_id
WHERE Data_wypozyczenia IS NULL;

-- 4. Kto nie ma kota? (Tabele: Ludzie, Koty, pola w kwerendzie: Imie, Nazwisko, Imie_kota, Rasa)

SELECT imie,nazwisko,imie_kota,Rasa,ID_KOTA,id_wlasciciela,id
FROM ludzie LEFT JOIN koty ON ludzie.id=koty.id_wlasciciela
WHERE id_wlasciciela IS NULL;

-- 5.Jak ma na imię kot bez właściciela?   (Tabele: Ludzie, Koty, pola w kwerendzie: Imie_kota oraz nie wyświetlane pole Nazwisko - tylko dla kryterium) 

SELECT imie_kota
FROM koty LEFT JOIN ludzie ON koty.id_wlasciciela=ludzie.id
WHERE id IS NULL;

-- 6. Wyświetl informacje o uczniach, którzy nie mają ocen  (tabele: Uczniowie, Oceny, pola w kwerendzie: imie, nazwisko, ocena, data)

SELECT imie,nazwisko,ocena,data
FROM uczniowie LEFT JOIN oceny ON uczniowie.iducznia=oceny.iducznia
WHERE ocena IS NULL;

-- 7. Wyświetl informacje o przedmiotach, z których nie wystawiono żadnych ocen (tabele: Oceny, Przedmioty, pola w kwerendzie: Nazwa_przedmiotu, Nazwisko_nauczyciela, Data)

SELECT nazwaprzedmiotu, ocena
FROM przedmioty LEFT JOIN OCENY ON przedmioty.idprzedmiotu=oceny.idprzedmiotu
WHERE ocena IS NULL;

-- 8. Właściciel wypożyczalni filmów (online) potrzebuje raportu o ich popularności (ile razy dany film został wypożyczony). Niestety przygotowane zestawienie nie uwzględniało filmów nigdy nie wypożyczonych. Napraw to. Przygotuj kwerendę wyświetlającą tytuły filmów nigdy nie wypożyczonych (tabele: Filmy, Wypożyczenia; pola w kwerendzie: Tytul, Gatunek, Data_wyp)

 SELECT tytul, gatunek, COUNT(id_wyp)
 FROM filmy LEFT JOIN wypozyczenia ON filmy.id_filmu=wypozyczenia.id_filmu
 GROUP BY filmy.id_filmu
 ORDER BY COUNT(id_wyp) DESC;
 


 SELECT tytul, Data_wyp
 FROM filmy LEFT JOIN wypozyczenia ON filmy.id_filmu=wypozyczenia.id_filmu
 WHERE Data_wyp IS NULL;

-- 9. Poprawiasz bazę danych pewnej przychodni. Twoim zadaniem jest wymusić więzy integralności między tabelami Pacjenci i Wizyty.

ALTER TABLE pacjenci
ADD PRIMARY KEY (id_pacjenta);

 ALTER TABLE wizyty 
 ADD FOREIGN KEY(id_pacjenta) REFERENCES pacjenci(id_pacjenta);

-- A. Odszukaj wiersze, które naruszają więzy integralności (tzn.w tabeli Wizyty występuje ID_pacjenta, którego nie ma w tabeli Pacjenci)

SELECT DISTINCT id_pacjenta
FROM wizyty LEFT JOIN pacjenci USING(id_pacjenta)
WHERE imie IS NULL;

-- B. Być może w bazie brakuje pacjenta pacjenta Antoniego Mizerskiego (ubezpieczony), którego ktoś omyłkowo usunął z tabeli Pacjenci. Niestety nikt nie pamięta jaki miał identyfikator. Jeśli go odszukasz (przygotuj kwerendę), to dopisz Antoniego do tabeli Pacjenci.
 
INSERT INTO pacjenci
VALUES
(58,'Antoni','Mizerski',1,'m');

