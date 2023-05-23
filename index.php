<?php

DEFINE("LIB",$_SERVER['DOCUMENT_ROOT']."/lib");
DEFINE("VIEWS",LIB."/views");
DEFINE("PARTIALS",VIEWS."/partials");


if(isset($_GET['login'])){
    // require VIEWS.'/login.layout.php';
    require VIEWS.'/db_error.html.php';
	exit();
}

if(isset($_GET['article1'])){
    $errors = array();
    require 'db.php';  
    if(!$db){
       require VIEWS.'/db_error.html.php';
       exit();
    }
    $list = null; 
   try{   
       $query = "SELECT user_FN,user_LN,user_role FROM users";
       $statement = $db->prepare($query);
       $statement -> execute();
       $list = $statement->fetchall(PDO::FETCH_ASSOC);
       require VIEWS.'/article_body.layout.php';
   }
   catch(PDOException $e){
       $errors[] = "Statement error because: {$e->getMessage()}";
       require 'db_error.html.php';
	   exit();
   }
	exit();
}

if(isset($_GET['upload'])){
    require VIEWS.'/article_upload.layout.php';
	exit();
}

if(isset($_POST['_method']) && $_POST['_method']=='post'){
    // var_dump($_POST);
    if(!empty($_POST['news_title']) && !empty($_POST['user_id']) && !empty($_POST['news_body'])){
          $errors = array();
          require 'db.php';  
          if(!$db){
             require 'db_error.html.php';
             exit();
          }
          $news_title = $_POST['news_title'];
          $user_id = $_POST['user_id'];
          $news_body = $_POST['news_body'];
          try{   
            $query = "INSERT INTO article_content (news_title,user_id,news_body) VALUES (?,?,?)";
            $statement = $db->prepare($query);
            $binding = array($news_title,$user_id,$news_body);
            $statement -> execute($binding);
          }
          catch(PDOException $e){
            $errors[] = "Statement error because: {$e->getMessage()}";
            require 'db_error.html.php';
            exit();
 
          }
          header('Location: index.php?');       

          exit();
     }
     else{
        // header('Location: index.php?upload');
        require VIEWS.'/db_error.html.php';
        exit();
     }
 
 }


require VIEWS.'/site_home.layout.php';
