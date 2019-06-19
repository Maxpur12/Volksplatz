<?php
/**
 * Laden und Darstellen der einzelnen MenuItems für das Hauptmenü der Webseite
 * @author Max Stötzner
 * 
 */

require_once 'db/db.php';




loadMenu($db);
/**
 * Ausgabe des gesamten Menüs aus der Datenbank
 * @param database  Datenbank aus der das Menü geladen werden soll
 * 
 */
function loadMenu($database){
$sql_abfrage = $database->prepare("SELECT M_Name, M_SubMenu, M_Rank FROM menu ORDER BY M_Rank");
$sql_abfrage->execute() or die("Fehler: loadMenu()");

while($row = $sql_abfrage->fetch()){
    $erg = $row['M_Name'];
    $erg2 = $row['M_Rank'];
    
    echo '<li class="nav-item">';
    echo '<a class="nav-link" href="index.php">'.$erg.'</a>';
    echo '</li>';
}
}






?>