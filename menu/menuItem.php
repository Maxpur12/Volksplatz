<?php
require '../db/db.php';

class menuItem{

private $name;
private $sub_menu;
private $rank;

    public function __construct($name,$sub_menu,$rank){
        $this->name = $name;
        $this->sub_menu = $sub_menu;
        $this->rank = $rank;

        

    }

    public function insertMenuItem($db){
        $sql = $db->prepare("INSERT INTO menu (M_ID,M_Name,M_SubMenu,M_Rank) VALUES (NULL,?,?,?)");
        $sql->execute(array($this->name,$this->sub_menu,$this->rank)) or die("Fehler insertMenuItem()");
        echo "Eingabe erfolgreich";
    }

}

?>