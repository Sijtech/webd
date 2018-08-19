<?php

class Artikel
{
  //Eigenschaften
  public $id = null;
  public $autor = null;
  public $titel = null;
  public $artikel = null;
  public $erstelldatum = null;
  //Debug Funktion
  public static function debug($test) {
    echo $test;
  }
  //Konstruktor
  public function __construct($data=array()) {
    //echo $data["idArtikel"];
    if(isset($data["idArtikel"]))$this->id = $data["idArtikel"];
    if(isset($data["Autor"]))$this->autor = $data["Autor"];
    if(isset($data["Titel"]))$this->titel = $data["Titel"];
    if(isset($data["Artikel"]))$this->artikel = $data["Artikel"];
    if(isset($data["Erstelldatum"]))$this->erstelldatum = $data["Erstelldatum"];
  }
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

        $artikelListe = array();
        while ($row = $stmt->fetch()) {
          $artikelObj = new Artikel($row);
          //echo $artikelObj->titel;
          $artikelListe[] = $artikelObj;
        }
      } else {
        echo "no connection";
      }
      $conn = null;
      return $artikelListe;
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
