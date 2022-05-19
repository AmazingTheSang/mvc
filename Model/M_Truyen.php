<?php
          include_once("E_Truyen.php");
          include_once("E_Chuong.php");
          class Model_Truyen {
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
                   
                    public function execute($sql){
                              $this->result = $this->conn->query($sql);
                              return $this->result;
                    }   
                    public function getTruyen($idtruyen){
                     $sql = "SELECT * from Truyen WHERE Id_Truyen='$idtruyen'";
                    
                     $rs = mysqli_query($this->conn, $sql);
                    $obj = $rs->fetch_object();
                    $idtruyen = $obj->Id_Truyen;
                    $idloai= $obj->Id_Loai;
                    $iduser=$obj->Id_User;
                    $tentruyen = $obj->Tentruyen;
                    $tinhtrang=$obj->Tinhtrang;
                    $tacgia= $obj->Tacgia;
                    $gioithieu=$obj->Gioithieu;
                    $ngaydang=$obj->Ngaydang;
                    $hinhdaidien=$obj->Hinhdaidien;
                    $duyet=$obj->Duyet;
                    $truyen = new Enity_Truyen($idtruyen,$idloai,$iduser,$tentruyen,$tinhtrang,$tacgia,$gioithieu,$ngaydang,$hinhdaidien,$duyet);
                     return $truyen;
                    }
                    public function getAllTruyen(){
                              $sql = "SELECT * from Truyen";
                              $i= 0 ;
                              $rs = mysqli_query($this->conn, $sql);
                              $truyen = array();
                              while($row = mysqli_fetch_array($rs)){
                                        $idtruyen = $row['Id_Truyen'];
                                        $idloai =  $row['Id_Loai'];
                                        $iduser = $row['Id_User'];
                                        $tentruyen =  $row['Tentruyen'];
                                        $tinhtrang =  $row['Tinhtrang'];
                                        $tacgia =  $row['Tacgia'];
                                        $gioithieu =  $row['Gioithieu'];
                                        $ngaydang =  $row['Ngaydang'];
                                        $hinhdaidien = $row['Hinhdaidien'];
                                        $duyet =  $row['Duyet'];
                                        $truyen[$i] = new Enity_Truyen($idtruyen,$idloai,$iduser, $tentruyen, $tinhtrang, $tacgia, $gioithieu, $ngaydang, $hinhdaidien, $duyet );
                                        $i++;
                              }
                              return $truyen;
                    }
                    public function getTruyenchuaduyet($duyet){
                              $sql = "SELECT * FROM Truyen WHERE Duyet = '$duyet'";
                              $i= 0 ;
                              $rs = mysqli_query($this->conn, $sql);
                              $truyen = array();
                              while($row = mysqli_fetch_array($rs)){
                                        $idtruyen = $row['Id_Truyen'];
                                        $idloai =  $row['Id_Loai'];
                                        $iduser = $row['Id_User'];
                                        $tentruyen =  $row['Tentruyen'];
                                        $tinhtrang =  $row['Tinhtrang'];
                                        $tacgia =  $row['Tacgia'];
                                        $gioithieu =  $row['Gioithieu'];
                                        $ngaydang =  $row['Ngaydang'];
                                        $hinhdaidien = $row['Hinhdaidien'];
                                        $duyet =  $row['Duyet'];
                                        $truyen[$i] = new Enity_Truyen($idtruyen,$idloai,$iduser, $tentruyen, $tinhtrang, $tacgia, $gioithieu, $ngaydang, $hinhdaidien, $duyet );
                                        $i++;
                              }
                          return $truyen;
                    }
                    public function getNguoiDang($id_user){
                              $sql = "SELECT * FROM user WHERE Id_User = '$id_user'";
                              $i= 0 ;
                              $rs = mysqli_query($this->conn, $sql);
                              while($row = mysqli_fetch_array($rs)){
                                 $nguoidang = $row['Ten'] ;     
                              }
                          return $nguoidang;
                     }
                     public function getTheLoai($id_loai){
                        $sql = "SELECT * FROM loaitruyen WHERE Id_Loai = '$id_loai'";
                        $i= 0 ;
                        $rs = mysqli_query($this->conn, $sql);
                        while($row = mysqli_fetch_array($rs)){
                           $theloai = $row['TenLoai'] ;     
                        }
                        return $theloai;
                     }
                   public function getChuong($idtruyen){
                     $sql = "SELECT * from Chuong WHERE Id_Truyen='$idtruyen'  ";
                     $i= 0 ;
                     $rs = mysqli_query($this->conn, $sql);
                     $chuong = array();
                     while($row = mysqli_fetch_array($rs)){
                               $idchuong = $row['Id_Chuong'];
                               $idtruyen =  $row['Id_Truyen'];
                               $chuongso = $row['Chuongso'];
                               $chuongten =  $row['Chuongten'];
                               $noidung =  $row['Noidung'];
                               $chuong[$i] = new Enity_Chuong($idchuong, $idtruyen, $chuongso, $chuongten, $noidung );
                               $i++;
                     }
                     return $chuong;
                   }
                    public function insertTruyen($idloai,$iduser, $tentruyen,$tacgia,$gioithieu,$ngaydang,$hinhdaidien){
                              $sql = "INSERT INTO truyen(Id_Loai,Id_User,Tentruyen,Tacgia,Gioithieu,Ngaydang,Hinhdaidien) VALUES('$idloai', '$iduser', '$tentruyen', '$tacgia', '$gioithieu', '$ngaydang', '$hinhdaidien')";
                              return $this->execute($sql);
                    }
                    public function updateTruyen($idloai, $tentruyen,$tinhtrang,$tacgia,$gioithieu, $hinhdaidien){
                              $sql = "UPDATE truyen SET Id_Loai = '$idloai', Tentruyen ='$tentruyen', Tinhtrang='$tinhtrang',Tacgia = '$tacgia', Gioithieu='$gioithieu' , Hinhdaidien='$hinhdaidien'";
                              return $this->execute($sql);
                    }
                    public function duyetTruyen($idtruyen){
                              $sql = "UPDATE truyen SET Duyet = '1' WHERE Id_Truyen = '$idtruyen'" ;
                              return $this->execute($sql);
                    }
                    public function deleteTruyen($idtruyen){
                              $sql = "DELETE FROM truyen WHERE Id_Truyen = '$idtruyen'";
                              return $this->execute($sql);
                    }
          }
?>
