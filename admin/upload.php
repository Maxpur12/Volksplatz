<?php
require_once 'article.php';

class upload{

private $picture;
private $picture_tmp;
public function __construct($pic, $pic_tmp){
    $this->picture = $pic;
    $this->picture_tmp = $pic_tmp;
}
 
public function picUpload($pic,$pic_tmp){
    $picture    = $pic;
    $picture_tmp = $pic_tmp;
    $target_dir = "../uploads/"; //Ordner wo Datei abgelegt werden soll
    $target_file = $target_dir . basename($picture);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); //PATHINFO_EXTENSION gibt nur die 'Pfadendung' zurück
    

 $check = getimagesize($picture_tmp);
 if($check !== false) {
 echo "Datei ist ein Bild - " . $check["mime"] . ".";
$uploadOk = 1;
}
else{
    echo "Datei ist kein Bild.";
    $uploadOk = 0;
}


if(file_exists($target_file)){
    echo "Datei existiert schon.";
    $uploadOk = 0;
}

if ($picture_tmp > 5000000){ //5MB
echo "Die Datei ist zu groß.";
$uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
    echo "Nur JPG, JPEG, PNG & GIF Dateien sind erlaubt";
    $uploadOk = 0;
}

if($uploadOk == 0){
    echo "Datei konte nicht hochgeladen werden!";

} else{
    if(move_uploaded_file($picture_tmp, $target_file)){
        echo "Die Datei " . basename($picture). " wurde hochgeladen.";

    }
    else{
        echo "Beim Upload gab es einen Fehler!";
    }
}

}

}
?>