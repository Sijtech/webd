<?php include "templates/include/header.php"; ?>
<div id="art">
  <input type="hidden" name="idArtikel" value="<?php echo $results['article']->id ?>" />
  <input type="hidden" name="Autor" value="1"/>
  <input type="hidden" name="Erstelldatum" id="erstelldatum" placeholder="YYYY-MM-DD HH:mm:ss" value="<?php echo $results['article']->erstelldatum ?>" />
  <h1>
    <?php echo $results['article']->titel ?>
  </h1>
  <p>
		<?php echo $results['article']->artikel ?>  
  </p>


</div>
<?php include "templates/include/footer.php" ?>
