<?php
//require_once 'db/db.php';
require_once '../db/db.php';

/**
 * Nutzereingabemöglichkeit für/und die Erstellung von Menüpunkten
 * @author Max Stötzner
 * @var name Name des Menüs
 * @var sub_menu Eingabe wenn es ein Untermenü ist, Angabe des Obermenüs
 * @var rank Wert des Rangs
 */


class menuItem{
/**
 * Name des Menüpunktes
 */
private $name; 
/**
 * Name des Obermenüs/Oberkategorie
 */
private $sub_menu;
/**
 * Rang des Menüpunktes
 */
private $rank; 

    /**
     * Konstruktor der Klasse "menuItem"
     * @param name Name des Menü
     * @param sub_menu Eingabe wenn es ein Untermenü ist, Angabe des Obermenüs
     * @param rank Wert des Rangs
     */
    public function __construct($name,$sub_menu,$rank){
        $this->name = $name;
        $this->sub_menu = $sub_menu;
        $this->rank = $rank;
  
    }

    /**
     * Eintrag des Menüs in der Datenbank
     * @param db Datenbank die verwendet werden soll
     * @return null
     */
    public function insertMenuItem($db){
        $sql = $db->prepare("INSERT INTO menu (M_ID,M_Name,M_SubMenu,M_Rank) VALUES (NULL,?,?,?)");
        $sql->execute(array($this->name,$this->sub_menu,$this->rank)) or die("Fehler insertMenuItem()");
      //  echo "Eingabe erfolgreich";
    }
    /**
     * Rang eines MenuItems bekommen
     * @return rank
     */
    public function getRank(){
        return $this->rank;
    }
    /**
     * Rang zwischen 2 MenuItems prüfen, Wenn beide gleichen Rang, Abbruch des Programms
     * 
     * @param menuItem1 Erster Menüpunkt der verglichen werden soll
     * @param menuItem2 Zweiter Menüpunkt der verglichen werden soll
     * @todo Überarbeitung hinsichtlich Sub_Menu
     */
    public function checkRank($menuItem1, $menuItem2){
            if ($menuItem1 == $menuItem2){
                die("Fehler: Rank zwischen $menuItem1 und $menuItem2 ist gleich!");
            }
    }

/**
 * Auslesen der Menüpunkte in der Datenbank; Vergleichen mit eingegebenen MenüItem; wenn Rang gleich, dann kein Eintrag
 * @var database Datenbank aus der die Inhalte geladen werden sollen
 * @var rankItem Eingegebenes MenüItem / Name des MenüPunktes
 * @var rank Eingegebener Rang des $rankItem
 */
public function rank($database, $rankItem, $rank){
    $sql_abfrage = $database->prepare("SELECT M_SubMenu, M_Rank FROM menu");
    $sql_abfrage->execute() or die("Fehler: rank()");
    
while($row = $sql_abfrage->fetch()){
    $erg = $row['M_Rank'];
    $rankItem->checkRank($erg, $rank);
}

}



}

session_start();
if(!isset($_SESSION['userid'])) {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location:login.php');
    die('Bitte zuerst <a href="login.php">einloggen</a>');
}

include ("header.php");

if(isset($_GET['insert'])){
    $menuName = $_POST['name'];
    $itemRank = $_POST['rank'];
    $sub_menu = NULL;
    $menuItem = new menuItem($menuName,$sub_menu,$itemRank);
    $menuItem->rank($db, $menuItem, $itemRank);
    $menuItem->insertMenuItem($db);

    
    
    }
?>

<form action="?insert=1" method="post" enctype="multipart/form-data">
    Menü Item Name:<br>
    <input type="text" name="name"><br>
    Rang:<br>
    <input type="text" name="rank">
    <input type="submit" name="submit">


<?php include ("footer.php")?>

  </form>