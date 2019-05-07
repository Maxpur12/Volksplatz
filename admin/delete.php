<?php
require_once "../db/db.php";

$sql = $db->prepare("SELECT MAX(B_ID) from beitrag");
$sql->execute() or die("fehler");
    
    
 while($row = $sql->fetch()){
   $sql_erg = $row['MAX(B_ID)'];
 
  }


$B_ID = 1;
$sql = $db->prepare("DELETE FROM beitrag WHERE B_ID = ?");
$sql->execute(array($B_ID)) or die("Löschen Fehlgeschlagen");
echo "Löschen erfolgreich";

for($i = $B_ID + 1; $i<=$sql_erg; $i++){
    $sql = $db->prepare("UPDATE beitrag SET B_ID = ? WHERE B_ID = ?");
    $sql->execute(array($i-1, $i)) or die("Fehler UPDATE");
    
}
echo "Datenbank wurde Aktualisiert";
?>