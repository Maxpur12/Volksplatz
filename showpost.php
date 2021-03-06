<?php
/**
 * Laden des ausgewählten Beitrages inkl. hinterlegten Bilder
 * @author Max Stötzner
 */

require_once 'db/db.php';


    //Prüfen ob Beitrags ID übergeben wurde
      if(isset($_GET["b_id"])){
        $B_ID = $_GET["b_id"];

        if(is_numeric($B_ID) == false){
          die("ERROR: Kein Beitrag angegeben");
        }

      }
        //Datenbankabfrage
        $sql = $db->prepare("SELECT B_ID,Headline,Text from beitrag where B_ID = ?");
        $sql->execute(array($_GET["b_id"])) or die("fehler");
         
        while($row = $sql->fetch()){
 
         //echo gettype($B_ID);
         // if($i != $B_ID) echo "ungleich";

            $headline = $row['Headline'];
            
            $text = $row['Text'];
           
            $b_id = $row['B_ID'];

          
            }
            
          
       
        //echo '<br>'.$B_ID;
        

?>

<!doctype html>
<html lang="en">
  <?php
  include ("header.php");
  ?>

  
   <?php 

echo '<div class="py-3">';
echo '<div class="container">';
 echo '<div class ="row">';
 echo '<div class ="col-md-12">';
 echo '<h1>'.$headline.'</h1>';

        
      /**
       * 1. Prüfen ob Bild vorhanden
       * 2. Anzahl Carousel Indicators erstellen
       * 3. CarouselItem erstellen
       */


      echo '<div class="py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators">';
                  $sql = $db->prepare("SELECT COUNT(P_ID) from pictures where B_ID = ?");
                  $sql->execute(array($b_id)) or die ("fehler");
                  $count_row = $sql->rowCount();

                  $count = 0; //Zählvariable
                  while($row = $sql->fetch()){
                    for($i = $count; $i < $row['COUNT(P_ID)']; $i++){
                    if($i == 0){
                      echo '<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"> </li>';
                   
                    }
                    else{
                      echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'"> </li>';
                    
                    }
                  }
                  }
               
               echo '</ol>
                <div class="carousel-inner">';
                
       
                $sql = $db->prepare("SELECT B_ID, p_name from pictures where B_ID = ?");
                // $sql->execute(array($_GET["b_id"])) or die("fehler");
                $sql->execute(array($b_id)) or die("fehler");
                $count_row = $sql->rowCount();

                $count = 0; //Zählvariable
                while($row = $sql->fetch()){
                 $picture = $row['p_name'];
                 
                 if($count == 0){
                 echo '<div class="carousel-item active"> <img class="d-block img-fluid w-100" src="uploads/'.$picture.'">';
                 }
                else{
                  echo '<div class="carousel-item"> <img class="d-block img-fluid w-100" src="uploads/'.$picture.'">';

                }
                 echo '<div class="carousel-caption">';
                   //echo '<h5 class="m-0">Carousel</h5>';
                   //echo '<p>with indicators</p>';
                echo' </div>
               </div>';
               $count++;
                }

            /*    
               echo '<div class="carousel-item active"> <img class="d-block img-fluid w-100" src="uploads/'.$picture.'">
                    <div class="carousel-caption">
                      <h5 class="m-0">Carousel</h5>
                      <p>with indicators</p>
                    </div>
                  </div>
                  <div class="carousel-item "> <img class="d-block img-fluid w-100" src="https://static.pingendo.com/cover-bubble-dark.svg">
                    <div class="carousel-caption">
                      <h5 class="m-0">Carousel</h5>
                      <p>with indicators</p>
                    </div>
                  </div>
                  <div class="carousel-item"> <img class="d-block img-fluid w-100" src="https://static.pingendo.com/cover-bubble-light.svg">
                    <div class="carousel-caption">
                      <h5 class="m-0">Carousel</h5>
                      <p>with indicators</p>
                    </div>
                  </div>'
               
               */
             echo '</div>
              </div>
            </div>
          </div>
        </div>
      </div>';

       // echo '<img src="uploads/'.$picture.'" class="img-fluid" alt="">';
      
       echo $text;
       echo '</div>';
       echo '</div>';
      

      
        echo '</div>';

        echo'';

   ?> 
  
</div>

</div>




</div>
</div>

<?php
include ("footer.php");
?>
    </body>
</html>