<?php
          include_once("E_Chuong.php");
          class Model_Chuong {
                    private $hostname = 'localhost';
                    private $username = 'root';
                    private $password = '';
                    private $dbname = 'pbl5';
                    private $conn = null;
                    private $result = null;
                    public function connect(){
                              $this->conn = new mysqli($this->hostname,$this->username,$this->password,$this->dbname);
                              if(!$this->conn){
                                        echo "ket noi that bai";
                                        exit();
                              }
                              else{
                                        mysqli_set_charset($this->conn, 'utf8');
                              }
                              return $this->conn;
                    } 
                    
                   public function getChuong($idchuong)
                   {
                    $sql = "SELECT * from Chuong WHERE Id_Chuong='$idchuong'  ";
                    
                    $rs = mysqli_query($this->conn, $sql);
                    $obj = $rs->fetch_object();
                    $idchuong =$obj->Id_Chuong;
                    $idtruyen =  $obj->Id_Truyen;
                    $chuongso = $obj->Chuongso;
                    $chuongten =  $obj->Chuongten;
                    $noidung =  $obj->Noidung;
                    $chuong = new Enity_Chuong($idchuong,$idtruyen,$chuongso,$chuongten,$noidung);
                    return $chuong;
                   }
                    
          }
?>
