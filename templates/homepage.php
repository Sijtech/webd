<?php include "templates/include/header.php" ?>
<div id="art">
  <h1>Artikel</h1>
  <?php
  foreach ($artikelListe as $einzelnerArtikel) {
    echo $einzelnerArtikel->id;
    echo $einzelnerArtikel->autor;
    echo $einzelnerArtikel->titel;
    echo $einzelnerArtikel->artikel;
    echo $einzelnerArtikel->erstelldatum;
  }
  ?>

</div>
<?php include "templates/include/footer.php" ?>
