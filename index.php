<!DOCTYPE html>
<html lang="en">
          <head>
                    <meta charset="UTF-8">
                    <link rel="stylesheet" href="style.css">
                    <title>Quản lý truyện</title>
          </head>
</html>
<?php     
         
          if(isset($_GET['controller'])){
                    $controller  = $_GET['controller'];
          }
          else{
                    $controller = " ";
          }
          switch($controller){
                    case 'truyen':{
                              include "Model/M_Truyen.php";
                              $db = new Model_Truyen();
                              $db->connect();
                              require_once('Controller/truyen/index.php');
                    }
                    case 'user':{
                              include "Model/User.php";
                              $db = new User();
                              $db->connect();
                              require_once('Controller/truyen/index.php');
                    }
                    case 'chuong':{
                              include "Model/M_Chuong.php";
                              $db = new Model_Chuong();
                              $db->connect();
                              require_once('Controller/chuong/index.php');
                    }
          }
?>