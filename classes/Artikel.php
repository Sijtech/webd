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
  //Formular
  public function storeFormValues($param) {
    $this->__construct($param);
  }
  //Einzelnen Artikel mittels ID auslesen
  public static function getArtikelById($id) {
      $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
      $sql = "SELECT * FROM Artikel WHERE id = :id";
      $st = $conn->prepare( $sql );
      $st->bindValue( ":id", $id, PDO::PARAM_INT );
      $st->execute();
      $row = $st->fetch();
      $conn = null;
      if ( $row ) return new Artikel( $row );
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
    try {
      $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
      if($conn == true) {
        $sql = "INSERT INTO Artikel VALUES
                (:id, :autor, :titel, :artikel, :erstelldatum);";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":id", $this->id, PDO::PARAM_INT);
        $stmt->bindValue(":autor", $this->autor, PDO::PARAM_INT);
        $stmt->bindValue(":titel", $this->titel, PDO::PARAM_STR);
        $stmt->bindValue(":artikel", $this->artikel, PDO::PARAM_STR);
        $stmt->bindValue(":erstelldatum", $this->erstelldatum, PDO::PARAM_STR);
        $stmt->execute();
        $this->artikelId = $conn->lastInsertId();
      } else {
        echo "no connection";
      }
      $conn = null;
    } catch(Exception $e) {
      echo $e->getMessage();
    }
  }
  //Artikel bearbeiten
  public function editArtikel() {

  }
  //Artikel löschen
  public function deleteArtikel() {

  }

}
?>
