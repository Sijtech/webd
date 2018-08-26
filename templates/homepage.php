<?php 
  include "templates/include/header.php"; 
  foreach ($artikelListe as $einzelnerArtikel) {
?>
    <article id="listArticles">
    <?php
    //echo $einzelnerArtikel->id . " ";
    echo "<h3>" . $einzelnerArtikel->titel . "</h3>";
    echo "<p>" . $einzelnerArtikel->artikel . "</p>";
    echo $einzelnerArtikel->autor . " - " . $einzelnerArtikel->erstelldatum . "<br>";
    ?>
    </article>
  <?php } ?>

<?php include "templates/include/footer.php" ?>
