<?php
/**
 * Datum: 14.09.2018
 * Version: 0.9
 * @author Severin, Karin, Joel
 * Projekt: ownCMS
 */
//conf einbinden
include "config.php";

//search Param vorhanden
if (isset($_REQUEST['search'])) {
  //Suchinhalt zuweisen
  $search = $_GET['search'];
  //Wenn search vorhanden
  if ($search !== "") {
    $search = strtolower($search);
    //alle Artikel abfragen
    $artikelListe = Artikel::getArtikelList();
    foreach ($artikelListe as $einzelnerArtikel) {
      //Für jeden Artikel die Übereinstimmung mit der Search prüfen
      if (strpos(strtolower($einzelnerArtikel->titel), $search) !== false) 
      {
        //Treffer zurück geben
        $values[] = $einzelnerArtikel;
      }
      
    }
  }
  //Array als JSON übermitteln
  echo json_encode($values);
}