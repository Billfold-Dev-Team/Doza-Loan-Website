<?php 

$db_user = "ydo";
$db_pass = "Welcome@2021";
$db_name = "loansbay";

$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);