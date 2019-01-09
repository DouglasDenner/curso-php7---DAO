<?php
require_once("config.php");

$root =new usuario();


$root->loadbyId(2);
echo $root;
?>