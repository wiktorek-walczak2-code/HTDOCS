-- − Zapytanie 1: wybierające jedynie kod, nazwę i cenę kursów posortowane rosnąco według ceny

SELECT kod,nazwa,cena 
FROM kursy
ORDER BY cena ASC;

-- − Zapytanie 2: wybierające imiona i nazwiska uczestników z tabeli uczestnicy oraz odpowiadające im daty z tabeli kursy_uczestnicy. Należy posłużyć się relacją.

SELECT imie,nazwisko,kursy_uczestnicy.data
FROM uczestnicy inner join kursy_uczestnicy on uczestnicy.id_uczestnika=kursy_uczestnicy.id_uczestnika;

-- − Zapytanie 3: wybierające jedynie nazwy wszystkich kursów z tabeli kursy oraz odpowiadające im daty z tabeli kursy_uczestnicy.  Uporządkuj rosnąco według nazwy kursu. Należy posłużyć się relacją.

SELECT nazwa,data
FROM kursy inner join kursy_uczestnicy on kursy.kod=kursy_uczestnicy.kod_kursu
ORDER BY nazwa ASC;

-- − Zapytanie 4: tworzące zestawienie, na którym widoczne są nazwy wszystkich kursów oraz liczby osób zapisanych na te kursy. Nazwa kolumny z liczbą osób (alias): „Zapisanych”

SELECT nazwa, COUNT(data) as "Zapisanych"
FROM kursy inner join kursy_uczestnicy on kursy.kod=kursy_uczestnicy.kod_kursu
GROUP BY nazwa;

-- − Zapytanie 5 : wybierające imiona i nazwiska uczestników z tabeli uczestnicy, daty z tabeli kursy_uczestnicy oraz nazwy kursów z tabeli kursy. Należy posłużyć się relacją.

SELECT imie,nazwisko,data,nazwa
FROM uczestnicy
    inner join kursy_uczestnicy on uczestnicy.id_uczestnika=kursy_uczestnicy.id_uczestnika
    inner join kursy on kursy_uczestnicy.kod_kursu=kursy.kod;

-- ‒ Zapytanie 1: wybierające jedynie nazwę, cenę i opis wszystkich abonamentów

SELECT nazwa,cena,opis
FROM abonamenty;

-- ‒ Zapytanie 2: liczące średnią cenę abonamentów. Cena jest zaokrąglona do dwóch miejsc po przecinku oraz nadano nazwę kolumny (alias) na „Srednio_abonament”

SELECT ROUND(AVG(cena),2) as "Średnio_abonament"
FROM abonamenty;

-- ‒ Zapytanie 3: wyświetlające cechę oraz id abonamentów w których występuje. Dane uporządkuj według pola cecha.

SELECT cecha,abonamenty_id
FROM cechy INNER JOIN szczegolyabonamentu on cechy.id=szczegolyabonamentu.cechy_id
ORDER BY cecha;

-- ‒ Zapytanie 4: wyświetlające cechę wraz z liczbą abonamentów, w których występuje. Dane pogrupuj według pola cecha. Należy zastosować relację.

SELECT cecha, COUNT(*)
FROM cechy INNER JOIN szczegolyabonamentu ON cechy.id=szczegolyabonamentu.cechy_id
GROUP BY cecha;

-- ‒ Zapytanie 5: wybierające jedynie nazwę abonamentu i odpowiadającą mu cechę dla abonamentu o id równym 1. Należy zastosować pełną relację n:m

SELECT nazwa, cecha
FROM abonamenty 
    INNER JOIN szczegolyabonamentu ON abonamenty.id=szczegolyabonamentu.abonamenty_id
    INNER JOIN cechy ON szczegolyabonamentu.cechy_id=cechy.id
WHERE abonamenty.id = 1;