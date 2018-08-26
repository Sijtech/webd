<?php include "templates/include/header.php" ?>
<div id="art">
  <h1>Artikel</h1>
  <table>
    <tr>
      <th>Erstellungsdatum</th>
      <th>Artikel</th>
    </tr>
    <?php foreach ($artikelListe as $einzelnerArtikel) { ?>
      <tr onclick="location='admin.php?action=editArticle&amp;id=<?php echo $einzelnerArtikel->id ?>'">
        <td><?php echo $einzelnerArtikel->erstelldatum ?></td>
        <td><?php echo $einzelnerArtikel->titel ?></td>
      </tr>
    <?php } ?>
  </table>

</div>
<?php include "templates/include/footer.php" ?>
