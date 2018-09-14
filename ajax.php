<?php
 
//Including Database configuration file.
include "config.php";

//Getting value of "search" variable from "script.js".
if (isset($_REQUEST['search'])) {
  //Search box value assigning to $Name variable.
  $search = $_GET['search'];
  if ($search !== "") {
    $search = strtolower($search);
    $artikelListe = Artikel::getArtikelList();
    foreach ($artikelListe as $einzelnerArtikel) {
      if (strpos(strtolower($einzelnerArtikel->titel), $search) !== false) 
      {
//         $values[] = $einzelnerArtikel->titel;
        $values[] = $einzelnerArtikel;
      }
      
    }
  }
  echo json_encode($values);
}