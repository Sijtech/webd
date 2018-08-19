<?php

  require( "config.php" );
  $artikelListe = Artikel::getArtikelList();
   //$results['totalRows'] = "5";
  //$results['pageTitle'] = "Widget News";
  require( TEMPLATE_PATH . "/homepage.php" );
?>
