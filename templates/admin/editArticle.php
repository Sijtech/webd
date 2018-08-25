<?php include "templates/include/header.php";
    echo $results['article']['id'];
?>
<div id="art">
  <form action="admin.php?action=<?php echo $results['formAction'] ?>" method="post">
    <input type="hidden" name="idArtikel" value="<?php echo $results['article']->id ?>" />
    <input type="hidden" name="Autor" value="1"/>
    <ul>
      <li>
        <label for="title">Titel</label>
        <input type="text" name="Titel" id="title" placeholder="Name des Artikels" required autofocus maxlength="255" value="<?php echo $results['article']->titel ?>"/>
      </li>

      <li>
        <label for="content">Artikel Inhalt</label>
        <textarea name="Artikel" id="content" placeholder="Artikel" required maxlength="100000" style="height: 30em;"><?php echo $results['article']->artikel ?></textarea>
      </li>

      <!-- <li>
        <label for="erstellungsdatum">Erstellungsdatum</label>
        <input disabled type="date" name="Erstelldatum" id="erstellungsdatum" placeholder="YYYY-MM-DD HH:mm:ss" required maxlength="10" value="<?php echo $results['article']->erstelldatum ?>" />
      </li>-->
    </ul>

    <div class="buttons">
      <input type="submit" name="saveChanges" value="Speichern" />
      <input type="submit" formnovalidate name="cancel" value="Abbrechen" />
    </div>

  </form>

</div>
<?php include "templates/include/footer.php" ?>
