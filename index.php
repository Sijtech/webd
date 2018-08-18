<?php

  require( "config.php" );
  Artikel::getArtikelList();
  $results['articles'] = "Artikel von mir";
  $results['totalRows'] = "5";
  $results['pageTitle'] = "Widget News";
  require( TEMPLATE_PATH . "/homepage.php" );
?>
