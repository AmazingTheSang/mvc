<?php
include_once("E_user.php");
class User
{
          private $hostname = 'localhost';
          private $username = 'root';
          private $password = '';
          private $dbname = 'pbl5';
          private $conn = null;
          private $result = null;

    public function connect()
    {
        $this->conn=new mysqli($this->hostname,$this->username,$this->password,$this->dbname);
        if(!$this->conn)
        {
            echo "Ket noi that bai";
            exit();
        }
        else {
            mysqli_set_charset($this->conn,'utf8');
        }
        return $this->conn;
    }
    
    public function execute($sql)
    {   
        $this->connect();
        $this->result=$this->conn->query($sql);
        return $this->result;
    }
    public function getuser()
    {
        if($this->result)
        {
            $data=mysqli_fetch_array($this->result);

        }
        else
        {
            $data=0;
        }
        return $data;
    }
    public function getalluser()
    {
        
       $sql="SELECT * FROM user ";
        $this->execute($sql);
        if($this->num_rows()==0)
        {
            $data=0;
        }
        else{
            while($datas=$this->getuser())
            {
                $data[]=$datas;
            }
        }
        return $data;

    }
    public function ktraemailuser($ten,$email)
    {
        $sql="SELECT * FROM user WHERE Ten='$ten' OR Email='$email'";
        $this->execute($sql);
        if($this->num_rows()==0)
        {
            $ktra=0;
        }
        else{
            $ktra=1;
        }
        return $ktra;

    }
    public function ktrauserpass($ten,$pass)
    {
        $sql="SELECT * FROM user WHERE Ten='$ten' AND Matkhau='$pass'";
        $this->execute($sql);
        if($this->num_rows()==0)
        {
            $ktra=0;
        }
        else{
            $ktra=1;
        }
        return $ktra;

    }

    public function adduser($ten,$ngaysinh,$diachi,$email,$matkhau,$gioitinh,$quyen)
    {
       $sql="INSERT INTO `user` (Ten,Ngaysinh,Diachi,Email,Matkhau,Gioitinh,Id_Quyen) VALUES ('$ten', '$ngaysinh', '$diachi','$email', '$matkhau', '$gioitinh','$quyen')";
       return $this->execute($sql);
    }
    public function num_rows()
    {
        if($this->result)
        {
            $num=mysqli_num_rows($this->result);

        }
        else {
            $num=0;
        }
        return $num;
    }
    public function getusertheoid($id)

    {
        $sql="SELECT * FROM user WHERE Id_User='$id'";

        $this->execute($sql);
        if($this->num_rows()!=0)
        {
            $data=mysqli_fetch_array($this->result);

        }
        else
        {
            $data=0;
        }
        return $data;
    }
    public function getusertheoten($ten)
    {
        $sql="SELECT * FROM user WHERE Ten='$ten'";

        $this->execute($sql);
        if($this->num_rows()!=0)
        {
            $data=mysqli_fetch_array($this->result);

        }
        else
        {
            $data=0;
        }
        return $data;

    }

    public function edituser($id,$Ten,$NS,$DC,$Email,$Pass,$GT,$Quyen)
    {
        $sql="UPDATE user  SET Ten='$Ten', Ngaysinh='$NS', Diachi='$DC', Email='$Email' ,Matkhau='$Pass', Gioitinh='$GT', Id_Quyen='$Quyen' WHERE Id_User=$id";
        return $this->execute($sql);
    }
    public function deleteUser($id)
    {
        $sql="DELETE FROM user WHERE Id_User=$id ";
        return $this->execute($sql);
    }
}

?>