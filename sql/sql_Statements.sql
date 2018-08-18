-- In einem Statement den Artikel, mit aufgelösten Benutzer und Kategorie auflisten.
SELECT Erstelldatum, Titel, Artikel, Kategorie, Benutzername, a.idArtikel FROM 
	Artikel a INNER JOIN Benutzer b ON a.Autor = b.idBenutzer 
    INNER JOIN Art_Kat ak ON a.idArtikel = ak.idArtikel
    INNER JOIN Kategorie k ON k.idKategorie = ak.idKategorie
    ORDER BY erstelldatum DESC LIMIT 5;
    
SELECT * FROM Artikel
    ORDER BY erstelldatum DESC LIMIT 5;