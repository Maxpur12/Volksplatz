<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  width:100%
}
</style>
</head>
<body>
<?php
/**
 * Ziel: Darstellung aller Beiträge tabellarisch mit mehrern Seiten
 * 1. Alle Beiträge aus der Datenbank laden !DONE!
 * 2. 10(?) Beiträge pro Seite Laden !DONE!
 * 3. Pagination unten einbinden !DONE!
 * 4. Buttons pro Beitrag: Bearbeiten, Löschen !DONE!
 * 5. Löschen Funktion ist fertig, nur noch richtig einbinden !DONE! gibt Fehler aus obwohl Funktion erfolgreich durchläuft
 * 6. Bearbeiten --> angepasste Post/Article Seite weiterleiten wo der Text drinsteht !TODO!
 * DANACH: MENU fertig machen
 */

 require_once '../db/db.php';
//Als Funktion schreiben
$sql = $db->prepare("SELECT MAX(B_ID) from beitrag");
$sql->execute() or die("fehler");
    
 while($row = $sql->fetch()){
   $sql_erg = $row['MAX(B_ID)'];

   $total_post = $sql_erg;
 
  }

 
$result_per_site = 3;
$headline = null;

/*
for($i=1; $i <= $sql_erg; $i++){
    $sql = $db->prepare("SELECT B_ID,Headline from beitrag where B_ID = ?");
    
    //$sql = $db->prepare("SELECT Headline from beitrag where B_ID = ?");
    $sql->execute(array($i)) or die("fehler view_all php");
     
    while($row = $sql->fetch()){

        $headline = $row['Headline'];
       
        $b_id = $row['B_ID'];
        }
        
    
   if($headline == null){
        $headline == null;
      // $result_per_site++;
      continue;
      }

}*/

/**
 * Anzeige der Daten
 */

      $total_pages = ceil($total_post/$result_per_site); //Anzahl der gesamten Seiten
      //$total_pages = 10;
      if (empty($_GET['seite_nr'])) {
          $page = 1; //Erste Seite wird angezeigt
      } else {
          $page = $_GET['seite_nr'];
          if ($page > $total_pages) {
              $page = 1;
          }
      }
      //$counter = $page * $result_per_site - ($result_per_site-1);
      $counter = $total_post - ($page * $result_per_site - ($result_per_site)); //i
     // $view_post = $page * $result_per_site; //sql_erg
      $view_post = $total_post - ($page * $result_per_site); 
     echo $result_per_site."<br>";
      echo $counter."<br>";
      echo $view_post."<br>";
 
      
      echo '<table>';
      for($i=$counter; $i > $view_post; $i--){
          if($i <= 0) break;
  
          //echo $i."<br>";
          $sql = $db->prepare("SELECT B_ID,Headline from beitrag where B_ID = ?");
          
          //$sql = $db->prepare("SELECT Headline from beitrag where B_ID = ?");
          $sql->execute(array($i)) or die("fehler view_all php");
           
          while($row = $sql->fetch()){
  
              $headline = $row['Headline'];
              
             
              $b_id = $row['B_ID'];
              }
              
          
         if($headline == null){
              $headline == null;
  
            continue;
            }

echo '<tr>';
echo '<th>'.$headline.'</th>';
//Weiterleitung zur Bearbeitung
$redirection = '"post.php?b_id='.$b_id.'"';
//$redirection = '"https://google.de/"';
echo '<form action='.$redirection.'method="post" enctype="multipart/form-data">';
echo '<th> <input type="submit" value="Bearbeiten"/> </th>'; 
echo '</form>';
//Weiterleitung zur Löschung und rückkehr zu view_all.php
$redirection = '"delete.php?b_id='.$b_id.'"';
echo '<form action='.$redirection.' method="post" enctype="multipart/form-data">';
echo '<th> <input type="submit" value="Löschen"/> </th>';   
echo '</form>';  

echo '</tr>';

}

echo '</table>';


/**
 * Pagination
 */

echo ' <div class="py-5">';
    echo ' <div class="container-fluid">';
   echo '<div class="row justify-content-center">';
   echo '<div class="col-md-12" style="">';
   echo ' <ul class="pagination justify-content-center">';




    for($i = 1; $i <= $total_pages; ++$i) {
      
     
       
      if($i< $page-1 || $i > $page+1){
         
        if($i == 1 || $i == $total_pages){

        }
        else{
          if($i == $page-3 || $i == $page+3){
            echo '<li class="page-item disabled"><a class="page-link" href="#">...</a></li>';

          }
        continue;
        }
      }  
    
      if ($page == $i){
            echo '<li class="page-item active"><a class="page-link" href="view_all.php?seite_nr='.$i.'">'.$i.'</a></li>';
        }
       else{
       echo '<li class="page-item"><a class="page-link" href="view_all.php?seite_nr='.$i.'">'.$i.'</a></li>';
        }
    }
  echo '</ul>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
?>


</body>
</html>