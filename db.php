<?php
$db = null;

try{
    $db = new PDO('mysql:host=localhost;dbname=newspaper_db', 'root','');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    $errors[]="Database error. ". $e->getMessage();
}
?>