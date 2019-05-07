<?php
require_once 'db/db.php';
//require_once '../db/db.php';

class menuItem{

   

private $name; //Name des Menüs
private $sub_menu; //Untermenü? Name der Oberkategorie angeben
private $rank; //Rang des Menüs; In welcher Reihenfolge die Menüpunkte auftauchen

    /**
     * Konstruktor der Klasse "menuItem"
     * $name = Name des MenüItems
     * $sub_menu = Ist es ein Sub_Menu; Name der Oberkategorie eingaben
     */
    public function __construct($name,$sub_menu,$rank){
        $this->name = $name;
        $this->sub_menu = $sub_menu;
        $this->rank = $rank;
  
        

    }
    /**
     * Eintrag des Menüs in der Datenbank
     * $db = Datenbank (in db/db.php)
     */
    public function insertMenuItem($db){
        $sql = $db->prepare("INSERT INTO menu (M_ID,M_Name,M_SubMenu,M_Rank) VALUES (NULL,?,?,?)");
        $sql->execute(array($this->name,$this->sub_menu,$this->rank)) or die("Fehler insertMenuItem()");
      //  echo "Eingabe erfolgreich";
    }
    /**
     * Rang eines MenuItems bekommen
     */
    public function getRank(){
        return $this->rank;
    }
    /**
     * Rang zwischen 2 MenuItems prüfen
     * Wenn beide gleichen Rang, Abbruch des Programms
     * Todo: Überarbeitung hinsichtlich Sub_Menu
     */
    public function checkRank($menuItem1, $menuItem2){
            if ($menuItem1 == $menuItem2){
               // die("Fehler: Rank zwischen $menuItem1 und $menuItem2 ist gleich!");
            }
    }

}

?>