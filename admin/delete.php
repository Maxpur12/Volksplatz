<?php
require_once "../db/db.php";

$sql = $db->prepare("SELECT MAX(B_ID) from beitrag");
$sql->execute() or die("fehler");
    
    
 while($row = $sql->fetch()){
   $sql_erg = $row['MAX(B_ID)'];
 
  }


if(empty($_GET['b_id'])){
  die("Es wurde kein Beitrag angegeben der gelöscht werden soll!");
}
else{
  $B_ID = $_GET['b_id'];
  if($B_ID > $sql_erg || $B_ID < "0")  die("Beitrag existiert nicht");
}

/**
 * Prüfen ob Bilder bei Beiträgen vorhanden sind
 * Anschließend Bilder löschen
 */
for($i = $B_ID + 1; $i<=$sql_erg; $i++){
 
  $sql = $db->prepare("SELECT * FROM pictures WHERE B_ID = ?");
  $sql->execute(array($i)) or die("Fehler Abfrage Datenbank");
 
  if($sql->fetch()==true){
    echo "Bild existiert";
  
    $sql = $db->prepare("UPDATE pictures SET B_ID = ? WHERE B_ID = ?");
    $sql->execute(array($i - 1, $i)) or die("Bilder ID aktualisieren Fehlgeschlagen");
    echo "Bilder Löschen erfolgreich";

  }
  else {
   echo "Bild existiert nicht";
  }
}
/**
 * Beitrag löschen
 */

$sql = $db->prepare("DELETE FROM beitrag WHERE B_ID = ?");
$sql->execute(array($B_ID)) or die("Beitrag Löschen Fehlgeschlagen");
echo "Löschen erfolgreich";

/**
 * Nachfolgende Beiträge hinlänglich der BeitragsID aktualisieren
 */
for($i = $B_ID + 1; $i<=$sql_erg; $i++){
    $sql = $db->prepare("UPDATE beitrag SET B_ID = ? WHERE B_ID = ?");
    $sql->execute(array($i-1, $i)) or die(" Fehler UPDATE");

}
echo "Datenbank wurde Aktualisiert";



?>