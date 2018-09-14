<?php

  require( "config.php" );
  $action = isset( $_GET['action'] ) ? $_GET['action'] : "";
  switch ($action) {
    case 'showArticle':
      showArticle();
      break;
    default:
      homepage();
  }

  function homepage() {
    $artikelListe = Artikel::getArtikelList();
    require( TEMPLATE_PATH . "/homepage.php" );
  }
  
  function showArticle() {
    //ID des anzuzeigenden Artikels einlesen
    $id = $_GET['id'];
    //Den Artikel abfragen
    $results['article'] = Artikel::getArtikelById($id);
    //folgende Seite anzeigen
    require( TEMPLATE_PATH . "/homepage/showArticle.php" );
  }
?>
