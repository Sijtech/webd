<?php
/** 
 * Backend
 * Verwaltutung von Artikeln, Kategorien und Benutzern 
 */
require( "config.php" );
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
switch ( $action ) {
  case 'login':
    login();
    break;
  case 'logout':
    logout();
    break;
  case 'newArticle':
    newArticle();
    break;
  case 'editArticle':
    editArticle();
    break;
  case 'deleteArticle':
    deleteArticle();
    break;
  default:
    listArticles();
}

function login() {
}
function logout() {
}
/**
 * neuen Artikel erstellen
 */
function newArticle() {
  //Array anlegen
  $results = array();
  $results['formAction'] = "newArticle";
  //Wenn ein neuer Artikel gespeichert wurde
  if (isset($_POST['saveChanges'])) 
  {
    //neues Artikel Objekt erstellen
    $article = new Artikel;
    //Formular Daten dem Objekt übergeben
    $article->storeFormValues( $_POST );
    //aktuelles Datum als Erstellungsdatum festlegen
    $article->erstelldatum = date("Y-m-d H:i:s");
    //Den Artikel in die DB speichern
    $article->createArtikel();
    //wieder die admin Page öffnen
    header( "Location: admin.php?status=changesSaved" );
  }
  //Vorgang "neuen Artikel erstellen" abbrechen
  elseif (isset($_POST['cancel'])) 
  { 
    header( "Location: admin.php" );
  }
  //Neuer Artikel wurde noch nicht erstellt
  else 
  {
    //Neues Artikel-Objekt erstellen
    $results['article'] = new Artikel();
    //ID NULL zuweisen, da es ein neuer Artikel ist
    $results['article']->id = NULL;
    //folgende Seite anzeigen
    require( TEMPLATE_PATH . "/admin/editArticle.php" );
  }
}
/**
 * Artikel bearbeiten
 */
function editArticle() {
  //Array anlegen
  $results = array();
  $results['formAction'] = "editArticle";
  //Wenn die Änderungen abgespeichert wurden
  if ( isset( $_POST['saveChanges'] ) ) {
        
      // User has posted the article edit form: save the article changes
      echo $_POST["idArtikel"];
      if (is_null($_POST["idArtikel"])) {
          header( "Location: admin.php?error=articleNotFound" );
          return;
      }
      $article = new Artikel();
      $article->storeFormValues( $_POST );
      $article->editArtikel();
      header( "Location: admin.php?status=changesSaved" );
      
  } 
  //Wenn das Bearbeiten abgebrochen wurde
  elseif ( isset( $_POST['cancel'] ) ) 
  {
    header( "Location: admin.php" );
  } 
  //Artikel wurde noch nicht bearbeitet
  else 
  {
    //mittels ID der URL den Artikel abfragen und in ein Objekt speichern
    $results['article'] = Artikel::getArtikelById((int)$_GET['id']);
    //folgende Seite anzeigen
    require( TEMPLATE_PATH . "/admin/editArticle.php" );
  }
}
/**
 * Artikel löschen
 */
function deleteArticle() {
  //Neues Artikel-Objekt erstellen
  $article = new Artikel();
  //mittels ID der URL den Artikel abfragen und in ein Objekt speichern
  $article = Artikel::getArtikelById( (int)$_GET['id'] );
  //Artikel löschen
  $article->deleteArtikel();
  //folgende Seite anzeigen
  header( "Location: admin.php?status=articleDeleted" );
}
/**
 * alle Artikel auflisten
 */
function listArticles() {
  //Liste von Artikel aus der DB abfragen
  $artikelListe = Artikel::getArtikelList();
   //$results['totalRows'] = "5";
  //$results['pageTitle'] = "Widget News";
  if ( isset( $_GET['status'] ) ) {
      if ( $_GET['status'] == "changesSaved" ) $results['statusMessage'] = "Deine Änderungen wurden gespeichert.";
      if ( $_GET['status'] == "articleDeleted" ) $results['statusMessage'] = "Artikel gelöscht.";
  }
  //folgende Seite anzeigen
  require( TEMPLATE_PATH . "/admin/listArticles.php" );
}

?>
