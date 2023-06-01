<?php
$db = null;

$host = "localhost";
$dbname = "newspaper_db";
$username = "root";
$password = "";

try{
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username,$password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    $errors[]="Database error. ". $e->getMessage();
}

if (!$db) {
    require VIEWS . '/db_error.html.php';
    exit();
}

?>