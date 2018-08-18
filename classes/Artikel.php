<?php

class Artikel
{
  //Eigenschaften
  public $id;
  public $autor;
  public $titel;
  public $artikel;
  public $erstelldatum;
  //Debug Funktion
  public static function debug($test) {
    echo $test;
  }
  //Konstruktor

  //Einzelnen Artikel mittels ID auslesen
  public static function getArtikelById($id) {

  }
  //gewünschte Anzahl an Artikeln aus der DB auslesen
  public static function getArtikelList($anzArtikel=100000, $sortierung="erstelldatum DESC") {
    echo "getArtikelList";
    try {
      $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
      if($conn == true) {
        $sql = "SELECT * FROM Artikel
                ORDER BY $sortierung LIMIT $anzArtikel;";
        echo $sql;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $fields = $stmt->fetchAll();


          foreach ($fields as $field) {
            //echo implode(",",$field);
            echo $field["Titel"];
          }
            } else {
        echo "no connection";
      }
      $conn = null;
    } catch(Exception $e) {
      echo $e->getMessage();
    }
  }
  //Artikel erstellen
  public function createArtikel() {

  }
  //Artikel bearbeiten
  public function editArtikel() {

  }
  //Artikel löschen
  public function deleteArtikel() {

  }

}
?>
