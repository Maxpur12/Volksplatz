<?php
require_once '../db/db.php';
session_start();

if(isset($_GET['login'])){
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];
    
    $sql = $db->prepare("SELECT * FROM users WHERE email = :email");
    $erg = $sql->execute(array('email' => $email));
    $user = $sql->fetch();

    if($user !== false && password_verify($passwort, $user['passwort'])){
        $_SESSION['userid'] = $user['id'];
        header("HTTP/1.1 301 Moved Permanently");
        header('Location:post.php');
        die('Login erfolgreich! Weiter zu <a href="../index.php"> intern');
    } else{
        $errorMessage = "E-Mail oder Passwort war ungültig <br>";
    }
}



?>

<?php
if(isset($errorMessage)){
    echo $errorMessage;
    header("HTTP/1.1 301 Moved Permanently");
    header('Location:login.php');
}
?>

<form action="?login=1" method="post">
USER:
<input type="email" size="40" maxlength="250" name="email">
<br> <br>
PASSWORT: 
<input type="password" size="40" maxlength="250" name="passwort">
<br>
<input type="submit" value="Abschicken">
</form>
