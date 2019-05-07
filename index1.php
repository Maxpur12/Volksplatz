<!DOCTYPE html>
<html>
<head>
<script src="tinymce/tinymce.min.js" ></script>
<script >
tinymce.init({
    selector: '#article'
    
  });
</script>
</head>
<body>
<?php 
error_reporting(E_ALL);
require_once 'db/db.php';

//echo "Hello World <br>";

?>



<!-- <form action="article.php" method="post"> 
<textarea id="article" NAME="article"> Hello World!</textarea> 
<br>

<INPUT TYPE="submit" id="submit" NAME="submit" VALUE="submit">  onclick="update_text(article.value)" 
</form>

<form action="admin/logout.php" method="post">
<INPUT TYPE="submit" ID="logout" NAME="logout" VALUE="logout">
</form>
-->

<script type="text/javascript">

function update_text(str){

if (str.length == 0){ //exit function if nothing has been typed in the textbox

    document.getElementById("txtName").innerHTML=""; //clear previous results

    return;

}

if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari

    xmlhttp=new XMLHttpRequest();

} else {// code for IE6, IE5

    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

}

xmlhttp.onreadystatechange=function() {
    
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

        document.getElementById("update_text").innerHTML=xmlhttp.responseText;

    }

}

xmlhttp.open("GET","article.php?name="+str,true);

xmlhttp.send();

}
</script>


</body>
</html>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Volksplatz</title>
  </head>
  <body>
  
  
  
    <div class="jumbotron text-center">
  <h1>Volksplatz Borna</h1>
  <p>Resize this responsive page to see the effect!</p> 
</div>
  
<div class="container" style="margin-bottom: 20px;">
  
    <!--MENU -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Menü</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     <!-- <li class="nav-item active">
        <a class="nav-link" href="#">Startseite <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li> 
      -->
      <?php 
      include ("menu/menu.php");
      ?>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
  
</div>


 

  
   <?php include ("beitrag/show_test.php"); //Anzeige der Beiträge
   ?> 
 

  





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>