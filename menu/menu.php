<?php

require_once 'menuItem.php';
require_once '../db/db.php';


$name = "Startseite";
$sub_menu = NULL;
$rank = 0;

/*$menu = new menuItem($name,$sub_menu,$rank);
$menu->insertMenuItem($db);
*/


$menuItem = new menuItem($name,$sub_menu,$rank);
rank($db, $menuItem, $rank);
$menuItem->insertMenuItem($db);




loadMenu($db);
/**
 * Ausgabe des gesamten Menüs aus der Datenbank
 * $database = Datenbank (in db/db.php)
 * Todo: $erg2 Entfernen
 */
function loadMenu($database){
$sql_abfrage = $database->prepare("SELECT M_Name, M_SubMenu, M_Rank FROM menu ORDER BY M_Rank");
$sql_abfrage->execute() or die("Fehler: loadMenu()");

while($row = $sql_abfrage->fetch()){
    $erg = $row['M_Name'];
    $erg2 = $row['M_Rank'];
    echo "<br>".$erg." ".$erg2;
    
}
}
/**
 * Auslesen der Menüpunkte in der Datenbank
 * Vergleichen mit eingegebenen MenüItem; wenn Rang gleich, dann kein Eintrag
 * $database = Datenbenk (indb/db.php)
 * $rankItem = eingegebenes MenüItem / Name des MenüPunktes
 * $rank = eingegebener Rang des $rankItem
 */
function rank($database, $rankItem, $rank){
    $sql_abfrage = $database->prepare("SELECT M_SubMenu, M_Rank FROM menu");
    $sql_abfrage->execute() or die("Fehler: rank()");
    
while($row = $sql_abfrage->fetch()){
    $erg = $row['M_Rank'];
    $rankItem->checkRank($erg, $rank);
}

}






?>