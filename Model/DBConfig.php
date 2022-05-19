<?php
          class database {
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
                    public function getTruyen($duyet){
                             $this->result=  $this->conn->query("SELECT * FROM truyen WHERE Duyet = '$duyet' ");
                             return mysqli_fetch_all($this->result,MYSQLI_BOTH);
                    }
                    public function getNguoiDang($id_user){
                              $this->result=  $this->conn->query("SELECT * FROM user WHERE Id_User = '$id_user' LIMIT 1");
                              return mysqli_fetch_all($this->result,MYSQLI_BOTH);
                     }
                     public function getTheLoai($id_loai){
                              $this->result=  $this->conn->query("SELECT * FROM loaitruyen WHERE Id_Loai = '$id_loai' LIMIT 1 ");
                              return mysqli_fetch_all($this->result,MYSQLI_BOTH);
                     }
                    //phuong thuc dem so ban ghi
                    //phuong thuc them truyen
                    public function insertTruyen($idloai,$iduser, $tentruyen,$tacgia,$gioithieu,$ngaydang,$hinhdaidien){
                              $sql = "INSERT INTO truyen(Id_Loai,Id_User,Tentruyen,Tacgia,Gioithieu,Ngaydang,Hinhdaidien) VALUES('$idloai', '$iduser', '$tentruyen', '$tacgia', '$gioithieu', '$ngaydang', '$hinhdaidien')";
                              return $this->execute($sql);
                    }
                    //phuong thuc sua truyen
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
