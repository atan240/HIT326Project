<?php

DEFINE("LIB",$_SERVER['DOCUMENT_ROOT']."/lib");
DEFINE("VIEWS",LIB."/views");
DEFINE("PARTIALS",VIEWS."/partials");


if(isset($_GET['login'])){
    require VIEWS.'/login.layout.php';
	exit();
}

if(isset($_GET['article1'])){
    require VIEWS.'/article_body.layout.php';
	exit();
}

if(isset($_GET['upload'])){
    require VIEWS.'/article_upload.layout.php';
	exit();
}

require VIEWS.'/site_home.layout.php';
?>

