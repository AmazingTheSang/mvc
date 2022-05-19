<?php
 if(isset($_GET['action'])){
          $action  = $_GET['action'];
}
else{
          $action = " ";
}
switch($action){
          case 'add':{
                    
                    break;
          }
          case 'edit':{
                  
                    break;
          }
          case 'delete':{
                   
                    break;
          }
          case 'list':{
                  break;
          }
          case 'detail':{
                if(isset($_GET['idchuong'])){
                        $idchuong = $_GET['idchuong'];
                        $chuong = $db->getChuong($idchuong);
                        require_once('View/chuong/detailchuong.php');
                }
                 break;
          }
          default:{
                   if(isset($_GET['idchuong'])){
                           $idchuong = $_GET['idchuong'];
                           $chuong = $db->getChuong($idchuong);
                           require_once('View/chuong/detailchuong.php');
                   }
                    break;
          }
}
?>