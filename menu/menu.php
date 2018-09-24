<?php

require 'menuItem.php';
require '../db/db.php';


$name = "Test1";
$sub_menu = NULL;
$rank = 1;

$menu = new menuItem($name,$sub_menu,$rank);
$menu->insertMenuItem($db);



?>