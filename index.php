<?php

  require( "config.php" );

  switch ($action) {
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
