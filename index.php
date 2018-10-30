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

echo "Hello World <br>";

?>



<form action="article.php" method="post">
<textarea id="article" NAME="article"> Hello World!</textarea> 
<br>

<INPUT TYPE="submit" id="submit" NAME="submit" VALUE="submit">  <!-- onclick="update_text(article.value)" -->
</form>

<form action="admin/logout.php" method="post">
<INPUT TYPE="submit" ID="logout" NAME="logout" VALUE="logout">
</form>
<p id="update_text"> </p>















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