<?php

class Artikel
{
  //Eigenschaften des Objekts
  public $id = null;
  public $autor = null;
  public $titel = null;
  public $artikel = null;
  public $erstelldatum = null;
  /** 
   * Konstruktor, welcher ds Objekt inittialisiert
   * @param array $data Beinhaltet die Eigenschaften des Objekts
   */
  public function __construct($data=array()) {
    //Wenn die entsprechende Eigenschaft im Array ist, diese Eigenschaft dem objekt zuweisen
    if(isset($data["idArtikel"]))$this->id = $data["idArtikel"];
    if(isset($data["Autor"]))$this->autor = $data["Autor"];
    if(isset($data["Titel"]))$this->titel = $data["Titel"];
    if(isset($data["Artikel"]))$this->artikel = $data["Artikel"];
    if(isset($data["Erstelldatum"]))$this->erstelldatum = $data["Erstelldatum"];
  }
  /** 
   * Formular Felder dem Konstruktor zuweisen. 
   * Erstellt aus den Eingaben auf der Webseite das Objekt
   * @param array $param
   */
  public function storeFormValues($param) {
    $this->__construct($param);
  }
  /** 
   * Einen Artikel mittels ID aus der DB auslesen
   * @param string $id
   * @return Artikel
   */
  public static function getArtikelById($id) {
    try 
    {
      $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
      if($conn == true)
      {
        $sql = "SELECT * FROM Artikel WHERE idArtikel = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue( ":id", $id, PDO::PARAM_INT );
        $stmt->execute();
        $row = $stmt->fetch();
      }
      else {
        echo "no connection";
      }
      $conn = null;
      if ( $row ) return new Artikel( $row );
    } 
    catch(Exception $e) 
    {
      echo $e->getMessage();
    }
  }
  /**
   * mehrere Artikel aus der DB auslesen
   * @param number $anzArtikel
   * @param string $sortierung
   * @return Artikel[]
   */
  public static function getArtikelList($anzArtikel=100000, $sortierung="erstelldatum DESC") {
    try 
    {
      $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
      if($conn == true) 
      {
        $sql = "SELECT * FROM Artikel
                ORDER BY $sortierung LIMIT $anzArtikel;";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $artikelListe = array();
        while ($row = $stmt->fetch()) 
        {
          $artikelObj = new Artikel($row);
          $artikelListe[] = $artikelObj;
        }
      } 
      else 
      {
        echo "no connection";
      }
      $conn = null;
      return $artikelListe;
    } 
    catch(Exception $e) 
    {
      echo $e->getMessage();
    }
  }
  /**
   * Artikel in DB abspeichern
   */
  public function createArtikel() {
    try 
    {
      $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
      if($conn == true) 
      {
        $sql = "INSERT INTO Artikel VALUES
                (:id, :autor, :titel, :artikel, :erstelldatum);";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":id", $this->id, PDO::PARAM_INT);
        $stmt->bindValue(":autor", $this->autor, PDO::PARAM_INT);
        $stmt->bindValue(":titel", $this->titel, PDO::PARAM_STR);
        $stmt->bindValue(":artikel", $this->artikel, PDO::PARAM_STR);
        $stmt->bindValue(":erstelldatum", $this->erstelldatum, PDO::PARAM_STR);
        $stmt->execute();
        $this->idArtikel = $conn->lastInsertId();
      } 
      else 
      {
        echo "no connection";
      }
      $conn = null;
    } 
    catch(Exception $e) 
    {
      echo $e->getMessage();
    }
  }
  /**
   * existierenden Artikel in DB anpassen
   */
  public function editArtikel() {
    //Hat das Artikel Objekt eine ID
    if ( is_null( $this->id ) ) trigger_error ( "Article::update(): Die ID der Objekts fehlt, weshalb der Artikel nicht geupdated wurde.", E_USER_ERROR );
    
    try 
    {
      $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
      if($conn == true)
      {
        $sql = "UPDATE Artikel SET Titel=:titel, Artikel=:artikel WHERE idArtikel = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue( ":titel", $this->titel, PDO::PARAM_STR );
        $stmt->bindValue(":artikel", $this->artikel, PDO::PARAM_STR);
        $stmt->bindValue(":id", $this->id, PDO::PARAM_INT);
        $stmt->execute();
      }
      else 
      {
        echo "no connection";
      }
      $conn = null;
    }
    catch(Exception $e)
    {
      echo $e->getMessage();
    }
  }
  /**
   * Artikel aus der DB löschen
   */
  public function deleteArtikel() {
    //Hat das Artikel Objekt eine ID
    if ( is_null( $this->id ) ) trigger_error ( "Article::delete(): Die ID der Objekts fehlt, weshalb der Artikel nicht gelöscht wurde.", E_USER_ERROR );
    try
    {
      $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
      if($conn == true)
      {
        $stmt = $conn->prepare ( "DELETE FROM Artikel WHERE idArtikel = :id LIMIT 1" );
        $stmt->bindValue(":id", $this->id, PDO::PARAM_INT);
        $stmt->execute();
      }
      else
      {
        echo "no connection";
      }
      $conn = null;
    }
    catch(Exception $e)
    {
      echo $e->getMessage();
    }
  }

}
?>
