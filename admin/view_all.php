<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  width:50%
}
</style>
</head>
<body>

<?php
session_start();
if(!isset($_SESSION['userid'])) {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location:login.php');
    die('Bitte zuerst <a href="login.php">einloggen</a>');

}

include ("header.php");

/**
 * Darstellung aller Beiträge tabellarisch mit mehrern Seiten
 * 1. Alle Beiträge aus der Datenbank laden 
 * 2.  Beiträge pro Seite Laden 
 * 3. Pagination unten einbinden 
 * 4. Buttons pro Beitrag: Bearbeiten, Löschen 
 * 5. Löschen Funktion ist fertig, nur noch richtig einbinden
 * 6. Bearbeiten --> angepasste Post/Article Seite weiterleiten wo der Text drinsteht
 * @author Max Stötzner
 */

 require_once '../db/db.php';
//Als Funktion schreiben
$sql = $db->prepare("SELECT MAX(B_ID) from beitrag");
$sql->execute() or die("fehler");
    
 while($row = $sql->fetch()){
   $sql_erg = $row['MAX(B_ID)'];

   $total_post = $sql_erg;
 
  }

 
$result_per_site = 15;
$headline = null;


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
    // echo $result_per_site."<br>";
    //  echo $counter."<br>";
    //  echo $view_post."<br>";
 
      
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
              
       /*   
         if($headline == null){
              $headline == null;
  
            continue;
            }
            */

echo '<tr>';
echo '<th>'.$b_id.'</th>';
echo '<th>'.$headline.'</th>';
//Weiterleitung zur Bearbeitung
$redirection = '"post_edit.php?b_id='.$b_id.'"';
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

  include ("footer.php");
?>


</body>
</html>