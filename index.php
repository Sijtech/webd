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
     //$results['totalRows'] = "5";
    //$results['pageTitle'] = "Widget News";
    require( TEMPLATE_PATH . "/homepage.php" );
  }
?>
