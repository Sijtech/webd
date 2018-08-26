<?php include "templates/include/header.php"; ?>
<div id="art">
  <form action="admin.php?action=<?php echo $results['formAction'] ?>" method="post">
    <input type="hidden" name="idArtikel" value="<?php echo $results['article']->id ?>" />
    <input type="hidden" name="Autor" value="1"/>
    <input type="hidden" name="Erstelldatum" id="erstelldatum" placeholder="YYYY-MM-DD HH:mm:ss" value="<?php echo $results['article']->erstelldatum ?>" />
    <ul>
      <li>
        <label for="title">Titel</label>
        <input type="text" name="Titel" id="title" placeholder="Name des Artikels" required autofocus maxlength="255" value="<?php echo $results['article']->titel ?>"/>
      </li>

      <li>
        <label for="content">Artikel Inhalt</label>
        <textarea name="Artikel" id="content" placeholder="Artikel" required maxlength="100000" style="height: 30em;"><?php echo $results['article']->artikel ?></textarea>
      </li>
    </ul>

    <div class="buttons">
      <input type="submit" name="saveChanges" value="Speichern" />
      <input type="submit" formnovalidate name="cancel" value="Abbrechen" />
    </div>

  </form>
    <?php if (!is_null($results['article']->id)) { ?>
      <p><a href="admin.php?action=deleteArticle&amp;id=<?php echo $results['article']->id ?>" onclick="return confirm('Diesen Artikel löschen?')">Artikel löschen</a></p>
    <?php } ?>
</div>
<?php include "templates/include/footer.php" ?>
