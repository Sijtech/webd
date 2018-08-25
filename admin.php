<?php
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

function newArticle() {
  $results['formAction'] = "newArticle";
  if ( isset( $_POST['saveChanges'] ) ) 
  {
    $article = new Artikel;
    $article->storeFormValues( $_POST );
    $article->erstelldatum = date("Y-m-d H:i:s");
    echo $article->erstelldatum;
    $article->createArtikel();
    header( "Location: admin.php?status=changesSaved" );

  } 
  elseif ( isset( $_POST['cancel'] ) ) 
  {

    // User has cancelled their edits: return to the article list
    header( "Location: admin.php" );
  } 
  else 
  {

    // User has not posted the article edit form yet: display the form
    $results['article'] = new Artikel();
    $results['article']->id = NULL;
    require( TEMPLATE_PATH . "/admin/editArticle.php" );
  }
}

function editArticle() {
    $results = array();
    $results['pageTitle'] = "Edit Article";
    $results['formAction'] = "editArticle";
    
    if ( isset( $_POST['saveChanges'] ) ) {
        
        // User has posted the article edit form: save the article changes
        
        if ( !$article = Artikel::getById( (int)$_POST['articleId'] ) ) {
            header( "Location: admin.php?error=articleNotFound" );
            return;
        }
        
        $article->storeFormValues( $_POST );
        $article->update();
        header( "Location: admin.php?status=changesSaved" );
        
    } elseif ( isset( $_POST['cancel'] ) ) {
        
        // User has cancelled their edits: return to the article list
        header( "Location: admin.php" );
    } else {
        
        // User has not posted the article edit form yet: display the form
        $results['article'] = Artikel::getArtikelById( (int)$_GET['id'] );
        require( TEMPLATE_PATH . "/admin/editArticle.php" );
    }
}
function deleteArticle() {
}

function listArticles() {
  $artikelListe = Artikel::getArtikelList();
   //$results['totalRows'] = "5";
  //$results['pageTitle'] = "Widget News";
  if ( isset( $_GET['status'] ) ) {
      if ( $_GET['status'] == "changesSaved" ) $results['statusMessage'] = "Deine Änderungen wurden gespeichert.";
      if ( $_GET['status'] == "articleDeleted" ) $results['statusMessage'] = "Artikel gelöscht.";
  }
  require( TEMPLATE_PATH . "/admin/listArticles.php" );
}

?>
