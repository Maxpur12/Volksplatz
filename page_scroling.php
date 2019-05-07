<?php
require_once 'db/db.php';
$sql = $db->prepare("SELECT COUNT(*) as total from beitrag where not length(Headline)=0");
$sql->execute() or die("fehler");
 
while($row = $sql->fetch()){
   
   $result_total = $row['total'];
    
}



$result_per_site = 10;
$page_total = ceil($result_total/$result_per_site); //Ergebnis wird aufgerundet

if(empty($_GET['seite_nr'])){
    $seite = 1;
}
else{
    $seite = $_GET['seite_nr'];
    if ($seite > $page_total) {
        $seite = 1;
    }
}

$limit = ($seite*$result_per_site)-$result_per_site;
/*
$result = $db->prepare("SELECT Headline from beitrag where not lenght(Headline)=0 LIMIT".$limit.", ".$result_per_site);
$result->execute() or die("fehler");
while($row = $result->fetch()){
   
    $result_total = $row['total'];
     
    
 
 
 
 }
*/
?>