<?php
//require_once '../db/db.php';
require_once 'db/db.php';
require_once 'page_scroling.php';

$sql = $db->prepare("SELECT MAX(B_ID) from beitrag");
$sql->execute() or die("fehler");
    
$headline = null;
$preview = null;
    
 while($row = $sql->fetch()){
   $sql_erg = $row['MAX(B_ID)'];

   $total_post = $sql_erg;
 
  }

 
$result_per_site = 3;


  //  echo "<p>".$sql_erg."</p>";

    for($i=1; $i <= $sql_erg; $i++){
        $sql = $db->prepare("SELECT B_ID,Headline,Preview from beitrag where B_ID = ?");
        
        //$sql = $db->prepare("SELECT Headline from beitrag where B_ID = ?");
        $sql->execute(array($i)) or die("fehler show php");
         
        while($row = $sql->fetch()){

            $headline = $row['Headline'];
            
            $preview = $row['Preview'];
           
            $b_id = $row['B_ID'];
            }
            
        
       if($headline == null && $preview == null){
            $headline == null;
            $preview == null;
          // $result_per_site++;
          continue;
          }

     

    }

    $total_pages = ceil($total_post/$result_per_site); //Anzahl der gesamten Seiten
    $total_pages = 10;
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

    for($i=$counter; $i > $view_post; $i--){
        if($i <= 0) break;

        //echo $i."<br>";
        $sql = $db->prepare("SELECT B_ID,Headline,Preview from beitrag where B_ID = ?");
        
        //$sql = $db->prepare("SELECT Headline from beitrag where B_ID = ?");
        $sql->execute(array($i)) or die("fehler show php");
         
        while($row = $sql->fetch()){

            $headline = $row['Headline'];
            
            $preview = $row['Preview'];
           
            $b_id = $row['B_ID'];
            }
            
        
       if($headline == null && $preview == null){
            $headline == null;
            $preview == null;

          continue;
          }

      //echo '<br>'.$B_ID;
      echo '<div class="py-3">';
      echo '<div class="container">';
       echo '<div class ="row">';
       echo '<div class ="col-md-12">';
       echo '<h1>'.$headline.'</h1>';
       echo '</div>';
       echo '</div>';
       echo '<div class ="row">';
       echo '<div class ="col-md-12">';
       echo '<div class ="row">';
       echo '<div class="col-md-4"><img class="img-fluid d-block" src="https://static.pingendo.com/cover-bubble-light.svg"></div>';
       echo '<div class ="col-md-8">';
       echo '<div class ="col-md-12">';
       echo '<p class="mb-0">'.$preview. '</p>';
       echo '<a href=\'beitrag/showpost.php?b_id='.$b_id.'\'>'."Weiterlesen".'</a>'; 
       //Weiterleitungslink
       echo '</div>';
       echo '</div>';
       echo '</div>';
       echo '</div>';
       echo '</div>';
       echo '</div>';
       echo '</div>';

    } 
  
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
            echo '<li class="page-item active"><a class="page-link" href="index.php?seite_nr='.$i.'">'.$i.'</a></li>';
        }
       else{
       echo '<li class="page-item"><a class="page-link" href="index.php?seite_nr='.$i.'">'.$i.'</a></li>';
        }
    }
  echo '</ul>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
  echo '</div>';


/*
  <div class="py-5">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12" style="">
        <ul class="pagination justify-content-center">
          <li class="page-item"> <a class="page-link" href="#"> <span>«</span></a> </li>
          <li class="page-item active"> <a class="page-link" href="#">1</a> </li>
          <li class="page-item"> <a class="page-link" href="#">2</a> </li>
          <li class="page-item"> <a class="page-link" href="#">3</a> </li>
          <li class="page-item"> <a class="page-link" href="#">4</a> </li>
          <li class="page-item"> <a class="page-link" href="#"> <span>»</span></a> </li>
        </ul>
      </div>
    </div>
  </div>
</div>
*/
    ?>
    






    
      
 